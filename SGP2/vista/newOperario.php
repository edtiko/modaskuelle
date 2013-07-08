<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="es" lang="es">
<head>
<script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
     <script>
      
   $(document).ready(function(){
   
 	$("#frm_operario").validate({
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea registrar el operario?')
				if (respuesta)
					form.submit();
			}
		});
       $("#fecha_nac").datepicker({

	  dateFormat:'yy/mm/dd',
          showOn: 'both',
       buttonImage: 'ico/calendar.png',
      buttonImageOnly: true,
      changeYear: true,
	  changeMonth: true,
          yearRange: '-100:+0',
      onSelect: function(textoFecha, objDatepicker){

      }
   }); 
           
 });
      </script>
     
</head>
<body>
<h2>Nuevo Operario</h2>
<form id="frm_operario" action="javascript: saveOperario()">
<table width="371" height="403">
    <input type="hidden" name="sol" id="sol" value="save_operario"/>
<tr>
<td width="179" height="91" class="cel">*Cedula:
  <label for="id"></label>
  <input type="text" name="cedula" id="cedula" class="required"/></td>
<td width="192" class="cel">*Nombre:
  <label for="nom"></label>
  <input type="text" name="nombre" id="nombre" class="required"/></td>
</tr>
<tr>
<td height="77" class="cel">*Apellido:
  <label for="apellido"></label>
  <input type="text" name="apellido" id="apellido" class="required"/></td>
<td class="cel">*Telefono:
  <label for="tel"></label>
  <input type="text" name="telefono" id="telefono" class="required"/></td>
</tr>
<tr>
<td height="90" class="cel">*Direccion:
  <label for="dir"></label>
  <input type="text" name="direccion" id="direccion" class="required"/></td>
<td class="cel">*Barrio:
  <input type="text" name="barrio" id="barrio" class="required"/></td>
</tr>
<tr>
<td height="66" class="cel">*Fecha de Nacimiento:
  <label for="edad2"></label>
  <input type="text" name="fecha_nac" id="fecha_nac" class="required"/></td>
<td class="cel">*Antiguedad:
  <label for="antiguedad"></label>
  <select name="antiguedad" id="antiguedad">
    <option value="1">1 año o menos</option>
    <option value="2">entre 1 y 2 años</option>
    <option value="3">entre 2 y 3 años</option>
    <option value="4">entre 3 y 5 años o mas</option>
  </select></td>
</tr>
<tr>
<td class="cel"><div align="center">
  <input type="submit" name="save2" id="save2" value="Guardar" />
</div></td>
<td class="cel"><div align="center">
  <input type="button" name="close" id="close" value="Cancelar"  onclick="cerrar()" />
</div></td>
</tr>
</table>
</form>
</body>
</html>
