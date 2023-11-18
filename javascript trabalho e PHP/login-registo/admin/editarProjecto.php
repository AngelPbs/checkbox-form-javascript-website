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


if (mysqli_num_rows($result) < 1) {
    header('Location: login.php'); 
    exit(); 
}
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM projecto WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $id = $user_data["id"];
                $email = $user_data["email"];
                $pagina = $user_data["pagina"];
                $mes = $user_data["mes"];
                $checks = $user_data["checks"];
                $valor = $user_data["valor"];
            }
        }
        else
        {
            header('Location: projectos.php');
        }
    }
    else
    {
        header('Location: projectos.php');
    }
 
  if (isset($_POST['update']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $pagina = $_POST['seleçao'];
    $mes = $_POST['mes'];
    $checks = implode(', ', $_POST['data']);
   
    $valor = $_POST["valor"];


    $sqlUpdate = "UPDATE projecto SET pagina='$pagina', mes='$mes', checks='$checks', valor='$valor' WHERE id=$id";
    if ($conexao->query($sqlUpdate) === TRUE) {
       
        header('Location: projectos.php');
    } else {
        echo "Erro ao atualizar os dados ";
    }
}


?>

<!DOCTYPE html>
<html lang="pt">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Save Edit</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
     body{ background: linear-gradient(to right, #444445, #3f4445, #53666e);
  color: white;
  text-align: center;
}
#container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }

        .box {
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 25%;
        }
        fieldset{
            border: 3px solid dodgerblue;
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
        #voltar{
            margin-bottom: 30px;
        }
        @media (max-width: 1000px) {
            .box {
                width: 40%; /* Largura do formulário para telas menores */
            }
        }
        @media (max-width: 700px) {
            .box {
                width: 70%; /* Largura do formulário para telas menores */
            }
        }
  </style>
    
</head>
<body>
    <div id="container">
    <a style="color: white; font-size:20px;" href="projectos.php">Voltar</a>
   
    <div class="box">
        <form action="editarProjecto.php" method="POST">
            <fieldset>
                <legend><b>Editar Orçamento</b></legend>
                <br>
                <div class="inputBox">
                    <select name="seleçao"style="padding:5px; font-size:15px" >
                        <option value="TipoDeSite">Escolha tipo de site</option>
                        <option value="Blog" class="selecaoSite" <?php echo ($pagina == 'Blog') ? 'selected' : ''; ?>>Blog-150€</option>
                        <option value="Empresarial" class="selecaoSite" <?php echo ($pagina == 'Empresarial') ? 'selected' : ''; ?>>Empresarial-300€</option>
                        <option value="Educacional" class="selecaoSite" <?php echo ($pagina == 'Educacional') ? 'selected' : ''; ?>>Educacional-250€</option>
                        <option value="Portfolios" class="selecaoSite" <?php echo ($pagina == 'Portfolios') ? 'selected' : ''; ?>>Portfólios-150€</option>
                    </select>
                </div>
                <br><br>
                <div class="inputBox">
                    Prazo em meses
                    <input
                    style="width: 45px; padding: 5px; text-align:center"  
                        name="mes"
                        type="number"
                        id="prazoMes"
                        class="inputFormulario"
                        min="0"
                        value=<?php echo $mes; ?>
                    >
                    <br>
                </div>
                <br><br>
                <div class="inputBox">
                    <p style="font-weight: bold; margin-top: 10px">
                        Marque os separadores desejados
                    </p>
                    <input type="checkbox" name="data[]" class="checkbox" value="Quem somos" <?php echo (in_array('Quem somos', explode(',', $checks))) ? 'checked' : ''; ?> />Quem somos
    <input type="checkbox" name="data[]" class="checkbox" value="Onde estamos" <?php echo (in_array('Onde estamos', explode(',', $checks))) ? 'checked' : ''; ?> />Onde estamos<br />
    <input type="checkbox" name="data[]" class="checkbox" value="Galeria de fotografias" <?php echo (in_array('Galeria de fotografias', explode(',', $checks))) ? 'checked' : ''; ?> />Galeria de fotografias
    <input type="checkbox" name="data[]" class="checkbox" value="eCommerce" <?php echo (in_array('eCommerce', explode(',', $checks))) ? 'checked' : ''; ?> />eCommerce<br />
    <input type="checkbox" name="data[]" class="checkbox" value="Gestão interna" <?php echo (in_array('Gestão interna', explode(',', $checks))) ? 'checked' : ''; ?> />Gestão interna
    <input type="checkbox" name="data[]" class="checkbox" value="Noticías" <?php echo (in_array('Noticías', explode(',', $checks))) ? 'checked' : ''; ?> />Noticías<br />
    <input type="checkbox" name="data[]" class="checkbox" value="Redes Sociais" <?php echo (in_array('Redes Sociais', explode(',', $checks))) ? 'checked' : ''; ?> />Redes Sociais
</div>
                <br><br>
                <h4>Orçamento estimado</h4>
                (É um valor meramente indicativo, pode sofrer alterações) <br />
                <div class="inputBox">
                    <input
                    style="background-color: #444445; color:white;text-align:center; padding:10px"
                        type="text"
                        name="valor"
                        id="total"
                        class="inputFormulario"
                        value="<?php echo $valor." Euros" ?>"
                    />
                </div>
                <br><br>
                <input type="hidden" name="id" value=<?php echo $id; ?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
    </div>

</body>
<script>
$("select, input").change(function () {
  /*Criação das variaveis */
  let option = $(".selecaoSite:selected").val();
  let months = parseInt($("#prazoMes").val());
  let checkboxes = $(".checkbox:checked").length;
  let total = 0;

  /* Adicionar o valor na opção Select */

  if (option == "Blog") {
    total = 150;
  } else if (option == "Empresarial") {
    total = 300;
  } else if (option == "Educacional") {
    total = 300;
  } else if (option == "Portfolios") {
    total = 100;
  }

  /*Multiplicar cada checkbox selecionada por 400 */
  total += checkboxes * 400;
  /* Aplicar descontos consoante nº de meses escolhidos */
  if (months == 1) {
    total *= 0.95;
  } else if (months == 2) {
    total *= 0.9;
  } else if (months == 3) {
    total *= 0.85;
  } else if (months >= 4) {
    total *= 0.8;
  }

  /* Valor final no input devido */
  $("#total").val(total + " Euros");
  $("#total").css("color", "white");
});</script>
</html>
