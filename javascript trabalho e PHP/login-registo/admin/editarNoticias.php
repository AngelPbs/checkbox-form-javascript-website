<?php
session_start();


if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: login.php');
    exit();
}

include_once('config.php');


function atualizarJSON($noticias)
{
    $json_data = json_encode($noticias, JSON_PRETTY_PRINT);
    file_put_contents('../noticias/noticias.json', $json_data);
}


if (isset($_POST['submit'])) {
    $noticias = json_decode(file_get_contents('../noticias/noticias.json'), true);

    foreach ($_POST['noticias'] as $index => $dados_noticia) {
        $titulo = $dados_noticia['titulo'];
        $conteudo = $dados_noticia['conteudo'];
         // Verifica se foi feito upload de uma nova imagem
         if ($_FILES['imagem']['error'][$index] === UPLOAD_ERR_OK) {
            $imagem_tmp = $_FILES['imagem']['tmp_name'][$index];
            $nome_imagem = $_FILES['imagem']['name'][$index];
            move_uploaded_file($imagem_tmp, '../noticias/' . $nome_imagem);
            $noticias[$index]['imagem'] = '../noticias/' . $nome_imagem;}

        // Atualiza os dados na base de dados
        $sql = "UPDATE noticia SET titulo = ?, conteudo = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssi", $titulo, $conteudo, $index); 
        $stmt->execute();
    }

    // Atualiza os dados no arquivo JSON
    atualizarJSON($noticias);

    // Redireciona para a página 
    header('Location: logAdmin.php');
    exit();
}

// Carrega os dados do banco de dados
$sqlSelect = "SELECT * FROM noticia";
$result = $conexao->query($sqlSelect);
$noticias = array();

if ($result->num_rows > 0) {
    while ($noticia_data = mysqli_fetch_assoc($result)) {
        $noticias[] = $noticia_data;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
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
@media (max-width: 640px) {
        textarea {
            width: 80%;
        }
        input{
            width: 90%;
        }
            
        }
</style>
</head>
<body>
<nav class="navbar  bg-body-tertiary">
  <div class="container-fluid ">
    <a class="navbar-brand ms-4" style="color: gainsboro;" >Master D</a>
    <a href="logAdmin.php" class="btn btn-primary me-4">Voltar</a>
    <a href="./sair.php" class="btn btn-danger me-4">Logout</a>
  </div>
</nav>
    
<form method="post" enctype="multipart/form-data">
    <?php foreach ($noticias as $index => $noticia) : ?>
        <fieldset>
            <legend>Notícia <?php echo $index + 1; ?></legend>
            <label style="font-size:25px; font-weight:700; margin-bottom:10px">Título:</label>
            <br>
            <input type="text" size="40px" style="text-align: center; margin-bottom: 15px; background-color:#53666e;color:white" name="noticias[<?php echo $index; ?>][titulo]" value="<?php echo $noticia['titulo']; ?>"><br>
            <label style="font-size:25px; font-weight:700;margin-bottom:10px">Conteúdo:</label>
            <br>
            <textarea style="background-color:#53666e;color:white; margin-bottom: 15px" name="noticias[<?php echo $index; ?>][conteudo]" cols="80" rows="7"><?php echo $noticia['conteudo']; ?></textarea><br>
            <label style="font-size:25px; font-weight:700;margin-bottom:10px">Imagem:</label>
            <br>
            
            <?php if (isset($noticia['imagem'])) : ?>
                <img src="<?php echo $noticia['imagem']; ?>" alt="Imagem da notícia" width="200px"><br>
            <?php endif; ?>
           
            <input type="file" name="imagem[<?php echo $index; ?>]">
            <hr>
        </fieldset>
    <?php endforeach; ?>
    <input class="btn btn-primary" style="margin-bottom: 30px;" type="submit" name="submit" value="Salvar Alterações">
</form>
</body>
</html>
