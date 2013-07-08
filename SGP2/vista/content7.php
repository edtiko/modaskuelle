
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="es" lang="es">
    <head>
        <script language="javascript" type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.blockUI.js"></script>
        <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
        <link type="text/css" href="js/jquery.js" rel="stylesheet" />
        <script type="text/javascript" src="js/asignar.js"></script>

        <link rel="stylesheet" type="text/css" href="css/asignacion.css"/> 
        <link href="css/PHPPaging.lib.css" rel="stylesheet" type="text/css" />
        <script>
      
            $(document).ready(function(){
                if($("#criterio").val()=="operario"){
                    $('#busqueda').autocomplete({
                    minLength: 2,
                    source:"autocomplete_operario2.php"
                });                
                    $("#busqueda").keypress(function() {
                        json_operario();
                    });
                }
         else{
             
              }
                
                $("#criterio").change(function(){
                    $("#datos_operario").css("display", "none");
           
                    if($(this).val()=="prenda"){
                        $("#pr").css("display", "block");
                        $("#busqueda").css("display", "none");
                        }
                      else if($(this).val()=="operario"){
                      $('#busqueda').autocomplete({
                    minLength: 3,
                    source:"autocomplete_operario2.php"
                });
                            $("#busqueda").show();
                            $("#pr").css("display", "none");
                            $("#busqueda").keypress(function() {
                                json_operario();
                            });
                    }
                  else if($(this).val()=="pedido") {
                       $("#busqueda").keypress(function() {
                        return null
                    });
               
                            $("#busqueda").show();
                            $("#pr").css("display", "none");  
                           
                    }
                }); });
            jQuery(function($){
                $.datepicker.regional['es'] = {
                    closeText: 'Cerrar',
                    prevText: '&#x3c;Ant',
                    nextText: 'Sig&#x3e;',
                    currentText: 'Hoy',
                    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                        'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                        'Jul','Ago','Sep','Oct','Nov','Dic'],
                    dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
                    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
                    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''};
                $.datepicker.setDefaults($.datepicker.regional['es']);
            });
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
    </head>
    <body>
        <div class="tab_container">
            <fieldset>
                <legend><h2 style="text-align:center;"> Pedidos Asignados </h2></legend>

                <form name="frm_asignados" id="frm_asignados" action="javascript: pedidos()" method="post">

                    <table border="0" width="950" id="control">
                        <tr>
                            <td width="32" class="cel"><a href="javascript:newOp()" title="Operario Nuevo"><img src="img/user.gif" id="nuevo" style='width:20px; height:20px;'/></a></td>
                            <td width="40"  height="21" class="cel"> 
                                <select name="criterio" id="criterio">
                                    <option value="operario">OPERARIO</option>
                                    <option value="pedido">NO.PEDIDO</option>
                                    <option value="prenda">PRENDA</option>
                                    <option value="cliente">CLIENTE</option>
                                </select></td>
                            <td class="cel">
                                <input name ="busqueda" type="text" id="busqueda"  size="25"/>
                        <select name='pr' id='pr' style='display: none'>
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
                        <td width="99" class="cel"><div align="right"><strong>SEMANA DEL:</strong></div></td>
                        <td width="192" class="cel">
                            <input type="text" name="fechauno" id="fechauno"/></td>
                        <td width="37" class="cel"><div align="right"><strong>AL:</strong></div></td>
                        <td width="186" class="cel"><input type="text" name="fechados" id="fechados"/></td>
                        <td width="112" class="cel"><div align="left">
                                <input type="submit" name="button" id="button" value="Buscar" />
                            </div></td>
                        </tr>
                    </table> 
                    <div id="datos_operario" style="display:none; width: 840px;">
                        <fieldset id="datos">
                            <legend>Datos Operario</legend>
                            <table  width="951"  border="0" >
                                <tr>
                                    <td width="359"class="cel"><strong>NOMBRE:</strong></td>

                                    <td width="293" class="cel"><strong>CEDULA:</strong></td>

                                    <td width="285" class="cel"><strong>BARRIO:</strong></td>

                                </tr>
                                <tr>
                                    <td width="359" class="cel"><span id="nom"></span></td>  
                                    <td width="293" class="cel"><span id="cc"></span></td>
                                    <td width="285" class="cel"><span id="ba"></span></td>
                                </tr>
                                <tr>
                                    <td width="359"  class="cel"><strong>DIRECCIÓN:</strong></td>

                                    <td width="293" class="cel"><strong>TELEFONO:</strong></td>

                                </tr>
                                <tr>
                                    <td width="359" class="cel"><span id="dir"></span></td>  
                                    <td width="293" class="cel"><span id="tel"></span></td> 
                                </tr>
                            </table> 
                        </fieldset>
                    </div>       
                </form>
                <div id="listar_ordenes"></div>
                <div id="popup"></div>

            </fieldset>

        </div>     
    </body>
</html>