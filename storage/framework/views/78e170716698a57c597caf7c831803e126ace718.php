<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show de Tipo Produto</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value="<?php echo e($tipoProduto->id); ?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" class="form-control" value="<?php echo e($tipoProduto->descricao); ?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Updated_at</label>
            <input type="text" class="form-control" value="<?php echo e($tipoProduto->updated_at); ?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Created_at</label>
            <input type="text" class="form-control" value="<?php echo e($tipoProduto->created_at); ?>" disabled>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="<?php echo e(Route("tipoproduto.index")); ?>">Voltar</a>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\Aluno\Documents\ProjetoAula2\resources\views/TipoProduto/show.blade.php ENDPATH**/ ?>