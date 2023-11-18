<?php
include_once("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM reuniao WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
    header("Location: reuniao.php"); 
    exit();
} else {
    echo "Erro ao excluir reunião " ;
}


?>
