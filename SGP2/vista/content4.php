<?php
error_reporting(0);
$bd = 'modaskuelle';
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db($bd, $conexion);

$nroPedido = $_POST['nroPedido'];
$sql = mysql_query("SELECT p.*,c.* FROM tbpedido p,tbcliente c WHERE p.NRO_PEDIDO='$nroPedido' AND c.id_cliente=p.CLIENTE; ");
$sql2 = mysql_query("select sum(abono) from abonos where NRO_PEDIDO=" . $nroPedido . "");
$abonado = mysql_fetch_row($sql2);
$res = mysql_fetch_array($sql);
$sql3 = mysql_query("SELECT sum(PRECIO) FROM detalle_pedido WHERE NRO_PEDIDO=" . $nroPedido . "");

$total = mysql_fetch_row($sql3);
$saldo = $total[0] - $abonado[0];
?>

<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="es" lang="es">
    <head>
        <script type="text/javascript" src="js/pedido.js"></script>
        <script src="js/registrar_medidas.js" type="text/javascript"></script>
        <script src="js/asignar.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/pedido_mod.css"/> 
        <link href="css/PHPPaging.lib.css" rel="stylesheet" type="text/css" />
    </head>
    <body bgcolor="white">
        <fieldset id="paneld" >
            <legend>
                <h2>Información Pedido</h2> 
            </legend>
            <form name="ped" id="ped" style="padding: 20px">
                <table width="100%"  name="forma" id="forma" cellpadding="0" cellspacing="0" border="0">
                    <input type="hidden" name="sol" id="sol" value="modificar" />
                    <input type="hidden" name="x" id="x" value="valor" />
                    <input type="hidden" name="clie" id="clie" value="<?php echo $res['CLIENTE'] ?>"/>
                    <input type="hidden" name="orden" id="orden" value="<?php echo $nroPedido ?>"/>
                    <input type="hidden" name="orden" id="cedula" value="<?php echo $res['id_cliente']  ?>"/>
                    <tr>
                        <td class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                    </tr>
                    <tr>
                        <td  width="182" class="cel"><strong>Pedido Nro:</strong></td>
                        <td class="cel"><strong>Talonario:</strong></td>
                        <td class="cel"><strong>Fecha Recibido:</strong></td>
                        <td width="182" class="cel"><strong>Hora:</strong></td>
                        <td width="182" class="cel"><strong>Digitador:</strong></td>
                    </tr>
                    <tr>
                        <td width="182" class="cel"><?php echo $nroPedido ?></td> 
                        <td width="182" class="cel"><?php echo $res['TALONARIO'] ?></td> 
                        <td width="182" class="cel"><?php echo $res['FECHA_RECIBIDO'] ?></td> 
                        <td width="182" class="cel"><?php echo $res['HORA'] ?></td> 
                        <td width="182" class="cel"><?php echo $res['DIGITADOR'] ?></td>
                    </tr>
                    <tr>
                        <td class="cel"><strong>Cedula Cliente:</strong></td>
                        <td class="cel"><strong>Cliente:</strong></td>
                        <td class="cel"><strong>Telefono:</strong> </td>
                        <td class="cel"><strong>Ciudad:</strong></td>

                        <td class="cel"><strong>Dirección:</strong></td>
                    </tr>
                    <tr>
                        <td width="182" class="cel"><?php echo $res['id_cliente'] ?></td> 
                        <td width="182" class="cel"><?php echo ucfirst(strtolower($res['nombre_apellido'])) ?></td> 
                        <td width="182" class="cel"><?php echo ucfirst(strtolower($res['telefono'])) ?></td> 
                        <td width="182" class="cel"><?php echo $res['ciudad'] ?></td> 
                        <td width="182" class="cel"><?php echo ucfirst(strtolower($res['direccion'])) ?></td>
                    </tr>
                    <tr>
                        <td  class="cel"><strong>Valor Total:</strong></td>
                        <td class="cel"><strong>Abonado:</strong></td>
                        <td class="cel"><strong>Saldo:</strong></td>
                        <td class="cel"><strong>Agregar Producto:</strong></td>
                        <td class="cel"> &nbsp; </td>
                    </tr>
                     <tr>
                        <td width="182" class="cel"><?php echo number_format($total[0],2) ?></td> 
                        <td width="182" class="cel"><?php echo number_format(($abonado[0]==null)?0:$abonado[0],2); ?></td> 
                        <td width="182" class="cel"><?php echo number_format($saldo,2) ?></td> 
                        <td width="182" class="cel"><select name="prenda" id="prenda" style="width:155px" onchange="registrarDetalle();">
                                <option>Elige..</option>
                                <option>Arreglo</option>
                                <option>Pantalon</option>
                                <option>Saco</option>
                                <option>Bermuda</option>
                                <option>Chaleco</option>
                                <option>Camisa</option>
                                <option>Slack</option>
                                <option>Chaqueta</option>
                                <option>Blusa</option>
                                <option>Vestido</option>
                                <option>Falda</option>
                            </select></td>
                            <td width="182" class="cel">&nbsp; </td> 
                    </tr>
                </table>
            </form>
            <div id="detal"></div>
        </fieldset>
        <div id="conte"></div>

    </body>
</html>
