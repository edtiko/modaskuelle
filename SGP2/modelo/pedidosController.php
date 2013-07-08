<?php

include 'pedidosModel.php';
include 'abonosModel.php';


if (isset($_POST["sol"]))//se valida si la solicitud viene por GET
    $sol = $_POST["sol"];

if (isset($_GET["sol"]))//se valida si la solicitud viene por POST
    $sol = $_GET["sol"];


if ($sol == "insertar") {

    $bd = 'modaskuelle';
    $conexion = mysql_connect('localhost', 'root', '');
    mysql_select_db($bd, $conexion);

    $NRO_PEDIDO = $_POST['orden'];
    $TALONARIO = $_POST['talonario'];
    $CLIENTE = $_POST['cedula'];
    $FECHA_RECIBIDO = $_POST['fecha'];
    $HORA = $_POST['hora'];
    $ESTADO = 'Produccion';
    $ABONO = $_POST['ab'];
    $OBSERVACION = $_POST['ob_pedido'];
    $DIGITADOR = $_POST['dig'];
    $FORMA = $_POST['pago'];

    $query = mysql_query("select NRO_PEDIDO from tbpedido where NRO_PEDIDO = '$NRO_PEDIDO'");

    if (mysql_fetch_array($query) > 0) {
        echo 'El número de pedido ya existe';
    } else {


        $pedido = new pedido($NRO_PEDIDO, $TALONARIO, $CLIENTE, $FECHA_RECIBIDO, $HORA, $ESTADO, $OBSERVACION, $DIGITADOR);

        insertPedido($pedido);

        $campos = "(NRO_PEDIDO, ABONO, FECHA_ABONO, FORMA_PAGO)";
        $values = "('$NRO_PEDIDO', '$ABONO', '$FECHA_RECIBIDO', '$FORMA')";
        create_insert("abonos", $campos, $values);


        echo 'El pedido ha sido guardado satisfactoriamente' . mysql_error();
    }
}
if ($sol == "detalle") {
//    session_start();
//    if(isset($_SESSION['pedido']))
//   
//    $pedido = $_SESSION['pedido'];
    $bd = 'modaskuelle';
    $conexion = mysql_connect('localhost', 'root', '');
    mysql_select_db($bd, $conexion);

    $descripcion = $_POST['descrip'];
    $prenda = $_POST['prenda'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];
    $fecha = $_POST['f1'];
    $orden = $_POST['numorden'];
    
    if (isset($_POST['arreglo'])) {
        $descrip = $_POST['arreglo'];
        $campos = "(NRO_PEDIDO, PRENDA, DESCRIPCION, PRECIO, FECHA)";

        $values = "('$orden', '$prenda', '$descrip', '$precio', '$fecha')";

        insertDetalle($campos, $values);
        echo 'Producto registrado en el pedido.';
    } else {
        $campos = "(NRO_PEDIDO, PRENDA, DESCRIPCION, MODELO, COLOR, PRECIO, FECHA)";

        $values = "('$orden', '$prenda', '$descripcion', '$modelo', '$color', '$precio', '$fecha')";

        insertDetalle($campos, $values);
        echo 'Producto registrado en el pedido.';
    }
}
if ($sol == "modetalle") {//actualizar detalle
    $pedido = $_POST['nropedido'];
    $nrorden = $_POST['nrorden'];
    $prenda = $_POST['producto'];
    $desc = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];
    $fecha = $_POST['f1'];
    $campos = "PRENDA='" . $prenda . "',DESCRIPCION='" . $desc . "',MODELO='" . $modelo . "'
    ,COLOR='" . $color . "',PRECIO='" . $precio . "',FECHA='" . $fecha . "'";


    $condicion = "NRO_PEDIDO=" . $_POST['nropedido'] . " and NRO_ORDEN=" . $_POST['nrorden'];
    updateDetalle($campos, $condicion);
//actualizar precio total de pedido
    $query = mysql_query("select SUM(PRECIO) from detalle_pedido where NRO_PEDIDO='$pedido'");
    $r = mysql_fetch_row($query);
    $campo = "TOTAL='" . $r[0] . "'";
    $cond = "NRO_PEDIDO=" . $pedido;
    create_update("`tbpedido`", "$campo", $cond);
    echo 'La orden se actualizó exitosamente.';
}
if ($sol == "eliminar") {
    $nroPedido = $_POST["nroPedido"];

    deletePedido($nroPedido);
}
if ($sol == "quitar") {
//    
//     session_start();
//    if(isset($_SESSION['pedido']))
//     $pedido = $_SESSION['pedido'];
    $nrorden = $_POST['nrorden'];
    $nropedido = $_POST['nropedido'];
//
//print_r($pedido); 
//    unset($pedido[$nrorden]);
//    $pedido = array_values($pedido);

    deleteDetalle($nropedido, $nrorden);
}

if ($sol == "listar") {
    listPedidos();
}


if ($sol == "modificar") {
    $pedido = new pedido($_POST["orden"], $_POST["ta"], $_POST["clie"]
                    , $_POST["fechar"], $_POST["hora"], $_POST["estado"], $_POST["vlr"], $_POST["ob_ped"], $_POST["digitador"]);

    updatePedido($pedido);
    echo 'El Pedido se Actualizó Exitosamente.';
}
if ($sol == "abonar") {
    $pedido = $_POST['pedido'];
    $abono = $_POST['abono'];
    $fecha = $_POST['fecha_abono'];
    $forma = $_POST['forma_pago'];


    $campos = "(NRO_PEDIDO, ABONO, FECHA_ABONO, FORMA_PAGO)";
    $values = "('$pedido', '$abono', '$fecha', '$forma')";
    create_insert("abonos", $campos, $values);

    echo 'El abono fue registrado.';
}
if ($sol == "abonos") {

    listAbonos();
}
if ($sol == "validar") {
    $bd = 'modaskuelle';
    $conexion = mysql_connect('localhost', 'root', '');
    mysql_select_db($bd, $conexion);
    $NRO_PEDIDO = $_POST['orden'];

    $query = mysql_query("select NRO_PEDIDO from tbpedido where NRO_PEDIDO='$NRO_PEDIDO'");
$f = mysql_fetch_array($query);
    if ($f>0) {
       
            echo "Ya existe un pedido con ese consecutivo!";
        
    }
   
}
if ($sol == "editar_abono") {
    $pedido = $_POST['pedido'];
    $abono = $_POST['abono'];
    $fecha = $_POST['fecha_abono'];
    $forma = $_POST['forma_pago'];
    $nroabono = $_POST['nroabono'];


    $campos = "(ABONO, FECHA_ABONO, FORMA_PAGO)";
    $campos = "NRO_PEDIDO='" . $pedido . "',ABONO='" . $abono . "',FECHA_ABONO='" . $fecha . "'
    ,FORMA_PAGO='" . $forma . "'";
    $condicion = "NRO_PEDIDO=" . $pedido . " and ID_ABONO=" . $nroabono;
    create_update("`abonos`", $campos, $condicion);

    echo 'El abono fue registrado.';
}
if ($sol == "quitar_abono") {

    $nroabono = $_POST['abono'];
    create_delete("`abonos`", "ID_ABONO='" . $nroabono . "'");

    echo" El abono fue eliminado";
}

if ($sol == "asignar_operario") {
    $bd = 'modaskuelle';
    $conexion = mysql_connect('localhost', 'root', '');
    mysql_select_db($bd, $conexion);

    $nro_pedido = $_POST['nro_pedido'];
    $nro_orden = $_POST['nro_orden'];
    $operario = $_POST['cedula_operario'];
    $fecha = $_POST['fecha_terminado'];
    $fecha_reg = date("Y-m-d H:i:s"); 
    $pago = $_POST['pago'];
    $query = mysql_query("select * from pedidos_asignados where NRO_PEDIDO = '$nro_pedido' and NRO_ORDEN= '$nro_orden'");

    if (mysql_fetch_array($query) > 0) {
        echo 'La orden ya fue asignada';
    } else {


        $campos = "(NRO_PEDIDO, NRO_ORDEN, ID_OPERARIO, PAGO, FECHA_ENTREGA)";
        $values = "('$nro_pedido', '$nro_orden', '$operario','$pago','$fecha_reg', '$fecha')";
        create_insert("pedidos_asignados", $campos, $values);


        echo "La orden se asignó correctamente";

        $query_orden = mysql_query("select sum(NRO_ORDEN) from detalle_pedido where NRO_PEDIDO='$nro_pedido'");
        $query_asignados = mysql_query("select sum(NRO_ORDEN) from pedidos_asignados where NRO_PEDIDO='$nro_pedido'");
        $p = mysql_fetch_row($query_orden);
        $q = mysql_fetch_row($query_asignados);
        if ($p[0] == $q[0]) {
            $campo = "ESTADO= 'Terminado'";
            $cond = "NRO_PEDIDO=" . $nro_pedido;
            create_update("`tbpedido`", "$campo", $cond);
        }
    }
}

if($sol == "save_operario"){
    $cedula= $_POST['cedula'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $telefono= $_POST['telefono'];
    $direccion= $_POST['direccion'];
    $fecha_nacimiento= $_POST['fecha_nac'];
    $barrio= $_POST['barrio'];
    $antiguedad= $_POST['antiguedad'];
    
      $query = mysql_query("select * from operario where CEDULA = '$cedula'");

    if (mysql_fetch_array($query) > 0) {
        echo 'El operario ya fue registrado';
    } 
    else 
  $campos = "(CEDULA, NOMBRE, APELLIDO, TELEFONO, DIRECCION, BARRIO)";
        $values = "('$cedula', '$nombre', '$apellido','$telefono', '$direccion', '$barrio')"; 
       create_insert("operario", $campos, $values);  
       echo "El operario se registro con exito"; 
       
}
if($sol=="cancelar"){
    $pedido = $_POST['nroPedido'];
    $condicion= 'NRO_PEDIDO='.$pedido;
   $query= create_delete("`detalle_pedido`", $condicion);
    if($query){
        echo "exito";
    }
    else
        echo "error";
}
?>