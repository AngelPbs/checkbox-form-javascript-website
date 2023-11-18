<?php 
session_start();
include_once("config.php");
if((!isset($_SESSION["email"])==true) and (!isset($_SESSION["senha"])==true)){
  
  unset($_SESSION["email"] );
  unset($_SESSION["senha"] );
  header("location:login.php");
}
$logado =$_SESSION["email"];



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
    <style>
      #sessao{
        color: #2671f2;
      }

      
    </style>
  </head>
  <body>
    <div class="navebar">
      <div class="brand-title"> Master D</div>
      <a href="#" class="toggle-button" >
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </a>
      <nav class="navbar-links ">
        <ul>
          <li><a href="./logged.php" >Home</a></li>
<li><a href="./sistema.php"  >Editar Perfil</a></li>
<li><a href="./Projecto.php" >Projectos</a></li>
<li><a href="./reuniao.php" >Reuniões</a></li>
<li><a href="./logout.php">Logout</a></li>

          
        </ul>
      </nav>
    </div>
    <div class="m-4" style="text-align: center; color:white">
    <?php
    echo "<h5 id='sessao' style> Sessão iniciada com : $logado </h5>"
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
    
    <div
      class="container-fluid d-flex justify-content-evenly align-items-center mb-5 ContainerFormularios ">
    
      <div class="formulario mt-0 p-5">
        
        <form action="loggedForm.php" method="post" id="formulario">
          
          <div id="erros"></div>
          <h3>Pedido de Orçamento</h3>
          Tipo de página Web :
          <select name="seleçao">
            <option value="TipoDeSite">Escolha tipo de site</option>
            <option value="Blog" class="selecaoSite">Blog-150€</option>
            <option value="Empresarial" class="selecaoSite">
              Empresarial-300€
            </option>
            <option value="Educacional" class="selecaoSite">
              Educacional-250€
            </option>
            <option value="Portfolios" class="selecaoSite">
              Portfólios-150€
            </option></select
          ><br />
          Prazo em meses
          <input
          name="mes"
            type="number"
            id="prazoMes"
            class="inputFormulario"
            min="0"
            value="0" 
          /><br />

          <p style="font-weight: bold; margin-top: 10px">
            Marque os separadores desejados
          </p>
          <input type="checkbox" name="data[]" class="checkbox" value="Quem somos" />Quem somos
<input type="checkbox" name="data[]" class="checkbox" value="Onde estamos" />Onde estamos<br />
<input type="checkbox" name="data[]" class="checkbox" value="Galeria de fotografias" />Galeria de fotografias
<input type="checkbox" name="data[]" class="checkbox" value="eCommerce" />eCommerce<br />
<input type="checkbox" name="data[]" class="checkbox" value="Gestão interna" />Gestão interna
<input type="checkbox" name="data[]" class="checkbox" value="Noticías" />Noticías<br />
<input type="checkbox" name="data[]" class="checkbox" value="Redes Sociais" />Redes Sociais

          <br />
          <br />
          <h4>Orçamento estimado</h4>
          (É um valor meramente indicativo , pode sofrer alterações) <br />
          <input
            type="text"
            name="valor"
            id="total"
            class="inputFormulario"
            style="background-color: gray;"
            readonly
          />
          <input type="submit" name="submit">
        </form>
      </div>
      <div class="formulario mt-0 p-5">
        
      <form id="FormReuniao" action="reuniao_process.php" method="post">
      <h3 class="mb-5">Agendar Reunião</h3>

        <label for="tipoReuniao">Escolha o tipo de reunião:</label>
        <select id="tipoReuniao" name="tipoReuniao" required>
            <option value="Resumo">1º Reunião + Resumo</option>
            <option value="layout">Layout + Design</option>
            <option value="conteudo">Conteúdo</option>
            <option value="testesFinal">Testes + Finalizar</option>
        </select>
        <br><br>
        
        <label for="dataReuniao">Escolha uma data para a reunião:</label>
        <input type="date" id="dataReuniao" name="dataReuniao" min="<?php echo date('Y-m-d'); ?>" required>
        <br><br>
        
        <label for="observacoes">Observações:</label>
        <textarea id="observacoes" name="observacoes" rows="4" cols="40" placeholder="Deixe suas observações aqui..."></textarea>
        <br><br>
        
        <input id="btn-reuniao" type="submit" value="Agendar Reunião">
    </form>
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
