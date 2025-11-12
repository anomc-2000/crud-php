<?php
    include "conexao.php";
    if(isset($_POST['submit'])){
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];       
        $q = "INSERT INTO `crud1`(`nome`, `idade`) VALUES ('$nome', '$idade')";
        $query = mysqli_query($conn,$q);
        if($query){
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD - Anildo</title>
</head>

<body class='bg-dark text-white'>
    <nav class='navbar navbar-dark bg-dark'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'>CRUD - Anildo</a>
            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                Adicionar
            </button>
        </div>
    </nav>

    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content bg-dark text-white'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Adicione um membro</h5>
                    <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Escreva seu nome" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Idade</label>
                            <input type="number" class="form-control" name="idade" placeholder="Escreva sua idade" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class='container my-4'>
        <table class='table table-dark table-striped'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Nome</th>
                    <th scope='col'>Idade</th>
                    <th scope='col'>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    include 'conexao.php';
                    $sql = 'SELECT * FROM crud1';
                    $result = $conn->query($sql);
                    if(!$result){
                        die('Inválido!');
                    }
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <th scope='row'>{$row['id']}</th>
                            <td>{$row['nome']}</td>
                            <td>{$row['idade']}</td>
                            <td>
                                <a class='btn btn-outline-success btn-sm' href='editar.php?id={$row['id']}'>Editar</a>
                                <a class='btn btn-outline-danger btn-sm' href='deletar.php?id={$row['id']}' onclick='return confirm(\"Tem certeza?\")'>Remover</a>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>