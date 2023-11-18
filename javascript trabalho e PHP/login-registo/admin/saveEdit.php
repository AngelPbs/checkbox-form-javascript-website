<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: login.php');
    exit(); 
}

$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

$sqlCheckAdmin = "SELECT * FROM administradores WHERE email = ? AND senha = ? AND role = 'admin'";
$stmt = $conexao->prepare($sqlCheckAdmin);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if(mysqli_num_rows($result) < 1) {
    header('Location: login.php');
    exit(); 
}

if(isset($_POST['update'])) {
    // Receber dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['datan'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    
    // Atualizar o banco de dados
    $sqlUpdate = "UPDATE users SET nome='$nome', senha='$senha', email='$email', telefone='$telefone', genero='$sexo', datan='$data_nasc', cidade='$cidade', estado='$estado', endereco='$endereco' WHERE id=$id";
    $resultUpdate = $conexao->query($sqlUpdate);

    // Verificar se a atualização foi bem-sucedida
    if ($resultUpdate === TRUE) {
        // Redirecionar para a página sistema.php em caso de sucesso
        header('Location: sistema.php');
        exit();
    } else {
        // Em caso de erro, imprimir o erro para depuração
        echo "Erro ao atualizar o banco de dados";
    }
}