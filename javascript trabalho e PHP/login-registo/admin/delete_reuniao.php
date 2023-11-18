<?php
include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $sqlDeleteReuniao = "DELETE FROM reuniao WHERE id = ?";
    $stmt = $conexao->prepare($sqlDeleteReuniao);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header('Location: reunioes.php'); 
    } else {
        echo "Erro ao excluir a reunião ";
    }
    
    $stmt->close();
} else {
    echo "ID da reunião não fornecido.";
}
?>
