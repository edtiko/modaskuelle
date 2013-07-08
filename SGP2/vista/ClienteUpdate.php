<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);
    
	$nroPedido=$_POST['nroPedido'];
	$sql ="SELECT * FROM tbcliente WHERE id_cliente='$nroPedido'";
	$per = mysql_query($sql);
	$num_rs_per = mysql_num_rows($per);
	if ($num_rs_per==0){
		echo "No existen pedidos con ese IDE";
		exit;
	}
	
	$res = mysql_fetch_assoc($per);

	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 
   <script type="text/javascript" src="js/jquery-ui.min.js"></script>
   <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />

   <script language="javascript" type="text/javascript">
	$(document).ready(function(){

   
   		$("#frm_per").validate({
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea realmente modificar a esta nueva persona?')
				if (respuesta)
					form.submit();
			}
		});
	});
	
	function fn_modificar(){
		var str = $("#frm_per").serialize();
		$.ajax({
			url: '../modelo/clientesController.php',
			data: str,
			type: 'post',
			success: function(data){
				if(data != "")
					alert(data);
				fn_cerrar();
				json();
			}
		});
	}
	
	

</script>

<head>
<link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
  
</head>
 <body>  
<h2 style="text-align:center;">Modificar Cliente</h2>
<p >Por favor rellene el siguiente formulario</p>
<form action="javascript: fn_modificar();" method="post" id="frm_per">

	

         <input type="hidden" id="sol" name="sol" value="modificar"/>
           <input type="hidden" id="id" name="id" value="<?php echo ($res['id_cliente'])?>"/>
		   <input type="hidden" id="digitadoR" name="digitadoR" value="<?php echo ($res['digitador'])?>"/>
		   <input name="fechA" type="hidden" id="fechA"  value="<?php echo ($res['fecha_entrada'])?>"/>
  <table width="351" class="formulario">
  		    <tr>
			<td width="163" height="63">Cedula:<input name="cedula" type="text" id="cedula"  disabled="disabled" class="required" value="<?php echo ($res['id_cliente'])?>"/></td>
                <td width="165">Fecha de Ingreso:
                
				 <input  type="text"  disabled="disabled" class="required" value="<?php echo ($res['fecha_entrada'])?>"/>
		    </tr>		
			<tr>
                <td height="61">Nombre:<input name="nombre" type="text" id="nombre" class="required" value="<?php echo ($res['nombre_cliente'])?>" /></td>
				 <td height="61">Apellido:<input name="apellido" type="text" id="apellido"  class="required" value="<?php echo ($res['apellido'])?>"/></td>
                
		    </tr>	
			<tr>
                 <td>Celular:
                <input name="celular" type="text" id="celular"   value="<?php echo ($res['celular'])?>"/></td>
				<td>Direccion:
			    <input name="dir" type="text" id="dir"   class="required" value="<?php echo ($res['direccion'])?>" />				  </td>
            </tr>
			<tr>
                <td height="59">Telefono:<input name="tel" type="text" id="tel" class="required" value="<?php echo ($res['telefono'])?>"/></td>
				<td>Empresa:
                <input name="emp" type="text" id="emp"  class="required" value="<?php echo ($res['empresa'])?>"/></td>
            </tr>
      	    <tr>
                <td height="56">Sexo:
				
				<input name="sexo" type="text" id="sexo"  class="required" value="<?php echo ($res['sexo'])?>"/></td>
				<td>Ciudad:
              <input name="ciudad" type="text" id="ciudad"  class="required" value="<?php echo ($res['ciudad'])?>"/></td>                 </td>
            </tr>
			  	    <tr>
                <td>Observación: </td>   
				<td></td>        
            </tr>
			
		
            <tr>
                      <td></td>
                      <td colspan="2">&nbsp;</td>
    </tr>
            <tr>
	                  <td></td>
	                  <td colspan="2">&nbsp;</td>
    </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
			          <td><textarea name="ob_r" id="ob_r" style="position:absolute; left: 20px; top: 425px; width: 215px; height: 64px;"  cols="45" rows="5"><?php echo($res['observacion'])?></textarea></td>
			          <td colspan="2">&nbsp;</td>
    </tr>
	        <tr>
            <td>&nbsp;</td>
		<td colspan="2"><input name="agregar" type="submit" id="agregar" value="Guardar" style="height: 20px"/>
          <input name="cancelar" type="button" id="cancelar" value="Cancelar" onclick="fn_cerrar();" style="height: 20px"/></td>  
			</tr>
			 <tr>
              <td colspan="2"></td>  				
            </tr>

    </table>
</form>
</body>
</html>