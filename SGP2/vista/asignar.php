<?php
$bd = 'modaskuelle';
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db($bd, $conexion);
$pedido = $_POST['pedido'];
$orden = $_POST['orden'];
$query = mysql_query("select a.*, concat(b.NOMBRE,' ', b.APELLIDO) as nombre_operario from pedidos_asignados a JOIN operario b where a.NRO_PEDIDO='$pedido' and a.NRO_ORDEN='$orden' and b.CEDULA=a.ID_OPERARIO;");

$row = mysql_fetch_assoc($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="es" lang="es">
    <head>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/detallePop.js"></script>
        <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
        <link type="text/css" href="css/AsignarOp.css" rel="stylesheet" />
        <script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
        <script language="javascript" type="text/javascript" src="js/asignar.js" ></script>
    </head>
    <body>
        <form name="frm_asignar" id="frm_asignar" action="javascript: asignarOperario()">
            <table height="250" >
                <tr></tr>
                <input type="hidden" name="sol" id="sol" value="asignar_operario"/>
                <tr>
                    <td class="cel" >Pedido:
                        <input type="text" disabled="disabled" value="<?php echo $_POST['pedido'] ?>"/>
                        <input type="hidden" name="nro_pedido"  id="nro_pedido" value="<?php echo $_POST['pedido'] ?>"/>
                    </td>
                    <td class="cel">Prenda:
                        <input type="text" disabled="disabled"  value="<?php echo $_POST['prenda'] ?>"/>
                        <input type="hidden" name="nro_orden"  id="nro_orden" value="<?php echo $_POST['orden'] ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="cel">Cedula Operario:
                        <input type="text" name="cedula_operario" id="cedula_operario" class="required" onkeypress="if (event.keyCode == 13)
                    json_asignar();" value="<?php echo $row['ID_OPERARIO'] ?>"/></td>
                    <td class="cel" >Operario:
                        <input type="text" name="nombre_operario" id="nombre_operario" class="required" onkeypress="if (event.keyCode == 13)
                    json_asignar2();" value="<?php echo $row['nombre_operario'] ?>"/></td>
                </tr>
                <tr>
                    <td class="cel" >Pago:
                        <input type="text" name="pago" id="pago" class="required" value="<?php echo $row['PAGO'] ?>"/></td>
                    <td class="cel" >Fecha de Entrega:
                        <input type="text" name="fecha_terminado" id="fecha_terminado" class="required" value="<?php echo $row['FECHA_ENTREGA'] ?>"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>