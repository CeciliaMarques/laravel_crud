<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
    <title>Laravel</title>
</head>

<body>
    <div class="container">

        <h2>Cadastro de Usuários</h2>
        <form action="{{ route('pegar_rota') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control" name="id" value="{{$usuario['id']}}" requiredd>
            </div>
            <div class="form-group">
                <label for="nome"> Nome: </label>
                <input type="text" class="form-control" name="nome" value="{{$usuario['nome']}}" required>
            </div>
            <div class="form-group">
                <label for="email"> Email: </label>
                <input type="email" class="form-control" name="email" value="{{$usuario['email']}}" required>
            </div>
            <div class="form-group">
                <label for="telefone"> Telefone: </label>
                <input type="text" class="form-control" name="telefone" value="{{$usuario['telefone']}}" required>
            </div>
            </br>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-success" name="salvar">Salvar</button>
            </div>
            </br>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-success" name="atualizar">Editar</button>
            </div>
            </br>
        </form>
        </br>
        </br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Editar</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($usuarios as $usuario)
                    <td><a href="{{route('index2', $usuario['id'])}}">Editar</a> </td>
                    <td>{{$usuario['id']}}</td>
                    <td>{{$usuario['nome']}}</td>
                    <td>{{$usuario['email']}}</td>
                    <td>{{$usuario['telefone']}}</td>
                    <td><a href="{{route('deletar_usuario', $usuario['id'])}}">Excluir</a> </td>

                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</body>
<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>

</html>