<?php

$dbHost="localhost";
$dbUsername="root";
$dbPassword="root";
$dbName="bd";

$conexao= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if($conexao->connect_errno){
  echo "Falha na conexão";}
  
?>