<?php
session_start();
include_once("config.php");

if((!isset($_SESSION["email"])==true) and (!isset($_SESSION["senha"])==true)){
  
  unset($_SESSION["email"] );
  unset($_SESSION["senha"] );
  header("location:login.php");
}

$reuniao = []; 

if (isset($_GET['id'])) {
    $meetingId = $_GET['id'];
    $query = "SELECT * FROM reuniao WHERE id = $meetingId";
    $result = $conexao->query($query);
    $reuniao = $result->fetch_assoc();

    $currentTime = time();
    $meetingTime = strtotime($reuniao['datar']);
    $timeDifference = $meetingTime - $currentTime;

    // Check if the time difference is greater than 72 hours (72 hours * 3600 seconds)
    $AlterarData = ($timeDifference > 72 * 3600);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipoReuniao'];
    $dataReuniao = $_POST['dataReuniao'];
    $observacoes = $_POST['observacoes'];

    $updateQuery = "UPDATE reuniao SET tipo = '$tipo', datar = '$dataReuniao', observacoes = '$observacoes' WHERE id = $meetingId";
    
    if ($conexao->query($updateQuery) === TRUE) {
        header('Location: reuniao.php'); 
        exit();} else {
          $errorMessage = "Erro a editar reuniao";
      }
  }
?>



<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar reuniao</title>
  <link rel="stylesheet" href="../../css/cssFile.css" />
  <style>
    body{
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .formulario {
      height: 500px;
      
    }
    h3{
      font-size: 25px;
      padding-bottom: 25px;
      padding-top: 25px;
    }
    label{
      font-size:18px}
      select{
        padding: 3px;
      }
      input[type='date']{
        padding: 3px;}
    
        #btn-reuniao{
          background-color:cornflowerblue ;
          color: white;
          border: 1px solid white;
          border-radius: 3px;
          font-size: 16px;
          width: 30%;
          padding: 10px;
          cursor: pointer;
        }
        #btn-voltar{
width: 30%;
padding: 10px;
border: 1px solid white;
          border-radius: 3px;
          font-size: 16px;
          text-align: center;
          cursor: pointer;
        }

        #btns{
          margin-top: 20px;
          display: flex;
          align-items: center;
          justify-content: space-around;
        }
        #btn-voltar a {
          text-decoration:none;
        }
  </style>
</head>
<body>
<div class="formulario mt-0 p-5">
        
<form id="FormReuniao" action="edit_reuniao.php?id=<?php echo $reuniao['id']; ?>" method="post">
        <h3 class="mb-5">Agendar Reunião</h3>
  
          <label for="tipoReuniao">Escolha o tipo de reunião:</label>
          <select id="tipoReuniao" name="tipoReuniao" required>
    <option value="Resumo" <?php if ($reuniao["tipo"] === "Resumo") echo "selected"; ?>>1º Reunião + Resumo</option>
    <option value="layout" <?php if ($reuniao["tipo"] === "Layout") echo "selected"; ?>>Layout + Design</option>
              <option value="conteudo"<?php if ($reuniao["tipo"] === "conteudo") echo "selected";  ?>>Conteúdo</option>
              <option value="testesFinal"<?php if ($reuniao["tipo"] === "testesFinal") echo "selected";  ?>>Testes + Finalizar</option>
          </select>
          <br><br>
          
          <label for="dataReuniao">Escolha uma data para a reunião:</label>
          <br>
          <input type="date" id="dataReuniao" name="dataReuniao" min="<?php echo date('Y-m-d'); ?>"
               <?php if (!$AlterarData) echo "disabled"; ?>
               required value="<?php echo $reuniao["datar"]; ?>">
        <?php if (!$AlterarData) echo "<p>You cannot edit the date anymore.</p>"; ?>
        <br><br>
          
          <label for="observacoes">Observações:</label>
          <textarea id="observacoes" name="observacoes" rows="7" cols="40" placeholder="Deixe suas observações aqui..."><?php echo $reuniao["observacoes"]; ?></textarea>
          <br><br>
          <div id="btns">
          <input id="btn-reuniao" type="submit" value="Editar Reunião">
          <button id="btn-voltar"><a  href="reuniao.php">Voltar</a></button>
          </div>
      </form>
        </div>
      
</body>
</html>