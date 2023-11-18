<?php
include_once("config.php");

if (isset($_POST["update"])) {
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $senha = $_POST["senha"];
  $email = $_POST["email"];
  $telefone = $_POST["telefone"];
  $genero = $_POST["genero"];
  $datan = $_POST["datan"];
  $cidade = $_POST["cidade"];
  $estado = $_POST["estado"];
  $endereco = $_POST["endereco"];

  $sqlUpdate = "UPDATE users SET nome ='$nome', senha='$senha', email='$email', telefone='$telefone', genero='$genero', datan='$datan', cidade='$cidade', estado='$estado', endereco='$endereco' WHERE id='$id' ";

  $result = $conexao->query($sqlUpdate);
}
header("location: sistema.php");
?>
