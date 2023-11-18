<?php
session_start();
if (isset($_POST["submit"])) {

    include_once("config.php");

    $datas = $_POST["data"];
    $alldatas = implode(", ", $datas);
    // Insere os dados na tabela do banco de dados
    $logado = $_SESSION["email"];
    $tipo_pagina = $_POST['seleçao'];
    $prazo_mes = $_POST['mes'];
    $valores = $_POST['valor'];

    $query = "INSERT INTO projecto (email, pagina, mes, valor, checks) VALUES ('$logado', '$tipo_pagina', '$prazo_mes', '$valores', '$alldatas')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        header("location: Projecto.php");
    } else {
        echo ("Erro ao inserir dados no banco de dados.");
    }
}
?>
