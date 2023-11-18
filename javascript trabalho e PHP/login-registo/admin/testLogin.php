<?php
    session_start();
    // print_r($_REQUEST);

    // Verifica se o formulário foi enviado
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        // Acessa a configuração do banco de dados
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Utiliza consulta preparada para evitar injeção de SQL
        $sql = "SELECT * FROM administradores WHERE email = ? AND senha = ? AND role = 'admin'";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se encontrou um administrador com a role "admin"
        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
            exit(); 
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: logAdmin.php');
            exit(); 
        }
    }
    else
    {
        // Não acessa
        header('Location: login.php');
        exit(); 
    }
?>
