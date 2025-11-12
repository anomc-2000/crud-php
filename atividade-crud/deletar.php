<?php
    include "conexao.php";
    
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = intval($_GET['id']);
        $stmt = $conn->prepare("DELETE FROM crud1 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
    
    header('Location: /atividade-crud/index.php');
    exit;
?>
