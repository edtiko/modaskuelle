<?php
session_start();
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="es" lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="css/registrar.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
        <link href="css/PHPPaging.lib.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/registrar_medidas.js" type="text/javascript"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.blockUI.js"></script>
        <script language="javascript" type="text/javascript" src="index.js"></script>
        <script language="javascript" type="text/javascript" src="js/cliente.js"></script>

        <title>Registrar Cliente</title>

    </head>

    <body>
        <div id="letra">
            <img src="img/users.png" width="54" height="54" id="user"/>
            <h3 style="color: #666;">  CLIENTES</h3> 
        </div>
        <div class="tab_container">
            <div id="resultado">
                <fieldset id="paneld">
                    <legend><strong>DATOS PERSONALES</strong></legend>
                    <p>&nbsp;</p>
                    <div id="op"></div>
                    <form name="form1" id="form1" >
                        <table width="584" height="343" border="0">
                            <input type="hidden" id="sol" name="sol" value="registrar"/>
                            <tr>
                                <td height="11">Fecha Entrada:
                                    <input type="hidden" id="fechaE" name="fechaE" value="<?php echo date("Y/m/d"); ?> "/>
                                    <input name="fecha" type="text" id="fecha" disabled="disabled" value="<?php echo date("d/m/Y"); ?> " /></td>
                                <td>Digitador:
                                    <input  type="text"  style="text-transform: uppercase;" onkeypress="if(event.keyCode == 13) form1.cedula.focus();" value="<?php echo $_SESSION['k_username']; ?>" disabled="disabled"/>
                                    <input type="hidden" name="digitador" id="digitador" value="<?php echo $_SESSION['k_username']; ?>" /></td>
                                <td> <div id="last"></div></td>
                            </tr>
                            <tr>
                                <td width="193" height="55">Cedula:    

                                    <input type="text" name="cedula" id="cedula"  class="required" onkeypress="if(event.keyCode == 13) form1.nombre.focus(); json(); " /></td>
                                <td width="186">Nombre:      
                                    <input type="text" name="nombre"  id="nombre" style="text-transform: uppercase;" class="required" onkeypress="if(event.keyCode == 13) form1.apellido.focus(); json2();" /></td>
                                <td width="191">Apellido:
                                    <input name="apellido" type="text" id="apellido" style="text-transform: uppercase;" class="required" onkeypress="if(event.keyCode == 13) form1.telefono.focus();" />
                                </td>

                            </tr>
                            <tr>
                                <td height="50">Telefono:
                                    <input type="text" name="telefono" id="telefono" class="required"  onkeypress="if(event.keyCode == 13) form1.celular.focus();"/>
                                </td>
                                <td>Celular:
                                    <input name="celular" type="text" id="celular" class="required"  style="text-transform: uppercase;" onkeypress="if(event.keyCode == 13) form1.direccion.focus();"/>
                                </td>
                                <td>Dirección:
                                    <input name="direccion" type="text" id="direccion" style="text-transform: uppercase;" class="required" onkeypress="if(event.keyCode == 13) form1.ciudad.focus();"/>
                                </td>

                            </tr>
                            <tr>
                                <td height="54">Ciudad/Barrio:
                                    <input name="ciudad" type="text" id="ciudad" style="text-transform: uppercase;" class="required" onkeypress="if(event.keyCode == 13) form1.empresa.focus();"/>
                                </td>
                                <td>Empresa:
                                    <input name="empresa" type="text" id="empresa" style="text-transform: uppercase;" class="required" onkeypress="if(event.keyCode == 13) form1.sexo.focus();"/>
                                </td>
                                <td>Sexo:
                                    <select name="sexo" id="sexo" style="width:50px" onkeypress="if(event.keyCode == 13) form1.ob_reg.focus();">
                                        <option>M</option>
                                        <option>F</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td height="37">Observación: </td>
                                <td>&nbsp;</td>
                                <td><div id="agreg"></div></td>

                            </tr>
                            <tr>
                                <td height="17">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input id="guardar" name="guardar" value="Guardar" type="button" onclick="javascript:_registrar()" />
                                    <input id="limpiar" name="limpiar" value="Limpiar" type="reset" onclick="load()"/></td>
                            </tr>

                            <tr>
                                <td >&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="32"><textarea name="ob_reg" id="ob_reg" cols="45" rows="5"></textarea></td>
                                <td>&nbsp;</td>

                                <td>&nbsp;</td>

                            </tr>

                        </table>
                    </form>


                </fieldset>

                <div id="dato"></div>
                <div id="contenedor"></div>

            </div>

            <div id="div_oculto" style="display: none;"></div>
        </div>
    </body>

</html>
