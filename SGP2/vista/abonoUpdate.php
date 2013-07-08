<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);
$abono= $_POST['abono'];
$query=  mysql_query("select a.NRO_PEDIDO, a.CLIENTE, b.id_cliente, b.nombre_apellido, c.* from tbpedido a JOIN tbcliente b JOIN abonos c ON c.NRO_PEDIDO= a.NRO_PEDIDO and b.id_cliente=a.CLIENTE where ID_ABONO=".$abono."");
$res=  mysql_fetch_assoc($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="es" lang="es">
    <head>
        <script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
        <script>
            $(document).ready(function(){
 	$("#frm_abono").validate({
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea actualizar el abono?')
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
     <form name="frm_abono" id="frm_abono" action="javascript:update_abono()">
         <input type="hidden" name="sol" id="sol" value="editar_abono"/>
         <input type="hidden" name="nroabono" id="nroabono" value="<?php echo $abono ?>"/>
     <table width="352" height="434">
     <tr>
     <td width="144" class="cel"><strong>Pedido No:</strong></td>
     <td width="196" class="cel">
       <input type="text" value="<?php echo $res['NRO_PEDIDO'] ?>" />
       <input type="hidden" name="pedido" id="pedido" value="<?php echo $res['NRO_PEDIDO'] ?>" />
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
 echo $res['FECHA_ABONO'] ?> "/></td>
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
       <input type="text" name="abono" id="abono" value="<?php echo $res['ABONO'] ?>" class="required" /></td>
     </tr>
     <tr>
     <td class="cel">

     </td>
     <td class="cel"><div align="left">
       <input type="submit" name="guardar" id="guardar" value="Guardar" />
       <input type="button" name="close" id="close" value="Cancelar"  onclick="fn_cerrar()"/>
     </div></td>
     </tr>
     </table>
    </form>
</body>
</html>