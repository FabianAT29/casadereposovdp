let tblUsuarios, tblClientes, tblPacientes, tblFamiliares, tblVisitas;
document.addEventListener("DOMContentLoaded", function () {
  tblUsuarios = $("#tblUsuarios").DataTable({
    ajax: {
      url: base_url + "Usuarios/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "usuario",
      },
      {
        data: "nombre",
      },
      {
        data: "caja",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
    },
  });
  //Fin de la tabla usuario
  tblClientes = $("#tblClientes").DataTable({
    ajax: {
      url: base_url + "Clientes/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "dni",
      },
      {
        data: "nombre",
      },
      {
        data: "telefono",
      },
      {
        data: "direccion",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
    },
  });
  //Fin de la tabla clientes
  tblPacientes = $("#tblPacientes").DataTable({
    ajax: {
      url: base_url + "Pacientes/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "dni",
      },
      {
        data: "nombre",
      },
      {
        data: "apepaterno",
      },
      {
        data: "apematerno",
      },
      {
        data: "fechanac",
      },
      {
        data: "edad",
      },
      {
        data: "nombreestadia",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
    },
  });
  //Fin de la tabla pacientes
  tblFamiliares = $("#tblFamiliares").DataTable({
    ajax: {
      url: base_url + "Familiares/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "dni",
      },
      {
        data: "nombre",
      },
      {
        data: "apepaterno",
      },
      {
        data: "apematerno",
      },
      {
        data: "correoelec",
      },
      {
        data: "telefono",
      },
      {
        data: "dnipac",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
    },
  });
  // Fin de la tabla familiares
  tblVisitas = $("#tblVisitas").DataTable({
    ajax: {
      url: base_url + "Visitas/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "dni",
      },
      {
        data: "fecha",
      },
      {
        data: "turno",
      },
      {
        data: "horario",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
    },
  });
  //Fin de la tabla visitas
});

function frmLogin(e) {
  e.preventDefault();
  const usuario = document.getElementById("usuario");
  const clave = document.getElementById("clave");
  if (usuario.value == "") {
    clave.classList.remove("is-invalid");
    usuario.classList.add("is-invalid");
    usuario.focus();
  } else if (clave.value == "") {
    usuario.classList.remove("is-invalid");
    clave.classList.add("is-invalid");
    clave.focus();
  } else {
    const url = base_url + "Usuarios/validar";
    const frm = document.getElementById("frmLogin");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "ok") {
          window.location = base_url + "Pacientes";
        } else {
          document.getElementById("alerta").classList.remove("d-none");
          document.getElementById("alerta").innerHTML = res;
        }
      }
    };
  }
}

function frmUsuarios() {
  document.getElementById("title").innerHTML = "Nuevo Usuario";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("claves").classList.remove("d-none");
  document.getElementById("frmUsuario").reset();
  $("#nuevo_usuario").modal("show");
  document.getElementById("id").value = "";
}

function registrarUser(e) {
  e.preventDefault();
  const usuario = document.getElementById("usuario");
  const nombre = document.getElementById("nombre");
  const clave = document.getElementById("clave");
  const confirmar = document.getElementById("confirmar");
  const caja = document.getElementById("caja");
  if (usuario.value == "" || nombre.value == "" || caja.value == "") {
    Swal.fire({
      position: "top-center",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Usuarios/registrar";
    const frm = document.getElementById("frmUsuario");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Usuario registrado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Usuario modificado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        } else {
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnEditarUser(id) {
  document.getElementById("title").innerHTML = "Actualizar Usuario";
  document.getElementById("btnAccion").innerHTML = "Modificar";

  const url = base_url + "Usuarios/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("usuario").value = res.usuario;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("caja").value = res.id_caja;
      document.getElementById("claves").classList.add("d-none");
      $("#nuevo_usuario").modal("show");
    }
  };
}

function btnEliminarUser(id) {
  Swal.fire({
    title: "¿Estas seguro de eliminar?",
    text: "El usuario no se eliminara de forma permatente, solo se cambiara el estado a inactivo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Usuario eliminado con exito", "success");
            tblUsuarios.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}

function btnReingresarUser(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Usuario reingresado con exito", "success");
            tblUsuarios.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}

//Fin Usuarios

//Inicio Pacientes
function frmPaciente() {
  document.getElementById("title").innerHTML = "Nuevo Paciente";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmPaciente").reset();
  $("#nuevo_paciente").modal("show");
  document.getElementById("id").value = "";
}

function registrarPac(e) {
  e.preventDefault();
  var dni = document.getElementById("dni");
  var nombre = document.getElementById("nombre");
  var apepaterno = document.getElementById("apepaterno");
  var apematerno = document.getElementById("apematerno");
  var fechanac = document.getElementById("fechanac");
  var edad = document.getElementById("edad");
  var id_estadia = document.getElementById("id_estadia");

  if (
    dni.value == "" ||
    nombre.value == "" ||
    apepaterno.value == "" ||
    apematerno.value == "" ||
    fechanac.value == "" ||
    edad.value == "" ||
    id_estadia.value == ""
  ) {
    Swal.fire({
      position: "top-center",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    var url = base_url + "Pacientes/registrar";
    var frm = document.getElementById("frmPaciente");
    var http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Paciente registrado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_paciente").modal("hide");
          tblPacientes.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Paciente modificado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_paciente").modal("hide");
          tblPacientes.ajax.reload();
        } else {
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnEditarPaci(id) {
  document.getElementById("title").innerHTML = "Actualizar Paciente";
  document.getElementById("btnAccion").innerHTML = "Modificar";

  const url = base_url + "Pacientes/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("dni").value = res.dni;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("apepaterno").value = res.apepaterno;
      document.getElementById("apematerno").value = res.apematerno;
      document.getElementById("fechanac").value = res.fechanac;
      document.getElementById("edad").value = res.edad;
      document.getElementById("id_estadia").value = res.id_estadia;
      $("#nuevo_paciente").modal("show");
    }
  };
}

function btnEliminarPaci(id) {
  Swal.fire({
    title: "¿Estas seguro de eliminar?",
    text: "El usuario no se eliminara de forma permatente, solo se cambiara el estado a inactivo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Pacientes/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Paciente eliminado con exito", "success");
            tblPacientes.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}

function btnReingresarPaci(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Pacientes/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Paciente reingresado con exito", "success");
            tblPacientes.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}
//Fin Pacientes

//Inicio Clientes
function frmCliente() {
  document.getElementById("title").innerHTML = "Nuevo Cliente";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmCliente").reset();
  $("#nuevo_cliente").modal("show");
  document.getElementById("id").value = "";
}

function registrarCli(e) {
  e.preventDefault();
  const dni = document.getElementById("dni");
  const nombre = document.getElementById("nombre");
  const telefono = document.getElementById("telefono");
  const direccion = document.getElementById("direccion");
  if (
    dni.value == "" ||
    nombre.value == "" ||
    telefono.value == "" ||
    direccion.value == ""
  ) {
    Swal.fire({
      position: "top-center",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Clientes/registrar";
    const frm = document.getElementById("frmCliente");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Cliente registrado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_cliente").modal("hide");
          tblClientes.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Cliente modificado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_cliente").modal("hide");
          tblClientes.ajax.reload();
        } else {
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnEditarCli(id) {
  document.getElementById("title").innerHTML = "Actualizar Cliente";
  document.getElementById("btnAccion").innerHTML = "Modificar";

  const url = base_url + "Clientes/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("dni").value = res.dni;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("telefono").value = res.telefono;
      document.getElementById("direccion").value = res.direccion;
      $("#nuevo_cliente").modal("show");
    }
  };
}

function btnEliminarCli(id) {
  Swal.fire({
    title: "¿Estas seguro de eliminar?",
    text: "El usuario no se eliminara de forma permatente, solo se cambiara el estado a inactivo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Cliente eliminado con exito", "success");
            tblClientes.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}

function btnReingresarCli(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Cliente reingresado con exito", "success");
            tblClientes.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}
//Fin Clientes

//Inicio Familiares
function frmFamiliar() {
  document.getElementById("title").innerHTML = "Nuevo Familiar";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmFamiliar").reset();
  $("#nuevo_familiar").modal("show");
  document.getElementById("id").value = "";
}

function registrarFam(e) {
  e.preventDefault();
  var dni = document.getElementById("dni");
  var nombre = document.getElementById("nombre");
  var apepaterno = document.getElementById("apepaterno");
  var apematerno = document.getElementById("apematerno");
  var correoelec = document.getElementById("correoelec");
  var telefono = document.getElementById("telefono");
  var dnipac = document.getElementById("dnipac");

  if (
    dni.value == "" ||
    nombre.value == "" ||
    apepaterno.value == "" ||
    apematerno.value == "" ||
    correoelec.value == "" ||
    telefono.value == "" ||
    dnipac.value == ""
  ) {
    Swal.fire({
      position: "top-center",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    var url = base_url + "Familiares/registrar";
    var frm = document.getElementById("frmFamiliar");
    var http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Familiar registrado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_familiar").modal("hide");
          tblFamiliares.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Familiar modificado con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_familiar").modal("hide");
          tblFamiliares.ajax.reload();
        } else {
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnEditarFam(id) {
  document.getElementById("title").innerHTML = "Actualizar Familiar";
  document.getElementById("btnAccion").innerHTML = "Modificar";

  const url = base_url + "Familiares/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("dni").value = res.dni;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("apepaterno").value = res.apepaterno;
      document.getElementById("apematerno").value = res.apematerno;
      document.getElementById("correoelec").value = res.correoelec;
      document.getElementById("telefono").value = res.telefono;
      document.getElementById("dnipac").value = res.dnipac;
      $("#nuevo_familiar").modal("show");
    }
  };
}

function btnEliminarFam(id) {
  Swal.fire({
    title: "¿Estas seguro de eliminar?",
    text: "El familiar no se eliminara de forma permatente, solo se cambiara el estado a inactivo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Familiares/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Familiar eliminado con exito", "success");
            tblFamiliares.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}

function btnReingresarFam(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Familiares/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Familiar reingresado con exito", "success");
            tblFamiliares.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}
//Fin Familiares

//Inicio Visitas
function frmVisita() {
  document.getElementById("title").innerHTML = "Nueva Visita";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmVisita").reset();
  $("#nuevo_visita").modal("show");
  document.getElementById("id").value = "";
}

function registrarVis(e) {
  e.preventDefault();
  var dni = document.getElementById("dni");
  var fecha = document.getElementById("fecha");
  var turno = document.getElementById("turno");
  var horario = document.getElementById("horario");

  if (
    dni.value == "" ||
    fecha.value == "" ||
    turno.value == "" ||
    horario.value == ""
  ) {
    Swal.fire({
      position: "top-center",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    var url = base_url + "Visitas/registrar";
    var frm = document.getElementById("frmVisita");
    var http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Visita registrada con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_visita").modal("hide");
          tblVisitas.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Visita modificada con éxito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_visita").modal("hide");
          tblVisitas.ajax.reload();
        } else {
          Swal.fire({
            position: "top-center",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnEditarVis(id) {
  document.getElementById("title").innerHTML = "Actualizar Visita";
  document.getElementById("btnAccion").innerHTML = "Modificar";

  const url = base_url + "Visitas/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("dni").value = res.dni;
      document.getElementById("fecha").value = res.fecha;
      document.getElementById("turno").value = res.turno;
      document.getElementById("horario").value = res.horario;
      $("#nuevo_visita").modal("show");
    }
  };
}

function btnEliminarVis(id) {
  Swal.fire({
    title: "¿Estas seguro de eliminar?",
    text: "El familiar no se eliminara de forma permatente, solo se cambiara el estado a inactivo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Visitas/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Visitas eliminado con exito", "success");
            tblVisitas.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}

function btnReingresarVis(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Visitas/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Visitas reingresado con exito", "success");
            tblVisitas.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "success");
          }
        }
      };
    }
  });
}

//Fin Visitas
