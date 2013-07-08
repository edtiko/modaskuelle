<?php
session_start();
$bd = 'modaskuelle';
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db($bd, $conexion);
$query = mysql_query("select NRO_PEDIDO from tbpedido ORDER BY NRO_PEDIDO DESC LIMIT 1;");
$nropedido = mysql_fetch_row($query);
$value = $nropedido[0] + 1;
?> 
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="es" lang="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head charset="utf-8">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
        <script language="javascript" type="text/javascript" src="js/jquery.blockUI.js"></script>
        <link type="text/css" href="css/pedidoview.css" rel="stylesheet" />
        <link href="css/PHPPaging.lib.css" rel="stylesheet" type="text/css" />
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="index.js"></script>
        <script type="text/javascript" src="js/pedido.js"></script>
        <script src="js/registrar_medidas.js" type="text/javascript"></script>
        <script type="text/javascript">
         $(document).ready(function(){
              
                $('#cedula').autocomplete({
                    minLength: 3,
                    source:"encode.php"
                });

$('#orden').blur(function() {
   var pedido= document.getElementById("orden").value;
                $.ajax({
                    url: "../modelo/pedidosController.php",
                    type: 'post',
                    data: "orden="+pedido+'&sol=validar',
                    success: function(data){
                        if(data!=""){
                            
                            alert(data);
                        $("#orden").focus();
                        return false;
                    } }
                });
});
   $("#f").datepicker({
        dateFormat:'yy/mm/dd',
        showOn: 'both',
        buttonImage: 'ico/calendar.png',
        buttonImageOnly: true,
        changeYear: true,
        changeMonth: true
    });
            });
        </script>

    </head>
    <body>
            <form name="ped" id="ped">
                <table width="560" height="362" id="forma" name="forma" cellpadding="0" cellspacing="0" >
                    <input type="hidden" name="sol" id="sol" value="insertar" />
                    <input type="hidden" name="x" id="x" value="null" />
                   
                    <tr >
                        <td height="25" class="cel"><strong>Información Cliente:</strong></td>
                        <td class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="51" class="cel">Cedula:
                                <input type="text" name="cedula" id="cedula" onkeypress="if(event.keyCode == 13) json1();"/>
                            </td>
                        <td class="cel">Cliente:
                                <input type="text" name="cliente" id="cliente" onkeypress="if(event.keyCode == 13) Json2();" />
                            </td>
                        <td class="cel">Dirección:
                                <input type="text" name="direccion" id="direccion" />
                            </td>
                    </tr>
                    <tr>
                        <td height="54" class="cel">Telefono:
                                <input type="text" name="telefono" id="telefono" />
                            </td>
                        <td class="cel">Celular:    
                                <input type="text" name="celular" id="celular" />
                           </td>
                        <td class="cel">Ciudad:
                                <input type="text" name="ciudad" id="ciudad" />
                            </td>
                    </tr>
                    <tr>
                        <td height="27" class="cel"><strong>Datos Pedido:</strong></td>
                        <td class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="49" class="cel">Digitador:
                                <input type="text"  value="<?php echo $_SESSION['k_username']; ?>" disabled="disabled" />
                                <input type="hidden" name="dig" id="dig" value="<?php echo $_SESSION['k_username']; ?>" />
                            </td>

                        <td class="cel">Fecha Recibido:
                                <input name="" type="text" id="" disabled="disabled" value="<?php echo date("d/m/Y"); ?> "  />
                            </td>
                        <input type="hidden" name="fecha" id="fecha" value="<?php echo date("Y/m/d"); ?>" />
                        <td class="cel">Hora:
                                <input name="" type="text" disabled="disabled" id=""  value="<?php
date_default_timezone_set('America/Bogota');
echo date("h:i:s");
?> "  />
                            </td>
                        <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set('America/Bogota');
                                       echo date("h:i:s");
?>"/>
                    </tr>
                    <tr>
                        <td width="186" height="47" class="cel">Pedido Número:
                                <input type="text" name="orden" id="orden"  value="<?php echo $value ?>"/>
                            </td>
                        <td width="179" class="cel">Talonario Número:
                                <input type="text" name="talonario" id="talonario"/>
                            </td>
                        <td width="181" class="cel">Abono:
                                <input type="text" name="ab" id="ab" onkeypress="if(event.keyCode == 13) op();" />
                            </td>
                    </tr>
                    <tr>
                        <td height="41" class="cel">Total a Pagar:
                                <input type="text" name="vlr" id="vlr" disabled="disabled"/>
                                <input type="hidden" name="vlr" id="vlr" />
                            </td>
                        <td class="cel">Saldo:
                                <input type="text" name="sa" id="sa" disabled="disabled"/>

                            </td>
                        <td class="cel">Forma de pago:
                                <select name="pago" id="pago"  style="width:150px">
                                    <option selected="selected">Efectivo</option>
                                    <option>Tarjeta de credito</option>
                                    <option>Otros</option>

                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td height="33" class="cel">Observación:</td>
                        <td class="cel">
                                <textarea name="ob_pedido" id="ob_pedido" cols="45" rows="5"></textarea>
                            </td>
                        <td class="cel" height="33">Producto:
                              <select name="prenda" id="prenda"   onchange="javascript:registrarDetalle()" style="width:150px">
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
                                </select>  
                           </td>
                    </tr>
                    <tr>
                        <td height="33" class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                        <td class="cel">&nbsp;</td>
                    </tr>
                </table></form>
   <div id="detal"></div>
        <div id="conte">

        </div>
    </body>
</html>