<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Monstra um lista dos recursos cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$produtos = Produto::all();
        $produtos = DB::select("select Produtos.id, 
                                       Produtos.nome, 
                                       Produtos.preco,
                                       Tipo_Produtos.descricao
                               from Produtos
                               join Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                               order by Produtos.id");
        //print_r($produtos);
        return view('Produto/index')->with('produtos', $produtos);
    }

    /**
     * Display a listing of the resource.
     * Monstra um lista dos recursos cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMessage($tipoMensagem, $mensagem)
    {
        //$produtos = Produto::all();
        $produtos = DB::select("select Produtos.id, 
                                       Produtos.nome, 
                                       Produtos.preco,
                                       Tipo_Produtos.descricao
                               from Produtos
                               join Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                               order by Produtos.id");
        //print_r($produtos);
        return view('Produto/index')->with('produtos', $produtos)->with("tipoMensagem", $tipoMensagem)->with("mensagem", $mensagem);
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar um formulário para criação de um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProdutos = DB::select('select * from Tipo_Produtos');
        //$tipoProdutos = TipoProduto::all();
        return view('Produto/create')->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Store a newly created resource in storage.
     * Armazena um produtos recem criado no Banco de Dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->save();
        } catch (\Throwable $th) {
            return $this->indexMessage("danger", $th->getMessage());
        }
        // Roda o método index para atualizar a página
        return $this->indexMessage("success", "Produto cadastrado.");
    }

    /**
     * Display the specified resource.
     * Motra um recurso específico em detalhes.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = collect( DB::select("select Produtos.id,
                                            Produtos.nome,
                                            Produtos.preco,
                                            Produtos.updated_at,
                                            Produtos.created_at,
                                            Tipo_Produtos.descricao
                                    from Produtos
                                    join Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                    where Produtos.id = ?;", [$id]) )->first();
        if(isset($produto))
            return view("Produto/show")->with("produto", $produto);
        #TODO Retornar página de erro.
        return $this->indexMessage("warning", "O Produto $id não foi encontrado.");
    }

    /**
     * Show the form for editing the specified resource.
     * Mostra o formulário para edição de um recurso específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoProdutos = DB::select('select * from Tipo_Produtos');

        $produto = Produto::find($id);

        if(isset($produto))
            return view("Produto/edit")->with("tipoProdutos", $tipoProdutos)->with("produto", $produto);
        #TODO Retornar página de erro.
        return $this->indexMessage("warning", "O Produto $id não foi encontrado.");
    }

    /**
     * Update the specified resource in storage.
     * Atualizar um recurso específico no Banco de Dados
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if(isset($produto)){
            try {
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->update();
            } catch (\Throwable $th) {
                return $this->indexMessage("danger", $th->getMessage());
            }
            return $this->indexMessage("success", "O Produto $id foi salvo com sucesso");
        }
        #TODO Retornar página de erro.
        return $this->indexMessage("warning", "O Produto $id não foi encontrado.");
    }

    /**
     * Remove the specified resource from storage.
     * Remover um recurso específico do Banco de Dados
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
        // Se o produto existir
        try {
            $produto->delete();
        } catch (\Throwable $th) {
        //retorna um erro quando não consegue excluir
        return $this->indexMessage("danger", $th->getMessage());
        }
        //retorna um sucesso quando comseguen excluir
            return $this->indexMessage("success", "Produto removido com sucesso");
        }
        #TODO Retornar página de erro.
        return $this->indexMessage("warning", "O produto $id não foi encontrado");
}
}


