<?php
require_once('../Models/pedidos.model.php');
$pedidos = new Clase_Pedidos;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $pedidos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $ID_pedido = $_POST["ID_pedido"];
        $datos = array();
        $datos = $pedidos->uno($ID_pedido);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
    case 'insertar':
        $ID_cliente = $_POST["ID_cliente"];
        $Producto = $_POST["Producto"];
        $Cantidad = $_POST["Cantidad"];
        $Fecha_pedido = $_POST["Fecha_pedido"];

        $datos = array();
        $datos = $pedidos->insertar($ID_cliente, $Producto, $Cantidad, $Fecha_pedido);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $ID_pedido = $_POST["ID_pedido"];
        $ID_cliente = $_POST["ID_cliente"];
        $Producto = $_POST["Producto"];
        $Cantidad = $_POST["Cantidad"];
        $Fecha_pedido = $_POST["Fecha_pedido"];

        $datos = array();
        $datos = $pedidos->actualizar($ID_pedido, $ID_cliente, $Producto, $Cantidad, $Fecha_pedido);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $ID_pedido = $_POST["ID_pedido"];
        $datos = array();
        $datos = $pedidos->eliminar($ID_pedido);
        echo json_encode($datos);
        break;
}
