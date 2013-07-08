<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);
$nroPedido= $_POST['nroPedido'];
$query=  mysql_query("select a.CLIENTE, a.NRO_PEDIDO, b.nombre_apellido, b.id_cliente from tbpedido a, tbcliente b where a.NRO_PEDIDO= $nroPedido and a.CLIENTE=b.id_cliente");
$res=  mysql_fetch_assoc($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="es" lang="es">
    <head>
        <script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
        <script>
            $(document).ready(function(){
 	$("#frm_abono").validate({
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea registrar el abono?');
				if (respuesta)
					form.submit();
			}
		});
 });
     	  $("#fecha_abono").datepicker({

	  dateFormat:'yy/mm/dd',
      showOn: 'both',
      buttonImage: 'ico/calendar.png',
      buttonImageOnly: true,
      changeYear: true,
	  changeMonth: true,
      onSelect: function(textoFecha, objDatepicker){

      }
   });
    </script>
        <style>
        .cel{
	border-bottom: 0px solid #666;
border-right: 0px hidden;}

#form, tr:hover td{
	background-color: transparent;
}
        </style>
    </head>
    <body>
    <h2 align="center">Abonar</h2>
     <form name="frm_abono" id="frm_abono" action="javascript: reg_abono()">
         <input type="hidden" name="sol" id="sol" value="abonar"/>
     <table width="352" height="434">
     <tr>
     <td width="144" class="cel"><strong>Pedido No:</strong></td>
     <td width="196" class="cel">
       <input type="text" value="<?php echo $nroPedido ?>" />
       <input type="hidden" name="pedido" id="pedido" value="<?php echo $nroPedido ?>" />
     </td>
     </tr>
     <tr>
     <td class="cel"><strong>Nombre cliente:</strong></td>
     <td class="cel">
       <input type="text" value="<?php echo ucwords(strtolower( $res['nombre_apellido'])) ?>"  />
     <input type="hidden" name="cliente" id="cliente" value="<?php echo $res['nombre_apellido'] ?>"/>
     </td>
     </tr>
     <tr>
     <td class="cel"><strong>Fecha de abono:</strong></td>
     <td class="cel"><label for="fecha_abono"></label>
       <input type="text" name="fecha_abono" id="fecha_abono" class="required" value="<?php 
 echo date("Y/m/d"); ?> "/></td>
     </tr>
     <tr>
     <td class="cel"><strong>Forma de pago:</strong></td>
     <td class="cel"><label for="forma_pago"></label>
       <label for="forma_pago"></label>
       <select name="forma_pago" id="forma_pago" style="width:157px;">
       <option selected="selected">Efectivo</option>
       <option>Tarjeta de credito</option>
       <option>Otros</option>
       </select></td>
     </tr>
     <tr>
     <td class="cel"><strong>Valor abono:</strong></td>
     <td class="cel">
       <input type="text" name="abono" id="abono" value="" class="required" /></td>
     </tr>
     <tr>
     <td class="cel">
     
     </td>
     <td class="cel"><div align="left">
       <input type="submit" name="guardar_abono" id="guardar_abono" value="Guardar"  />
       <input type="button" name="close" id="close" value="Cancelar"  onclick="fn_cerrar()"/>
     </div></td>
     </tr>
     </table>
    </form>
</body>
</html>