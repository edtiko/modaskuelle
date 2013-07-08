<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" href="css/operarios.css"/>
  <link href="css/PHPPaging.lib.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
 <script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="index.js"></script>
 <script type="text/javascript">
		 $(document).ready(function(){

		 $("#criterio1").change(function(){
		 if($(this).val()=="ESTADO"){
		 $("#cr").css("display", "block");
		 $("#criterio_res").css("display", "none");
		 $("#type").val("lista");
		 }
		 else
		 {
		 $("#criterio_res").css("display", "block");
		 $("#cr").css("display", "none");
		 $("#type").val("campo");
		 }
		 });

		 });
		 </script>
</head>
<body bgcolor="white">
    	<div id="cuerpo" align="center" height="920px">

<div class="centermain" align="center">
  <div class="main">
    <h2 style="color: #666;">Gestión de Operarios</h2>

<div class="tab_container">

            <form action="javascript:buscar();" id="frm_buscar" name="frm_buscar" method="POST">

                <table class="formulario">
                               <input type="hidden" id="gridview" name="gridview" value=""/>
				<input type="hidden" id="sol" name="sol" value="listar"/>
				<input type="hidden" id="type" name="type" value="campo"/>
                    <tbody>
					                        <tr>

                            <th id="" class="null">
							<select name="criterio1" id="criterio1">
                                    <option value="OPERARIO">Responsable</option>
                                	<option value="C.nombre_apellido">Cliente</option>
				      <option value="ESTADO">Estado del pedido</option>
                            </select>
							</th>
                            <th id="" class="null"><input name="criterio_res" type="text" id="criterio_res" />

					<select name='cr' id='cr' style='display: none'>
                                            <option value='Produccion'>Produccion</option>
                                            <option value='Terminado'>Terminado</option>
                                            <option value='Entregado'>Entregado</option>
                                            <option value="">Todos</option></select>							</th>
                            <th id="" class="null">Ordenar </th>
                            <th id="" class="null">
                            	<select name="criterio_ordenar_por" id="criterio_ordenar_por">
                                    <option value="P.NRO_PEDIDO">Nro Pedido</option>
                                	<option value="P.TOTAL">Valor</option>

                                    <option value="P.FECHA_RECIBIDO">Fecha Recibido</option>
									 <option value="FECHA_ENTREGA">Fecha Entrega</option>
									  <option value="FECHA_RENTREGA">Fecha Rentrega</option>

                                </select>
                            </th>
                            <th id="" class="null"> En</th>

                            <th id="" class="null">
                            	<select name="criterio_orden" id="criterio_orden">
                                	<option value="desc">Descendente</option>
                                    <option value="asc">Ascendente</option>
                                </select>
                            </th>
                            <th id="" class="null">Registros</th>

                            <th class="null">
                            	<select name="criterio_mostrar" id="criterio_mostrar">
                                	<option value="1">1</option>
                                	<option value="2">2</option>
                                	<option value="5">5</option>
                                	<option value="10">10</option>
                                	<option value="20" selected="selected">20</option>

              
                                </select>
                            </th>
                            <th class="null"><input type="submit" value="Buscar" />&nbsp;&nbsp;
							<a href="generateExcel.php"><img src="img/excel.png"/></a></th>
                        </tr>
                  </tbody>
                </table>


        </form>
<div id="div_listar"></div>
            <div id="div_oculto" style="display: none;"></div>
      </div>
  </div>
  </div>
</div>

    </body>
</html>

