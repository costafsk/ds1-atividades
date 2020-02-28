<?php 

require_once("./utils/utils.php");

$archive = fopen('./files/produto.txt', 'r');

if (!$archive) die("Nao foi possivel abrir o arquivo");

$rows = array_map("mount", explode("\n", file_get_contents('./files/produto.txt')));

array_pop($rows);

$precoInicial = 0;

$maiorPreco = max(array_column($rows, 'preco'));
$maiorQuantidade = max(array_column($rows, 'quantidade'));
$maiorTotal = maior_total($rows);


print_r($maiorTotal);

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
            <div class="d-flex justify-content-between mt-5">
                <!-- Produto de maior preço -->
                <div class="modal fade" id="modalMaiorPreco" tabindex="-1" role="dialog" aria-labelledby="modalMaiorPreco" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalMaiorPreco">Produto de maior preço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Produto de maior quantidade -->
                <div class="modal fade" id="modalMaiorQuantidade" tabindex="-1" role="dialog" aria-labelledby="modalMaiorQuantidade" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalMaiorQuantidade">Produto de maior quantidade</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Maior de maior preço total -->
                <div class="modal fade" id="modalMaiorPrecoTotal" tabindex="-1" role="dialog" aria-labelledby="modalMaiorPrecoTotal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalMaiorPrecoTotal">Produto de maior preço total</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalMaiorPreco">Produto de maior preço</button>
                <button class="btn btn-success" data-toggle="modal" data-target="#modalMaiorQuantidade">Produto de maior quantidade</button>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalMaiorPrecoTotal">Produto de maior preço total</button>
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
                    <?php foreach($rows as $row) { ?>
                        <tr>
                            <th scope="row"><?php echo $row["codigo"] ?></th>
                            <td><?php echo $row["nome"] ?></td>
                            <td><?php echo $row["quantidade"] ?></td>
                            <td><?php echo 'R$ '.$row["preco"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>