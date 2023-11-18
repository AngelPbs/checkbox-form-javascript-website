//Adicionar e remover focus para melhor visualização //

$(".inputFormulario").focus((e) => {
  $(e.target).addClass("inputFocado");
});
$(".inputFormulario").blur((e) => {
  $(e.target).removeClass("inputFocado");
});

/* Aplicar onChange nos checkbox */
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
});

// Função para buscar as últimas notícias através de uma requisição AJAX em PHP
function buscarNoticias() {
  // Faz uma requisição AJAX para obter as notícias em formato JSON
  fetch("../noticias/noticias.json")
    .then((response) => response.json())
    .then((data) => exibirNoticias(data))
    .catch((error) => console.error("Erro ao buscar notícias:", error));
}

// Função para exibir as notícias na página
function exibirNoticias(noticias) {
  const noticiasList = document.getElementById("noticias-list");
  noticiasList.innerHTML = ""; // Limpa a lista antes de adicionar novas notícias

  noticias.slice(0, 5).forEach((noticia) => {
    const listItem = document.createElement("li");
    const link = document.createElement("a");
    link.textContent = noticia.titulo;
    link.href = "#"; // Pode ser uma página específica da notícia
    link.addEventListener("click", () => exibirNoticiaCompleta(noticia));
    listItem.appendChild(link);
    noticiasList.appendChild(listItem);
  });
}

// Função para exibir a notícia completa no corpo da web
function exibirNoticiaCompleta(noticia) {
  const noticiaCompleta = document.getElementById("noticia-completa");
  noticiaCompleta.innerHTML = `
      <h4>${noticia.titulo}</h4>
      <img src="${noticia.imagem}" alt="${noticia.titulo}" style="width: 400px; height: auto;">
      <p>${noticia.conteudo}</p>
      <button onclick="fecharNoticia()">Fechar</button>
    `;
}

// Função para fechar o conteúdo da notícia completa
function fecharNoticia() {
  const noticiaCompleta = document.getElementById("noticia-completa");
  noticiaCompleta.innerHTML = ""; // Limpa o conteúdo
}

// Chama a função para buscar as notícias ao carregar a página
buscarNoticias();
