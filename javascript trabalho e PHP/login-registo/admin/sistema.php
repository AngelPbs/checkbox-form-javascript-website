<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);

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

   
    if(mysqli_num_rows($result) < 1)
    {
        header('Location: login.php');
        exit(); 
    }
    $logado = $_SESSION['email'];
    
        $sql = "SELECT * FROM users ORDER BY id DESC";
    
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
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

tbody tr {
    margin-bottom: 20px;
    
  }
}

    </style>
</head>
<body>
<nav class="navbar  bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand ms-4" style="color: gainsboro;" >Master D</a>
    <a href="logAdmin.php" class="btn btn-primary me-4">Voltar</a>
    <a href="sair.php" class="btn btn-danger me-4">Logout</a>
  </div>
</nav>
    <br>
    
    <br>

    </div>
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
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        if ($user_data['senha'] === 'senha') {
                            echo "<td>".$user_data['senha']."</td>";
                        } else {
                            echo "<td>**********</td>"; 
                        }
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['genero']."</td>";
                        echo "<td>".$user_data['datan']."</td>";
                        echo "<td>".$user_data['cidade']."</td>";
                        echo "<td>".$user_data['estado']."</td>";
                        echo "<td>".$user_data['endereco']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='deleteUser.php?id=$user_data[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
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