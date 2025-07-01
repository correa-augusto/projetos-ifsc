<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show de Produto</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value="{{$produto->id}}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" value="{{$produto->nome}}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="text" class="form-control" value="{{$produto->preco}}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <input type="text" class="form-control" value="{{$produto->descricao}}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Updated_at</label>
            <input type="text" class="form-control" value="{{$produto->updated_at}}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Created_at</label>
            <input type="text" class="form-control" value="{{$produto->created_at}}" disabled>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{Route("produto.index")}}">Voltar</a>
        </div>
    </div>
</body>
</html>