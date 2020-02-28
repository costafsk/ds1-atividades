<?php 

require_once("./utils/utils.php");

$path =  './files/produto.txt';

$mode = 'r';

$archive = fopen($path, $mode);

if (!$archive) die("Nao foi possivel abrir o arquivo");

$row = array_map("mount", explode("\n", file_get_contents($path)));

array_map("mount", $row);

print_r($row[0]["nome"]);

fclose($archive);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Extra</title>
</head>
<body>
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">Extra</a>
    </nav>
    <div class="container">
        <main>
            <button type="button" class="btn btn-outline-primary mt-4 w-100" data-toggle="modal" data-target="#exampleModal">
            Adicionar
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="./controllers/save.php">
                                <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input type="number" class="form-control" id="codigo" name="codigo">
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                                <div class="form-group">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" class="form-control" id="quantidade" name="quantidade">
                                </div>
                                <div class="form-group">
                                    <label for="preco">Preço</label>
                                    <input type="number" step="0.01" class="form-control" id="preco" name="preco">
                                </div>
                                <button type="submit" class="btn btn-success w-100">Salvar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-dark mt-5">
                <thead>
                    <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>