<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="es" lang="es">
    <head>
        <script language="javascript" type="text/javascript" src="js/jquery-ui.min.js"></script>
   <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
      <script language="javascript" type="text/javascript" src="js/abonos.js"></script>
<link type="text/css" href="css/abonos.css" rel="stylesheet" />
<script>
      $("#fechauno,#fechados").datepicker({

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
 <script type="text/javascript">

		 $(document).ready(function(){

		 $("#criterio").change(function(){

		 if($(this).val()=="FORMA_PAGO"){

		 $("#cr").css("display", "block");

		 $("#busqueda").css("display", "none");

		 $("#type").val("lista");

		 }

		 else

		 {

		 $("#busqueda").show();

		 $("#cr").css("display", "none");

		 $("#type").val("campo");

		 }

		 });

		 });

		 </script>

	</head>
	<body>
    <fieldset>
    <legend><h2 style="text-align:center;"> Abonos </h2></legend>
	<form action="javascript:Abonos();" method="post" id="frm_ab">
    <table width="950">
        <input type="hidden" name="sol" id="sol" value="abonos"/>
        <input type="hidden" id="type" name="type" value="campo"/>
    <tr>
    <td width="157" class="cel"><select name="criterio" id="criterio" style="width:120px;">
    <option selected="selected" value="pedido">Pedido</option>
    <option value="cliente">Cliente</option>
     <option value="FORMA_PAGO">Forma de Pago</option>
    </select></td>
    <td width="184" class="cel"><div align="left">
      <input type="text" name="busqueda" id="busqueda" />
      <select name='cr' id='cr' style='display: none'>
        <option value='Efectivo'>Efectivo</option>
        <option value='Tarjeta de credito'>Tarjeta de credito</option>
        <option value="Otros">Otros</option>
      </select>
    </div></td>
    <td width="68" class="cel"><div align="right"><strong>DEL:</strong></div></td>
    <td width="178" class="cel"><div align="left">
      <input type="text" name="fechauno" id="fechauno"/>
    </div></td>
    <td width="46" class="cel"><div align="right"><strong>AL:</strong></div></td>
    <td width="178" class="cel"><div align="left">
      <input type="text" name="fechados" id="fechados"/>
    </div></td>
    <td width="107" class="cel"><input type="submit" id="save"  value="Buscar" /></td>
    </tr>
    </table>
	</form>
    <div id="conte"></div>
    <div id="oculto"></div>
    </fieldset>
	</body>
	</html>