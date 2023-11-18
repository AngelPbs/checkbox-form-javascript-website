<?php 
session_start();
include_once("config.php");
if((!isset($_SESSION["email"])==true) and (!isset($_SESSION["senha"])==true)){
  
  unset($_SESSION["email"] );
  unset($_SESSION["senha"] );
  header("location:login.php");
}
$logado =$_SESSION["email"];


$sql = "SELECT * FROM users WHERE email = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("s", $logado);

$stmt->execute();


$result = $stmt->get_result();




?>


<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
   body{ background: linear-gradient(to right, #444445, #3f4445, #53666e);
  color: white;
  text-align: center;
  
}
.table-bg{
  background: rgba(0,0,0,0.2);
  border-radius: 15px 15px 0 0;
}

@media (max-width: 650px) {

.tabela {
    display: block; 
}
tbody, td, tfoot, th, thead, tr{
display: block;
}
tbody tr{
color: whitesmoke;
}
thead{
  display: none;
}
}

    </style>

</head>
<body>
<nav class="navbar  bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand ms-4" style="color: gainsboro;" >Master D</a>
    <a href="./logged.php" class="btn btn-primary me-4">Voltar</a>
    <a href="./logout.php" class="btn btn-danger me-4">Logout</a>
  </div>
</nav>
<br>
    <?php
    echo "<h5> Seu perfil $logado </h5>"
    ?>

    <div class="m-5">
    <div class="table-responsive table-responsive">
    <table style="width:90%" class="table text-white table-bg">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Senha</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">Genero</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Cidade</th>
        <th scope="col">Distrito</th>
        <th scope="col">Endereço</th>
        <th scope="col">...</th>
      </tr>
  </thead>
  <tbody>
  <?php
          while($user_data=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$user_data["id"]."</td>";
            echo "<td>".$user_data["nome"]."</td>";
            echo "<td>";
            if ($user_data["email"] === $logado) {
              
              echo "<input style='background: linear-gradient(to right, #444445, #3f4445, #53666e); color:white' type='text' value='".$user_data["senha"]."' readonly>";
            } else {
            
              echo $user_data["senha"];
            }
            echo "</td>";
            echo "<td>".$user_data["email"]."</td>";
            echo "<td>".$user_data["telefone"]."</td>";
            echo "<td>".$user_data["genero"]."</td>";
            echo "<td>".$user_data["datan"]."</td>";
            echo "<td>".$user_data["cidade"]."</td>";
            echo "<td>".$user_data["estado"]."</td>";
            echo "<td>".$user_data["endereco"]."</td>";
            echo "<td>
              <a class='btn btn-sm btn-primary' href='edit.php?id=".$user_data['id']."'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
              </a>
            </td>";
            echo "</tr>";
          }
        ?>
  </tbody>
</table>
    </div>
    </div>
</body>
</html>