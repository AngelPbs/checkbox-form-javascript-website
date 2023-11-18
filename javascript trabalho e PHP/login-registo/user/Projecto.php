<?php
session_start();
include_once("config.php");
if ((!isset($_SESSION["email"]) == true) and (!isset($_SESSION["senha"]) == true)) {
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
    header("location:login.php");
}
$logado = $_SESSION["email"];

$sql = "SELECT * FROM projecto WHERE email = ?";

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
}

    </style>

</head>
<body>
<nav class="navbar  bg-body-tertiary">
  <div class="container-fluid ">
    <a class="navbar-brand ms-4" style="color: gainsboro;" >Master D</a>
    <a href="./logged.php" class="btn btn-primary me-4">Voltar</a>
    <a href="./sair.php" class="btn btn-danger me-4">Logout</a>
  </div>
</nav>
<br>
    <?php
    echo "<h5>Os seus projectos  </h5>"
    ?>
    <div class="mt-4 container">
    
    <table style="width: 90%;"  class="table text-white table-bg tabela">
  <thead >
    <tr>
        <th scope="col">email</th>
        <th scope="col">tipo de pagina</th>
        <th scope="col">meses</th>
        <th scope="col">valor</th>
        <th scope="col">checkboxs</th>
        <th scope="col"><a href='delete.php?id=$user_data[email]' class='btn btn-sm btn-danger'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
  <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
</svg> Apagar todos
</a>
</th>
      </tr>
  </thead>
  <tbody>
    <?php
   while($user_data=mysqli_fetch_assoc($result)){
    echo"<tr>";
    echo"<td>".$user_data["email"]."</td>";
    echo"<td>".$user_data["pagina"]."</td>";
    echo"<td>".$user_data["mes"]."</td>";
    echo"<td>".$user_data["valor"]."</td>";
    echo"<td>".$user_data["checks"]."</td>"; 
    echo"<td>
  <a >
    </td>";
    echo"</tr>";
   }
    ?>
  </tbody>
</table>
   
    </div>
</body>
</html>