<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Método index de TipoProdutoController foi chamado";
        //$tipoProdutos = TipoProduto::all();
        $tipoProdutos = DB::select('select * from Tipo_Produtos');
        //print_r($tipoProdutos);
        return view('TipoProduto/index')->with('tipoProdutos', $tipoProdutos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMessage($tipoMensagem, $mensagem)
    {
        //echo "Método index de TipoProdutoController foi chamado";
        //$tipoProdutos = TipoProduto::all();
        $tipoProdutos = DB::select('select * from Tipo_Produtos');
        //print_r($tipoProdutos);
        return view('TipoProduto/index')->with('tipoProdutos', $tipoProdutos)->with("tipoMensagem", $tipoMensagem)->with("mensagem", $mensagem);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoProduto/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tipoProduto = new TipoProduto();
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();
        } catch (\Throwable $th) {
            return $this->indexMessage("danger", $th->getMessage());
        }
        // Roda o método index para atualizar a página
        return $this->indexMessage("success", "Tipo de Produto cadastrado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
            return view("TipoProduto/show")->with("tipoProduto", $tipoProduto);
            #TODO Retornar página de erro.
            return $this->indexMessage("warning", "O Tipo de Produto $id não foi encontrado.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoProduto = TipoProduto::find($id);

        if(isset($tipoProduto))
            return view("TipoProduto/edit")->with("tipoProduto", $tipoProduto);
        #TODO Retornar página de erro.
        return $this->indexMessage("warning", "O  Tipo de Produto $id não foi encontrado.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoProduto = TipoProduto::find($id);

        if(isset($tipoProduto)){
            try {
                $tipoProduto->descricao = $request->descricao;
                $tipoProduto->update();
            } catch (\Throwable $th) {
                return $this->indexMessage("danger", $th->getMessage());
            }
            return $this->indexMessage("success", "O Tipo de Produto $id foi salvo com sucesso");
        }
        #TODO Retornar página de erro.
        return $this->indexMessage("warning", "O Tipo de Produto $id não foi encontrado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoProduto = TipoProduto::find($id);
        // Se o produto existir
        if(isset($tipoProduto)){
            try {
                $tipoProduto->delete();
            } catch (\Throwable $th) {
                 //retorna um erro quando não consegue excluir
                return $this->indexMessage("danger", $th->getMessage());
            }
            //retorna um sucesso quando comseguen excluir
            return $this->indexMessage("success", "Tipo de Produto removido com sucesso");
        }
        #TODO Retornar página de erro.
        return $this->indexMessage("warning", "O Tipo de produto $id não foi encontrado");
    }
}
