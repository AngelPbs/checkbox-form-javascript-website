//------------------ Carregamento Assincrono -----------------------------//

function buscarConteudo(url, callback) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback(this.responseText);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

// Texto inicial
const textoInicial = document.getElementById("conteudo").innerHTML;
// Mostrar conteudo de Empresarial
document.getElementById("EmpresarialPagina").addEventListener("click", () => {
  buscarConteudo("empresarial.html", (conteudo) => {
    document.getElementById("conteudo").innerHTML = conteudo;
    document.getElementById("conteudo").style.display = "block"; // mostrar o conteúdo
  });
});

// Mostrar conteudo de Portofolio
document.getElementById("PortofolioPagina").addEventListener("click", () => {
  buscarConteudo("portofolio.html", (conteudo) => {
    document.getElementById("conteudo").innerHTML = conteudo;
    document.getElementById("conteudo").style.display = "block"; // mostrar o conteúdo
  });
});
// Mostrar conteudo de Educacional
document.getElementById("EducacionalPagina").addEventListener("click", () => {
  buscarConteudo("educacional.html", (conteudo) => {
    document.getElementById("conteudo").innerHTML = conteudo;
    document.getElementById("conteudo").style.display = "block"; // mostrar o conteúdo
  });
});
// Mostrar conteudo de Blog
document.getElementById("BlogPagina").addEventListener("click", () => {
  buscarConteudo("blog.html", (conteudo) => {
    document.getElementById("conteudo").innerHTML = conteudo;
    document.getElementById("conteudo").style.display = "block"; // mostrar o conteúdo
  });
});

// Voltar para texto inicial
document.getElementById("PaginaInicial").addEventListener("click", () => {
  document.getElementById("conteudo").innerHTML = textoInicial; // substituir pelo texto inicial
});

// Evento para mostrar a barra de navegação em mobile
const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active");
});

//--------------------- Adicionar RSS feed--------------------------------- //

$.get(
  "https://rss-to-json-serverless-api.vercel.app/api?feedURL=http://feeds.tsf.pt/TSF-Ultimas",
  function (data) {
    let items = data.items;
    let obj = "";

    for (let i = 1; i < items.length; i++) {
      obj += `<div class='news'>`;
      obj += `<div class='title'> ${items[i].title}</div>`;
      obj += `<div class='category'>${items[i].category[1]}</div>`;
      obj += `<div><img class="img" src="${items[i].enclosures[0].url}"/></div>`;
      obj += `<div class='description'><p>${items[i].description}</p></div>`;
      obj += `<a href='"${items[i].link}"'>Leia mais</a><br><br><br>`;

      obj += `</div>`;
    }
    document.getElementById("caixa").innerHTML += obj;
  }
);

//--------------------- Formulario de Dados e Orçamento------------------------//

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

/* Validar inputs Nome , Apelido e numero telefone */

const nomeInput = document.getElementById("nome");
const apelidoInput = document.getElementById("apelido");
const telefoneInput = document.getElementById("telefone");
const errosDiv = document.getElementById("erros");

nomeInput.addEventListener("blur", () => validarNome(nomeInput, errosDiv));
apelidoInput.addEventListener("blur", () =>
  validarApelido(apelidoInput, errosDiv)
);
telefoneInput.addEventListener("blur", () =>
  validarTelefone(telefoneInput, errosDiv)
);

function validarNome(input, erros) {
  const nome = input.value.trim();

  if (nome === "") {
    input.setCustomValidity("Falta preencher");
    erros.innerText = "Por favor, preencha o nome";
  } else {
    input.setCustomValidity("");
    erros.innerText = "";
  }
}

function validarApelido(input, erros) {
  const apelido = input.value.trim();

  if (apelido === "") {
    input.setCustomValidity("Falta preencher");
    erros.innerText = "Por favor, preencha o apelido";
  } else {
    input.setCustomValidity("");
    erros.innerText = "";
  }
}

function validarTelefone(input, erros) {
  const telefone = input.value.trim();

  if (telefone === "") {
    input.setCustomValidity("Falta preencher");
    erros.innerText = "Por favor, preencha o número de telefone";
  } else if (telefone.length !== 9 || isNaN(telefone)) {
    input.setCustomValidity("Número de telefone inválido");
    erros.innerText =
      "Por favor, insira um número de telefone válido com 9 dígitos";
  } else {
    input.setCustomValidity("");
    erros.innerText = "";
  }
}

/*--------------Criação de Mapa ---------------------*/

var map = L.map("map").setView([41.14813354712846, -8.60799776722076], 11);
L.tileLayer(
  "https://{s}.basemaps.cartocdn.com/rastertiles/voyager_labels_under/{z}/{x}/{y}{r}.png",
  {
    maxZoom: 19,
    attribution:
      '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }
).addTo(map);
var marker = L.marker([41.15675870281856, -8.611931363203464])
  .addTo(map)
  .bindPopup("Master D");

function success(pos) {
  `Latitute : ${pos.coords.latitude} , Longitude : ${pos.coords.longitude}`;

  if (map === undefined) {
    map = L.map("map").setView([pos.coords.latitude, pos.coords.longitude], 11);
  } else {
    map.remove();
    map = L.map("map").setView([pos.coords.latitude, pos.coords.longitude], 11);
  }
  L.tileLayer(
    "https://{s}.basemaps.cartocdn.com/rastertiles/voyager_labels_under/{z}/{x}/{y}{r}.png",
    {
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }
  ).addTo(map);

  L.marker([41.15735221917966, -8.609094531830706], {})
    .addTo(map)
    .bindPopup("Master D");
  L.marker([pos.coords.latitude, pos.coords.longitude])
    .addTo(map)
    .bindPopup("Você está aqui")
    .openPopup();

  var rota = L.Routing.control({
    waypoints: [
      L.latLng([41.15735221917966, -8.609094531830706]),
      L.latLng([pos.coords.latitude, pos.coords.longitude]),
    ],
  }).addTo(map);
}
function error(err) {
  alert("nao quer ser vista");
}
var watchID = navigator.geolocation.watchPosition(success, error, {
  enableHighAccuracy: true,
  Timeout: 5000,
});
map.on("click", function (e) {
  console.log(e);
  var newMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
  L.Routing.control({
    waypoints: [
      L.latLng(28.238, 83.9956),
      L.latLng(e.latlng.lat, e.latlng.lng),
    ],
  })
    .on("routesfound", function (e) {
      var routes = e.routes;
      console.log(routes);

      e.routes[0].coordinates.forEach(function (coord, index) {
        setTimeout(function () {
          marker.setLatLng([coord.lat, coord.lng]);
        }, 100 * index);
      });
    })
    .addTo(map);
});

//---------- Formulário de Contacto--------------//

const form = document.getElementById("form");
const username = document.getElementById("username");
const lastname = document.getElementById("lastname");
const telefone = document.getElementById("ContactoTelefone");
const email = document.getElementById("email");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  validateInputs();
});

const setError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = message;
  inputControl.classList.add("error");
  inputControl.classList.remove("success");
};

const setSuccess = (element) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = "";
  inputControl.classList.add("success");
  inputControl.classList.remove("error");
};

const isValidEmail = (email) => {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
};

const validateInputs = () => {
  const usernameValue = username.value.trim();
  const lastnameValue = lastname.value.trim();
  const emailValue = email.value.trim();
  const telefoneValue = ContactoTelefone.value.trim();

  if (usernameValue === "") {
    setError(username, "Preencha com seu nome");
  } else {
    setSuccess(username);
  }
  if (lastnameValue === "") {
    setError(lastname, "Preencha com seu apelido");
  } else {
    setSuccess(lastname);
  }
  if (telefoneValue === "" || telefoneValue.length != 9) {
    setError(telefone, "Preencha com 9 digitos");
  } else {
    setSuccess(telefone);
  }

  if (emailValue === "") {
    setError(email, "Preencha com seu Email");
  } else if (!isValidEmail(emailValue)) {
    setError(email, "Email inválido");
  } else {
    setSuccess(email);
  }
};
