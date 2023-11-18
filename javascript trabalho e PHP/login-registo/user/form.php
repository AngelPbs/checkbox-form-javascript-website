<?php
if(isset($_POST["submit"])) {


include_once("./config.php");
/*
print_r($_POST["nome"]);
print_r("<br>");
print_r($_POST["email"]);
print_r("<br>");
print_r($_POST["telefone"]);
print_r("<br>");
print_r($_POST["genero"]);
print_r("<br>");
print_r($_POST["data_nascimento"]);
print_r("<br>");
print_r($_POST["cidade"]);
print_r("<br>");
print_r($_POST["estado"]);
print_r("<br>");
print_r($_POST["endereco"]);
*/


$nome=$_POST["nome"];
$senha=$_POST["senha"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];
$genero=$_POST["genero"];
$datan=$_POST["datan"];
$cidade=$_POST["cidade"];
$estado=$_POST["estado"];
$endereco=$_POST["endereco"];

$consulta_email = mysqli_query($conexao, "SELECT * FROM users WHERE email = '$email'");
if (mysqli_num_rows($consulta_email) > 0) {
    // O email já está registado, mostrar mensagem de aviso
     $mensagem_aviso = "Email já registado";

} else {
$hash=password_hash($senha, PASSWORD_DEFAULT);

$result= mysqli_query($conexao,"INSERT INTO users(nome,senha,email,telefone,genero,datan,cidade,estado,endereco) 
VALUES ( '$nome','$hash','$email','$telefone','$genero','$datan','$cidade','$estado','$endereco')");


if ($result) {
    header("location: login.php");
} else {
    echo "Erro ao inserir os dados: " . mysqli_error($conexao);
}
}
}
?>




<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário </title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #444445, #3f4445, #53666e);        }
        .box{
            margin-top: 5%;
            margin-bottom: 5%;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #53666e;
            padding: 15px;
            border-radius: 15px;
            width: 25%;
        }
        fieldset{
            border: 3px solid white;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        .backs{
            color: white;
        }
        #aviso {
        padding: 10px;
        text-align: center;
        background-color: #f8d7da; /* Cor de fundo vermelha */
        border: 1px solid #f5c6cb; /* Cor da borda vermelha */
        border-radius: 5px;
        margin-bottom: 10px;
    }
    
    @media only screen and (max-width: 1100px) {
            .box {
                width: 30vw; /* 40% da largura da viewport */
            }
        }
        @media only screen and (max-width: 950px) {
            .box {
                width: 40vw; /* 40% da largura da viewport */
            }
        }
    @media only screen and (max-width: 600px) {
            .box {
                width: 70%;
            }}
    </style>
</head>
<body>
<a class="backs" href="login.php">Voltar</a>
    <div class="box">
        <form action="form.php" method="post">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Password</label>
                </div>
                <br><br>
                <?php if (!empty($mensagem_aviso)) { ?>
<div id="aviso" style="color: red;">
    <?php echo $mensagem_aviso; ?>
</div>
<?php } ?>

                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="datan" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Distrito</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>