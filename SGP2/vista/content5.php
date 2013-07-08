<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="es" lang="es">
<head>
  <title>Pedidos</title>
        <link rel="stylesheet" type="text/css" href="css/pedido1.css"/>
		
        <script language="javascript" type="text/javascript" src="js/jquery.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.blockUI.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery-border.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
   <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />

        <link href="css/PHPPaging.lib.css" rel="stylesheet" type="text/css" />
        <script language="javascript" type="text/javascript" src="index.js"></script>
       
    
		 <script type="text/javascript">
		 $(document).ready(function(){

		 $("#criterio1").change(function(){
		 if($(this).val()=="ESTADO"){
		 $("#cr").css("display", "block");
		 $("#criterio_res, #fecha1, #fecha2").css("display", "none");
                 $("#fecha1, #fecha2").val("");
		 $("#type").val("lista");
		 }
		else if($(this).val()=="FECHA")
		 {
                  $("#fecha1, #fecha2").show();
		 $("#cr, #criterio_res").css("display", "none");
		 $("#type").val("campo");
                   $("#fecha1, #fecha2").datepicker({

	  dateFormat:'yy/mm/dd',
      buttonImageOnly: true,
      changeYear: true,
	  changeMonth: true,
      onSelect: function(textoFecha, objDatepicker){

      }
   });
		 }
                 else
		 {
		 $("#criterio_res").show();
		 $("#cr, #fecha1, #fecha2").css("display", "none");
                  $("#fecha1, #fecha2").val("");
		 $("#type").val("campo");
		 }
                 
		 });

		 });
		 </script>
    </head>
    <body bgcolor="white">
    	<div id="cuerpo" align="center" height="920px">
  <input type="hidden" id="gridview" name="gridview"/>
<div class="centermain" align="center">
 
<div id="letra">
<img src="img/car.png" width="54" height="54" id="carro"/>
  <h3 style="color: #666;">PEDIDOS</h3> 
</div>
  <div class="main">
    <div class="tab_container">
<form action="javascript:buscar();" id="frm_buscar" name="frm_buscar" method="POST">
 <table width="1000" class="formulario"  id="comand">
    <input type="hidden" id="sol" name="sol" value="listar"/>
    <input type="hidden" id="type" name="type" value="campo"/>
    <tbody>
      <tr>
        <th id="th" class="null"><a href="javascript:newpedido();" title="Pedido Nuevo"><img src="img/add.png" id="nuevo" style='width:20px; height:20px;'/></a></th>
        <th id="th" class="null"> <select name="criterio1" id="criterio1">
          <option value="NRO_PEDIDO">No.Pedido</option>
          <option value="cliente">Cliente</option>
           <option value="ESTADO">Estado del pedido</option>
             <option value="FECHA">Fecha Recibido</option>
         
        </select>
        </th>
        <th id="th" class="null"><input name="criterio_res" type="text" id="criterio_res" style="width: 130px;" />
            <input name="fecha1" type="text" id="fecha1" style="display: none; width:70px;"/>
          <select name='cr' id='cr' style='display: none'>
            <option value='Sin Asignar'>Sin asignar</option>
            <option value='Produccion'>Produccion</option>
            <option value='Terminado'>Terminado</option>
            <option value='Entregado'>Entregado</option>
            <option value="">Todos</option>
          </select>
            </th>
            <th id="th" class="null"><input  type="text" name="fecha2" id="fecha2" style='display: none; width:70px;'/></th>
        <th id="th" class="null">ORDENAR </th>
        <th id="th" class="null"> <select name="criterio_ordenar_por" id="criterio_ordenar_por">
                <option value="P.FECHA_RECIBIDO">Fecha Recibido</option>
          <option value="P.NRO_PEDIDO">Nro Pedido</option>
          <option value="P.TOTAL">Valor</option>
          <option value="FECHA_ENTREGA">Fecha Entrega</option>
          <option value="FECHA_RENTREGA">Fecha Rentrega</option>
        </select>
        </th>
        <th id="th" class="null"> EN</th>
        <th id="th" class="null"> <select name="criterio_orden" id="criterio_orden">
          <option value="desc">Descendente</option>
          <option value="asc">Ascendente</option>
        </select>
        </th>
      
        <th class="null"><input type="submit" value="Buscar" />
          &nbsp;&nbsp; <a href="generateExcel.php"><img src="img/excel.png"/></a></th>
      </tr>
    </tbody>
  </table>
</form>

<div id="div_listar"></div>
<div id="div_abonar"></div>
 <div id="div_oculto"  style="display: none;"></div>
 
    </div>
   
  </div>
  </div>
 
</div>

</body>
</html>