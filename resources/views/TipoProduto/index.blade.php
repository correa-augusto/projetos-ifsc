<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index de Tipo Produto</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        @if (isset($tipoMensagem) && isset($mensagem))
        <div class="alert alert-{{$tipoMensagem}} alert-dismissible fade show" role="alert">
             {{$mensagem}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        
        <a class="btn btn-primary" href="{{route("tipoproduto.create")}}">Criar Tipo Produto</a>
        <a class="btn btn-primary" href="#">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoProdutos as $tipoProduto)
                    <tr>
                        <th scope="row">{{$tipoProduto->id}}</th>
                        <td>{{$tipoProduto->descricao}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route("tipoproduto.show", $tipoProduto->id)}}">Motrar</a>
                            <a class="btn btn-secondary" href="{{route("tipoproduto.edit", $tipoProduto->id)}}">Editar</a>
                            <a href="#" class="btn btn-danger btn-remover" data-bs-toggle="modal" data-bs-target="#id-remove-modal" value="{{route("tipoproduto.destroy", $tipoProduto->id)}}">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="id-remove-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remoção de recurso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja remover esse recurso?
                </div>
                <div class="modal-footer">
                    <form id="id-modal-form-delete" method="POST" action="" class="d-inline">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Remover</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Seleciono todos os elementos HTML que tenham a classe btn-remover
        const botoesRemover = document.querySelectorAll(".btn-remover");
        // Seleciono o form com o botão de confirmar remoção
        const modalFormDelete = document.querySelector("#id-modal-form-delete");
        //console.log(botoesRemover);
        botoesRemover.forEach(botao => {
            botao.addEventListener("click", botaoRemoverClick);
        });
        function botaoRemoverClick(){
            modalFormDelete.setAttribute("action", this.getAttribute("value"));
        }
    </script>
</body>
</html>