<?php 
session_start();
include_once("config.php");


    if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
      header('Location: login.php');
      exit(); // 
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


?>




<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>trabalho final de javascript</title>
    <link rel="stylesheet" href="../../css/cssFile.css" />
    <link rel="stylesheet" href="../../css/lightbox.css" />
    <link rel="stylesheet" href="../noticias/noticiasCss.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
   
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    <script src="https://kit.fontawesome.com/ded43523ba.js"crossorigin="anonymous"></script>
    
  </head>
  <body>
    <div class="navebar">
      <div class="brand-title"> Master D</div>
      <a href="#" class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </a>
      <nav class="navbar-links ">
        <ul>
          <li><a href="./logAdmin.php" >Home</a></li>
<li><a href="./sistema.php"  >Perfis</a></li>
<li><a href="./projectos.php"  >Projectos</a></li>
<li><a href="./reunioes.php"  >Reuniões</a></li>
<li><a href="./editarNoticias.php"  >Editar Noticias</a></li>
<li><a href="./sair.php"  >Logout</a></li>

          
        </ul>
      </nav>
    </div>
    <div class="m-4" style="text-align: center; color:white">
    <?php
    echo "<h5>Bem vindo Admnistrador  </h5>"
    ?>
    </div>
    <div class="noticias-section text-center text-decoration-none m-3">
  <h2 >Últimas notícias</h2>
  <ul id="noticias-list"></ul>
</div>
<div id="noticia-completa" class="noticia-completa"></div>
        </div>
        <div id="conteudos">
        
          <div class="ConteudoAlterar">
            
            <h2>Bem-vindo(a) à nossa agência de criação de sites!</h2>
            <p> Nós sabemos que a sua presença online é fundamental para o sucesso do seu negócio.
             <p>É por isso que estamos aqui para ajudá-lo(a) a criar um site profissional e eficaz que irá aumentar a visibilidade da sua marca e atrair mais clientes.
            Com a nossa experiência e conhecimento, podemos ajudá-lo(a) a criar um site único e personalizado que irá destacar a sua marca e proporcionar uma experiência de usuário excepcional.</p>
             Além disso, vamos garantir que o seu site seja otimizado para os motores de busca, para que você possa ser encontrado(a) facilmente pelos seus clientes. 
            Não perca mais tempo com sites desatualizados e pouco eficazes. Deixe-nos ajudá-lo(a) a construir um site de sucesso que irá impulsionar o seu negócio para novos patamares.
             Entre em contato conosco hoje mesmo e comece a construir a presença online que você merece!</p>
        </div>
      </div>
        <
      
    
       <div class="container-fluid d-flex align-items-center justify-content-around mt-4 mb-4">
        <div class="gallery ">
          <a href="../../galeria/blog1.png" data-lightbox="gallery" data-title="Exemplo de Blog"><img src="../../galeria/blog1.png" alt=""></a>
          <a href="../../galeria/blog2.png" data-lightbox="gallery" data-title="Exemplo de Blog"><img src="../../galeria/blog2.png" alt=""></a>
          <a href="../../galeria/blog3.png" data-lightbox="gallery" data-title="Exemplo de Blog"><img src="../../galeria/blog3.png" alt=""></a>
          <a href="../../galeria/educacional1.jpg" data-lightbox="gallery" data-title="Exemplo de site educacional"> <img src="../../galeria/educacional1.jpg" alt=""></a>
          <a href="../../galeria/educacional2.webp" data-lightbox="gallery" data-title="Exemplo de site educacional"> <img src="../../galeria/educacional2.webp" alt=""></a>
          <a href="../../galeria/educacional3.jpg" data-lightbox="gallery" data-title="Exemplo de site educacional"> <img src="../../galeria/educacional3.jpg" alt=""></a>
          <a href="../../galeria/empresarial1.jpg" data-lightbox="gallery" data-title="Exemplo de site empresarial"> <img src="../../galeria/empresarial1.jpg" alt=""></a>
          <a href="../../galeria/empresarial2.jpg" data-lightbox="gallery" data-title="Exemplo de site empresarial"> <img src="../../galeria/empresarial2.jpg" alt=""></a>
          <a href="../../galeria/empresarial3.png" data-lightbox="gallery" data-title="Exemplo de site empresarial"> <img src="../../galeria/empresarial3.png" alt=""></a>
          <a href="../../galeria/portofolio1.jpeg" data-lightbox="gallery" data-title="Exemplo de portfólio"> <img src="../../galeria/portofolio1.jpeg" alt=""></a>
          <a href="../../galeria/portofolio2.jpg" data-lightbox="gallery" data-title="Exemplo de portfólio"> <img src="../../galeria/portofolio2.jpg" alt=""></a>
          <a href="../../galeria/portofolio3.jpg" data-lightbox="gallery" data-title="Exemplo de portfólio"> <img src="../../galeria/portofolio3.jpg" alt=""></a>
        </div>

       </div>
      </div>
    
    
     
    


  <div class=" d-flex justify-content-center   m-4 ContainerContactos ">
    <div class="DadosEmpresa d-flex flex-column align-items-center ">
      
      <h3>Master D</h3>
      <p> Morada : Rua de Camões 497, 4000-147 Porto</p>
      <p>Contacto : 22 608 0780</p>
      <p>Mais sobre nós </p>
    
    <div class="PaginasDigitais">
      <p>
        
        <a
          href="https://www.facebook.com/MasterDPortugal"
          rel="noreferrer"
          title="Master D Facebook"
          target="_blank"
        >
          <i class="fa-brands fa-facebook" style="color: #5186e1"
            ><use xlink:href="#i-facebook"></use
          ></a></i>
        

        <a
          href="https://www.youtube.com/user/MasterDPortugal"
          rel="noreferrer"
          title="Master D Youtube"
          target="_blank"
          ><i class="fa-brands fa-youtube" style="color: #e52706"
            ><use xlink:href="#i-youtube"></use
          ></a></i>
        
          <a
          href="https://www.linkedin.com/showcase/masterdportugal/"
          rel="noreferrer"
          title="Master D Linkedin"
          target="_blank"
        >
          <i class="fa-brands fa-linkedin" style="color: #2671f2"
            ><use xlink:href="#i-linkedin"></use
          > </a></i>
        
        
          <a href="https://twitter.com/MasterDPortugal"
          rel="noreferrer"
          title="Master D Twitter"
          target="_blank" >
          <i class="fa-brands fa-twitter" style="color: #327cfb"
            ><use xlink:href="#i-twitter"></use>
        </a></i>
        <a href="https://www.instagram.com/masterd.portugal/?hl=en" rel="noreferrer" title="Master D Instagram" target="_blank">
          <i class="fa-brands fa-instagram" style="color: #f551df;"><use xlink:href="#i-instagram"></use></i>
        </a>
      </p>
    </div>
  </div>
    
    
  </div>
   
    </div>




    <script>
    // Evento para mostrar a barra de navegação em mobile
const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active");
});
</script>
    <script src="../js/javascriptFile.js"></script>
<script src="../../javascript/lightbox-plus-jquery.js"></script> 

 </body>
</html>
