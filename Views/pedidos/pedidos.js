//aqui va a estar el codigo de usuarios.model.js

function init() {
    $("#frm_pedidos").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    todos();
});

var todos = () => {
    var html = "";
    $.get("../../Controllers/pedidos.controller.php?op=todos", (res) => {
        res = JSON.parse(res);
        $.each(res, (index, valor) => {
            html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.cliente}</td>
                  <td>${valor.Producto}</td>
                  <td>${valor.Cantidad}</td>
                  <td>${valor.Fecha}</td>
              <td>
              <button class='btn btn-success' onclick='editar(${valor.ID_pedido
                })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.ID_pedido
                })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${valor.ID_pedido
                })'>Ver</button>
              </td></tr>
                  `;
        });
        $("#tabla_pedidos").html(html);
    });
};

var guardaryeditar = (e) => {
    e.preventDefault();
    var dato = new FormData($("#frm_pedidos")[0]);
    var ruta = "";
    var ID_pedido = document.getElementById("ID_pedido").value;
    if (ID_pedido > 0) {
        ruta = "../../Controllers/pedidos.controller.php?op=actualizar";
    } else {
        ruta = "../../Controllers/pedidos.controller.php?op=insertar";
    }
    $.ajax({
        url: ruta,
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
            res = JSON.parse(res);
            if (res == "ok") {
                Swal.fire("Pedidos", "Registrado con éxito", "success");
                todos();
                limpia_Cajas();
            } else {
                Swal.fire("Pedidos", "Error al guardo, intente mas tarde", "error");
            }
        },
    });
};

var cargaPedidos = () => {
    return new Promise((resolve, reject) => {
        $.post("../../Controllers/clientes.controller.php?op=todos", (res) => {
            res = JSON.parse(res);
            var html = "";
            $.each(res, (index, val) => {
                html += `<option value="${val.ID_cliente}"> ${val.Nombre}</option>`;
            });
            $("#ID_cliente").html(html);
            resolve();
        }).fail((error) => {
            reject(error);
        });
    });
};

var editar = async (ID_pedido) => {
    await cargaPedidos();
    $.post(
        "../../Controllers/pedidos.controller.php?op=uno",
        { ID_pedido: ID_pedido },
        (res) => {
            res = JSON.parse(res);

            $("#ID_pedido").val(res.ID_pedido);
            $("#ID_cliente").val(res.ID_cliente);
            $("#Producto").val(res.Producto);
            $("#Cantidad").val(res.Cantidad);
            $("#Fecha_pedido").val(res.Fecha_Pedido);
        }
    );
    $("#Modal_pedido").modal("show");
};

var eliminar = (ID_pedido) => {
    Swal.fire({
        title: "Paises",
        text: "Esta seguro de eliminar la provincia",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.post(
                "../../Controllers/pedidos.controller.php?op=eliminar",
                { ID_pedido: ID_pedido },
                (res) => {
                    res = JSON.parse(res);
                    if (res === "ok") {
                        Swal.fire("pedidos", "Pedido Eliminado", "success");
                        todos();
                    } else {
                        Swal.fire("Error", res, "error");
                    }
                }
            );
        }
    });

    limpia_Cajas();
};

var limpia_Cajas = () => {
    document.getElementById("ID_pedido").value = "";
    document.getElementById("ID_cliente").value = "";
    document.getElementById("Producto").value = "";
    document.getElementById("Cantidad").value = "";
    document.getElementById("Fecha_pedido").value = "";

    $("#Modal_pedido").modal("hide");
};
init();
