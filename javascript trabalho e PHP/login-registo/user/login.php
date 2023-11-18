<?php
session_start();
if (isset($_POST["submit"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) {
    include_once("config.php");
    $email = $_POST['email'];
    $senha_digitada = $_POST['senha'];

    // Consulta o banco de dados para obter o hash da senha associado ao email fornecido
    $consulta_email = mysqli_query($conexao, "SELECT senha FROM users WHERE email = '$email'");
    $dados_usuario = mysqli_fetch_assoc($consulta_email);

    if ($dados_usuario) {
        $hash_senha = $dados_usuario["senha"];

        // Verifica se a senha digitada corresponde ao hash armazenado no banco de dados
        if (password_verify($senha_digitada, $hash_senha)) {
            // Senha correta, usuário está autenticado
            $_SESSION["email"] = $email;
            header("location: logged.php"); // Página restrita após o login bem-sucedido
            exit; // Termina o script para evitar redirecionamento desnecessário
        } else {
            // Senha incorreta, exibe mensagem de erro
            $mensagem_erro= "<p style='color: red;'>Senha incorreta. Por favor, tente novamente.</p>";
        }
    } else {
        // Email não encontrado no banco de dados, exibe mensagem de erro
        $mensagem_erro= "<p style='color: red;'>Email não encontrado. Por favor, verifique o email digitado.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="../css/formStyle.css" />
</head>
<body>
<div class="formLogin">
<?php if (isset($mensagem_erro)) { ?>
            <p style="color: red;"><?php echo $mensagem_erro; ?></p>
        <?php } ?>
<h1>Log In</h1>
<form action="login.php"   method="post" >
<input type="text" class="inputStyle" name="email" placeholder="email" required />
<input type="password" class="inputStyle" name="senha" placeholder="Password" required />
<div class="botoes">
<input name="submit" type="submit" value="Enviar" />
<a href="../../index.html"> <input type="button" name="voltar" value="Voltar" /></a>
</form>
<p>Não está registado? <a href='form.php'><span>Regista aqui</span></a></p>
</div>
</div>
</body>
</html>
