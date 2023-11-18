<?php
session_start();
include_once("config.php");

// Verifique se user está login senao vai para login
if (!isset($_SESSION["email"]) || empty($_SESSION["email"])) {
    header("location: login.php");
    exit();
}

$email = $_SESSION["email"];


$sql = "DELETE FROM projecto WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);

// Executa a consulta SQL de exclusão
if ($stmt->execute()) {
    //Se estiver tudo certo vai para esta pagina
    header("location:Projecto.php");
} else {
    // Caso ocorra algum erro 
    echo "Erro ao excluir os dados.";
}
?>
