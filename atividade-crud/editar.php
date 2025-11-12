<?php
include "conexao.php";

$id = "";
$nome = "";
$idade = "";
$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(!isset($_GET['id'])){
        header("location: /atividade-crud/index.php");
        exit;
    }
    
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM crud1 WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
        header("location: /atividade-crud/index.php");
        exit;
    }
    
    $nome = $row["nome"];
    $idade = $row["idade"];
}
else {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    $sql = "UPDATE crud1 SET nome='$nome', idade='$idade' WHERE id='$id'";
    $result = $conn->query($sql);
    
    if($result){
        header("location: /atividade-crud/index.php");
        exit;
    } else {
        $error = "Erro ao atualizar: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar - CRUD</title>
</head>
<body class='bg-dark text-white'>
    <nav class='navbar navbar-dark bg-dark'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='index.php'>CRUD - Anildo</a>
        </div>
    </nav>

    <div class='container my-4'>
        <div class='card bg-dark text-white'>
            <div class='card-header'>
                <h5>Editar Membro</h5>
            </div>
            <div class='card-body'>
                <?php if($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Idade</label>
                        <input type="number" name="idade" value="<?php echo $idade; ?>" class="form-control" required>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>