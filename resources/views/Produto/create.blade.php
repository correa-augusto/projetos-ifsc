<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create de Produto</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route("produto.store")}}">
          @csrf
            <div class="mb-3">
              <label for="id-input" class="form-label">ID</label>
              <input type="text" class="form-control" id="id-input" aria-describedby="id-help" placeholder="#" disabled>
              <div id="id-help" class="form-text">Não é necessário informar um ID para o cadastro.</div>
            </div>
            <div class="mb-3">
              <label for="id-nome" class="form-label">Nome</label>
              <input name="nome" type="text" class="form-control" id="id-nome" placeholder="Digite o nome do produto">
            </div>
            <div class="mb-3">
                <label for="id-preco" class="form-label">Preço</label>
                <input name="preco" type="text" class="form-control" id="id-preco" placeholder="Digite o preço do produto">
              </div>
              <div class="mb-3">
                <label for="id-tipo" class="form-label">Tipo</label>
                <select name="Tipo_Produtos_id" class="form-select" aria-label="Default select example">
                  @foreach ($tipoProdutos as $tipoProduto)
                    <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                  @endforeach
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</body>
</html>