<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit de Produto</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route("produto.update", $produto->id)}}">
          @csrf
          <input name="_method" type="hidden" value="PUT">
            <div class="mb-3">
              <label for="id-input" class="form-label">ID</label>
              <input type="text" class="form-control" id="id-input" aria-describedby="id-help" placeholder="#" value="{{$produto->id}}" disabled>
              <div id="id-help" class="form-text">Não é necessário informar um ID para o cadastro.</div>
            </div>
            <div class="mb-3">
              <label for="id-nome" class="form-label">Nome</label>
              <input name="nome" type="text" class="form-control" id="id-nome" placeholder="Digite o nome do produto" value="{{$produto->nome}}">
            </div>
            <div class="mb-3">
                <label for="id-preco" class="form-label">Preço</label>
                <input name="preco" type="text" class="form-control" id="id-preco" placeholder="Digite o preço do produto" value="{{$produto->preco}}">
              </div>
              <div class="mb-3">
                <label for="id-tipo" class="form-label">Tipo</label>
                <select name="Tipo_Produtos_id" class="form-select" aria-label="Default select example">
                  @foreach ($tipoProdutos as $tipoProduto)
                    {{-- Se o valor que eu estiver imprimindo for igual ao valor dentro de $produto->Tipo_Produtos_id 
                        então será o selecionado --}}
                    @if ($tipoProduto->id == $produto->Tipo_Produtos_id)
                        <option value="{{$tipoProduto->id}}" selected>{{$tipoProduto->descricao}}</option>
                    @else    
                        <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</body>
</html>