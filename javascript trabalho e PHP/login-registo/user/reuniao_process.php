<?php 
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php"); 
  exit();
}


  include_once("config.php");

  $email = $_SESSION['email'];



  $tipoReuniao = $_POST['tipoReuniao'];
  $dataReuniao = $_POST['dataReuniao'];
  $observacoes = $_POST['observacoes'];
  
  if (strtotime($dataReuniao) < strtotime('today')) {
    echo "A data da reunião deve ser no futuro.";
    exit; 
}

  $sql = "INSERT INTO reuniao (email,tipo, datar, observacoes) VALUES ('$email','$tipoReuniao', '$dataReuniao', '$observacoes' )";
  
  if ($conexao->query($sql) === TRUE) {
      header("location:reuniao.php");
  } else {
      echo "Erro ao agendar reunião ";
  }
?>