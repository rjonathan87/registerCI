var url = document.getElementById("site_url").value;
const tabla = document.getElementById("tbl_list");

lista();
var datos = [];

function lista() {
  let urlGet = url + "usuarios/listaUsuariosAll";

  fetch(urlGet)
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      vaciarTabla();
      datos = data;
      llenarTabla();
    })
    .catch(function () {
      console.log("Booo");
    });
}

function vaciarTabla() {
  if (tabla.children[1] != null) {
    //vacía tabla en vista
    var rowCount = tabla.rows.length;
    for (var i = rowCount - 1; i > 0; i--) {
      tabla.deleteRow(i);
    }
    // vacía el array
    datos.splice(0, datos.length);
  }
}

function llenarTabla() {
  datos.forEach((element, index) => {
    tbody = tabla.createTBody();
    var row = tbody.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = element.id_usuario;
    cell2.innerHTML = `<i class="fa fa-user"></i> ${element.nombre} ${element.ap_patern} ${element.ap_matern} `;
    cell3.innerHTML = `<i class="fa fa-phone"></i> ${element.tel1} <br><i class="fa fa-mobile-phone"></i> ${element.tel2}`;
    cell4.innerHTML = `<i class="fa fa-envelope-o"></i> ${element.email}`;
    cell5.innerHTML = ` <button type="button" class="btn btn-success" 
                                data-toggle="modal" data-target="#ModalData" title="Editar" 
                                onClick="edit(${index})"
                            >
                                <i class="fa fa-pencil"></i>
                            </button> 
                            <button type="button" class="btn btn-danger" title="Eliminar" 
                                onClick="deleteU(${element.id_usuario})"
                            >
                                <i class="fa fa-trash"></i>
                            </button>
                            `;
  });
}

function edit(index) {
  document.getElementById("id_usuario").value = datos[index]["id_usuario"];
  document.getElementById("nombre").value = datos[index]["nombre"];
  document.getElementById("ap_patern").value = datos[index]["ap_patern"];
  document.getElementById("ap_matern").value = datos[index]["ap_matern"];
  document.getElementById("tel1").value = datos[index]["tel1"];
  document.getElementById("tel2").value = datos[index]["tel2"];
  document.getElementById("email").value = datos[index]["email"];
  document.getElementById("usuario").value = datos[index]["usuario"];
  document.getElementById("password").value = "";
  document.getElementById("status").value = datos[index]["status"];
  document.getElementById("nivel").value = datos[index]["nivel"];
  document.getElementById("fotografia").value = datos[index]["fotografia"];
}

var save = () => {
  let id_usuario = document.getElementById("id_usuario").value;
  let pass1 = document.getElementById("password").value;
  let pass2 = document.getElementById("password-confirm").value;

  if (pass1 != "" && pass2 != "") {
    //se va a cambiar el password
    //verifica si los dos password son iguales
    if (pass1 !== pass2) {
      // no son iguales
      alert("Los password no son iguales");
      return;
    }
  }
  let urlPut = url + "usuarios/guardarUsuario";

  let form = document.getElementById("frmEdit");
  let data = new FormData(form);

  var input = document.querySelector('input[type="file"]')
  data.append('fotografia', input.files[0])

  fetch(urlPut, {
      method: "post",
      headers: new Headers(),
      body: data
    })
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      lista();
    })
    .catch(function (err) {
      console.error(err);
    });
};

var deleteU = async id => {
  if (confirm("Está seguro de eliminar?")) {
    let urlDelete = url + `usuarios/deleteUsuario?id_usuario=${id}`;
    let response = await fetch(urlDelete);
    let res = await response.json();
    if (res.success === true) {
      lista();
    }
  }
};

//verificar password
// var pass1 = document.getElementById("password");
// var pass2 = document.getElementById("password-confirm");
// pass1.addEventListener("keyup", e => {
//   console.log("keyup", e);
// });