<?php

include 'metodosGenerics.php';
include "pedidosBean.php";

function insertPedido($pedido) {

    create_insert("tbpedido", $pedido->getFields(), $pedido->getValues());
}

function insertDetalle($campos, $values) {
    create_insert("detalle_pedido", $campos, $values);
}

function updatePedido($pedido) {

    $campos = "NRO_PEDIDO='" . $pedido->NRO_PEDIDO . "',TALONARIO='" . $pedido->TALONARIO . "'
		,CLIENTE='" . $pedido->CLIENTE . "',FECHA_RECIBIDO='" . $pedido->FECHA_RECIBIDO . "',HORA='" . $pedido->HORA . "'
		,ESTADO='" . $pedido->ESTADO . "',OBSERVACION='" . $pedido->OBSERVACION . "',DIGITADOR='" . $pedido->DIGITADOR . "'";

    $condicion = " NRO_PEDIDO='" . $pedido->NRO_PEDIDO . "'";
    create_update("tbpedido", $campos, $condicion);
}

function deletePedido($nroPedido) {
    create_delete("`tbpedido`", "NRO_PEDIDO='" . $nroPedido . "'");
    create_delete("`detalle_pedido`", "NRO_PEDIDO='" . $nroPedido . "'");
}

function deleteDetalle($nropedido, $nrorden) {
    $condicion = "NRO_PEDIDO='$nropedido' and NRO_ORDEN='$nrorden'";
    create_delete('detalle_pedido', $condicion);
}

function updateDetalle($campos, $condicion) {

    create_update("`detalle_pedido`", $campos, $condicion);
}

function listPedidos() {
    include 'PHPPaging.lib.php';

    $conn = conexDB();

    $paging = new PHPPaging;
    $sql = "select P.* ,C.nombre_apellido Cnombre_apellido from tbpedido P JOIN tbcliente C ON P.CLIENTE= C.id_cliente ";

    if ($_POST['type'] == "campo") {
        if ($_POST['criterio_res'] != "") {
            if ($_POST['criterio1'] == "cliente") {
                $sql .= " where C.nombre_apellido like '%" . $_POST['criterio_res'] . "%' or P.CLIENTE like '%" . $_POST['criterio_res'] . "%'";
            } else {
                $sql .= " where " . $_POST['criterio1'] . "  like '%" . $_POST['criterio_res'] . "%'";
            }
        } else

        if (($_POST['fecha1'] != '') && ($_POST['fecha2'] != '')) {
            $fecha1 = $_POST['fecha1'];
            $fecha2 = $_POST['fecha2'];
            $sql .= " WHERE P.FECHA_RECIBIDO BETWEEN '$fecha1' AND '$fecha2'";
        }
    }
    if ($_POST['type'] == "lista") {
        if ($_POST['cr'] != "") {
            $sql .= " where " . $_POST['criterio1'] . "  like '%" . $_POST['cr'] . "%'";
        } else
        if ($_GET['criterio_res'] != '') {
            $sql .= " where " . $_GET['criterio1'] . "  like '%" . $_GET['criterio_res'] . "%'";
        }
    }



    if (isset($_POST['criterio_ordenar_por'])) {
        $sql .= " order by " . $_POST['criterio_ordenar_por'] . ' ' . $_POST['criterio_orden'];
    } else
    if (isset($_GET['criterio_ordenar_por'])) {
        $sql .= " order by " . $_GET['criterio_ordenar_por'] . ' ' . $_GET['criterio_orden'];
    } else {
        $sql .= " order by CLIENTE desc";
    }



    $paging->porPagina = 10;
    $paging->agregarConsulta($sql);
    $paging->div('div_listar');
    $paging->modo('desarrollo');
    $paging->verPost(true);
    $paging->ejecutar();
    ?>

    <table class='table' width='998px' border='0'>
        <thead>
            <tr>
                <th>Orden</th>
                <th>Cantidad</th>
                <th>Cliente</th>
                <th>FechaRecibido</th>
                <th>HoraEntrada</th>
                <th>Estado</th>
                <th>Observación</th>
                <th>Total</th>
                <th>Abonado</th>
                <th>Saldo</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody id="bodyon"> 
    <?php

    $i = 1;
    $bd = 'modaskuelle';
    $conexion = mysql_connect('localhost', 'root', '');
    mysql_select_db($bd, $conexion);


    while ($res = $paging->fetchResultado()) {
        $sql2 = mysql_query("SELECT count(*), sum(PRECIO) FROM detalle_pedido WHERE NRO_PEDIDO=" . $res['NRO_PEDIDO'] . "");
        $sql3 = mysql_query("select sum(abono) from abonos where NRO_PEDIDO=" . $res['NRO_PEDIDO'] . "");

        $row2 = mysql_fetch_row($sql2);
        $abonado = mysql_fetch_row($sql3);
        $ob = substr($res['OBSERVACION'], 0, 20);
        $saldo = $row2[1] - $abonado[0];
        $nombre = toHtml($res['Cnombre_apellido']);
        echo" <tr>";
        echo("<td class='$i'  onClick='change(" . $i . "," . $res['NRO_PEDIDO'] . ");'>" . toHtml($res['NRO_PEDIDO']) . "</td>");
        echo("<td class='$i' onclick='change(" . $i . "," . $res['NRO_PEDIDO'] . ")'>" . ucwords(strtolower($row2[0])) . "</td>");
        echo("<td class='$i' onClick='change(" . $i . "," . $res['NRO_PEDIDO'] . ");'>" . ucwords(strtolower($nombre
                )) . "</td>");
        echo("<td class='$i'  onClick='change(" . $i . "," . $res['NRO_PEDIDO'] . ");'>" . ucwords(strtolower($res['FECHA_RECIBIDO'])) . "</td>");
        echo("<td class='$i'  onclick='change(" . $i . "," . $res['NRO_PEDIDO'] . ")'>" . ucwords(strtolower($res['HORA'])) . "</td>");
        echo("<td class='$i'  onclick='change(" . $i . "," . $res['NRO_PEDIDO'] . ")'>" . ucwords(strtolower($res['ESTADO'])) . "</td>");

        echo("<td class='$i' title='" . $res["OBSERVACION"] . "'  onClick='change(" . $i . "," . $res['NRO_PEDIDO'] . ");'>" . toHtml(ucwords(strtolower($ob))) . "..</td>");
        echo("<td class='$i' onclick='change(" . $i . "," . $res['NRO_PEDIDO'] . ")'>" . ucwords(strtolower(number_format($row2[1]))) . "</td>");
        echo("<td class='$i' onClick='change(" . $i . "," . $res['NRO_PEDIDO'] . ");'>" . ucwords(strtolower(number_format($abonado[0]))) . "</td>");
        echo("<td class='$i'  onClick='change(" . $i . "," . $res['NRO_PEDIDO'] . ");'>" . ucwords(strtolower(number_format($saldo))) . "</td>");
        echo("<td class='$i'> <a href='javascript:viewPedido(" . $res['NRO_PEDIDO'] . ");' title='Detalle Pedido'><img src='img/magnifier.png' /></a> </td>");
        echo("<td class='$i'> <a href='javascript:abonar(" . $res['NRO_PEDIDO'] . ");' title='Abonar'><img src='img/page_edit.png' /></a> </td>");
        echo("</tr>");
        $i++;
    }

    echo "</tbody></table>
      <div id='bg'>
    <table class='table' width='917px' border='0' >
    <tfoot>
        <tr>";


    echo "<th class='null' style='color:#15428B;'>
<div align='left'><a href='javascript:cargarAbonos();' title='Abonar'><img  alt='preview' src='img/page_edit.png' >Abonos</a></div></th>
<th class='null' style='color:#15428B;'>
<div align='left'><a href='javascript: eliminarPedido();' title='Eliminar Pedido'><img  alt='preview' src='img/delete.png' >Eliminar</a></div></th>
    <th width='30px' class='null'> <div align='left'><a href='javascript: buscar();' title='Actualizar'><img  alt='preview' src='img/reload.png' style='width:18px; height:18px;'></a></div></th>
<th class='null' style='color:#15428B;'></th>
<th class='null' style='color:#15428B;'></th>
<th class='null' style='color:#15428B;'></th>
<th class='null' style='color:#15428B;'></th>
<th class='null' style='color:#15428B;' align='left'>";
    echo "<b>Navegaci&oacute;n</b>: " . $paging->fetchNavegacion();
    echo " </th></tr></tfoot></table></div>";
}
?>