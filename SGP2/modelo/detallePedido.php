
<script type="text/javascript" src="js/detallePop.js"></script>

<script>
    $(document).ready(function(){
        $( "#accordion" ).accordion();      
        $("#det").validate({
            submitHandler: function(form) {
                var respuesta = confirm('\xBFDesea registrar el detalle?');
                if (respuesta)
                    form.submit();
            }
        });
    });
    $("#f1").datepicker({
        dateFormat:'yy/mm/dd',
        showOn: 'both',
        buttonImage: 'ico/calendar.png',
        buttonImageOnly: true,
        changeYear: true,
        changeMonth: true
    });
   
</script>
<?php
$bd = 'modaskuelle';
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db($bd, $conexion);


if (isset($_POST["cedula"]) && isset($_POST["prenda"])) {

    $pedido = $_POST['orden'];
    $orden = $_POST['orden'];
    $prenda = $_POST['prenda'];
    $ced = $_POST['cedula'];
    $sql = mysql_query("SELECT * FROM tbcliente WHERE id_cliente= " . $_POST['cedula'] . "");

    $result = mysql_fetch_array($sql);
    if ($result['id_cliente'] == $_POST['cedula']) {


        if ($prenda == 'Arreglo') {
            ?>

            <div id="div">
                <form name="det" id="det" action="javascript: orden_arreglo()">
                    <table id="" border="0" cellpadding="0" cellspacing="0">
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Arreglo" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden" value="listdetalle" />

                        <tr>
                            <td height="35" class="cel"><strong>Información Arreglo:</strong></td>
                            <td class="cel">&nbsp;</td>

                        </tr>
                        <tr>
                            <td class="cel">Precio: </td>
                            <td class="cel">Fecha Entrega:</td>
                        </tr>
                        <tr>
                            <td width="208"  class="cel"><input type="text" name="precio" id="precio" class="required" /></td>
                            <td width="231" class="cel"><input type="text" name="f1" id="f1" class="required"  /></td>
                        </tr>
                        <tr>
                            <td class="cel"></td>
                            <td class="cel"></td>
                        </tr>
                        <tr>

                            <td height="37" class="cel">Descripcion:
                                <textarea name="arreglo" id="arreglo" cols="45" rows="5" class="required" ></textarea>
                            </td>
                            <td class="cel"></td>

                        </tr>
                        <tr>
                            <td height="35" class="cel"></td>
                            <td class="cel">&nbsp;</td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
        }

        if ($prenda == 'Pantalon') {
            $consulta = mysql_query("SELECT * FROM pantalon WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 178px;
                    width: 40px;
                    left: 490px;

                }
                #opciones{
                    position:absolute;
                    top: 250px;
                    left: 425px;
                   font-size: 15px;
                   
                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" >
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Pantalon" />
                        <input type="hidden" name="orden" id="orden" value="<?php echo $orden ?>" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden" value="listdetalle" />

                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required"  />
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required" />
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1" class="required"  />
                            </td>    
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"  /></td>
                            <td class="cel">Descripcion:


                                <textarea name="descrip" id="descrip" cols="45" rows="5"></textarea>
                            </td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                </div>
                <h3>Medidas</h3>
                <div>
                    <form name="cm" id="cm">
                        <table width="550">
                            <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                            <input type="hidden" name="prenda" id="prenda" value="Pantalon"/>
                            <tr>
                                <td height="19" class="cel">Cintura:    

                                </td>

                                <td class="cel">Base:     

                                </td>
                                <td class="cel">Largo:     

                                </td>
                                <td class="cel">Tiro:    

                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.base.focus();"/></td>
                                <td class="cel"><input type="text" name="base" id="base" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.largo.focus();"/></td>
                                <td class="cel"><input type="text" name="largo" id="largo" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.tiro.focus();"/></td>
                                <td class="cel"><input type="text" name="tiro" id="tiro" style="width:80px;" value="<?php echo $row['tiro'] ?>" onkeypress="if(event.keyCode == 13) cm.pie.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Pierna:

                                </td>
                                <td class="cel">Rodilla:

                                </td>
                                <td class="cel">Bota:

                                </td>
                                <td class="cel">Talla:

                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="pie" id="pie" style="width:80px;" value="<?php echo $row['pierna'] ?>" onkeypress="if(event.keyCode == 13) cm.rod.focus();"/></td>
                                <td class="cel"><input type="text" name="rod" id="rod" style="width:80px;" value="<?php echo $row['rodilla'] ?>" onkeypress="if(event.keyCode == 13) cm.bota.focus();"/></td>
                                <td class="cel"><input type="text" name="bota" id="bota" style="width:80px;" value="<?php echo $row['bota'] ?>" onkeypress="if(event.keyCode == 13) cm.tall.focus();"/></td>
                                <td class="cel"><input type="text" name="tall" id="tall" style="width:80px;" value="<?php echo $row['talla'] ?>" onkeypress="if(event.keyCode == 13) cm.observacion.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Observacion: 
                                </td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel">Molde: 

                                </td>
                                <td class="cel">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="observacion" id="observacion" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><select name="molde" id="molde" style="width:80px">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>NO</option>
                                        <option>SI</option>
                                    </select> </td>
                                <td class="cel">&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                    <?php if ($row['id_cliente'] == $ced) { ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                    <?php } else { ?>
                        <a href="javascript:registrar_pantalon();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>

                <?php
            }
        }
        if ($prenda == 'Saco') {
            $consulta = mysql_query("SELECT * FROM saco WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 250px;
                    width: 40px;
                    left: 490px;

                }
                #opciones{
                    position:absolute;
                    top: 250px;
                    left: 410px;
                    font-size: 15px;
                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" cellpadding="0" cellspacing="0">
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Saco" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required" />
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required" />
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1" class="required"  />
                            </td>   
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required" /></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" class="required" cols="45" rows="5"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                </div>
                <h3>Medidas Saco</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <table width="550">
                            <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                            <input type="hidden" name="prenda" id="prenda" value="Saco"/>
                            <tr>
                                <td height="19" class="cel">Talle:    
                                </td>

                                <td class="cel">Espalda alta:     
                                </td>
                                <td class="cel">Espalda baja:     
                                </td>
                                <td class="cel">largo:    
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="talle" id="talle" style="width:80px;" value="<?php echo $row['talle'] ?>"  onkeypress="if(event.keyCode == 13) cm.esp_al.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_al" id="esp_al" style="width:80px;" value="<?php echo $row['espalda_alta'] ?>"  onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_b" id="esp_b" style="width:80px;" value="<?php echo $row['espalda_baja'] ?>"  onkeypress="if(event.keyCode == 13) cm.lar.focus();"/></td>
                                <td class="cel"><input type="text" name="lar" id="lar" style="width:80px;" value="<?php echo $row['largo'] ?>"  onkeypress="if(event.keyCode == 13) cm.pecho.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Pecho:
                                </td>
                                <td class="cel">Cintura:
                                </td>
                                <td class="cel">Base:
                                </td>
                                <td class="cel">Hombro:
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="pecho" id="pecho" style="width:80px;" value="<?php echo $row['pecho'] ?>"  onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>"  onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>"  onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                                <td class="cel"><input type="text" name="hom" id="hom" style="width:80px;" value="<?php echo $row['hombro'] ?>"  onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Observacion: 
                                </td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><div align="">Manga: 

                                    </div></td>
                                <td class="cel"> <div align="">Molde: 
                                    </div></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" rows="5"  ><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><input type="text" name="man" id="man" style="width:80px;" value="<?php echo $row['manga'] ?>" /></td>
                                <td class="cel"><select name="molde" id="molde" style="width:80px">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>NO</option>
                                        <option>SI</option>
                                    </select></td>
                            </tr>
                        </table></form>
                    <?php
                    if ($row['id_cliente'] == $ced) {
                        ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                    <?php } else { ?>
                        <a href="javascript:registrar_saco();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>


                <?php
            }
        }

        if ($prenda == 'Bermuda') {

            $consulta = mysql_query("SELECT * FROM bermuda WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 178px;
                    width: 40px;
                    left: 490px;

                }
                #opciones{
                    position:absolute;
                    top: 250px;
                    left: 410px;
font-size:15px;
                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle">
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Bermuda" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required" />
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1" class="required" />
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" cols="45" rows="5" class="required"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                </diV>
                <h3>Medidas Bermuda</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Bermuda"/>
                        <table width="550">
                            <tr>
                                <td height="19" class="cel">Cintura:    
                                </td>

                                <td class="cel">Base:     
                                </td>
                                <td class="cel">Largo:     
                                </td>
                                <td class="cel">Tiro:    
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>"  onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>"  onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                                <td class="cel"><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.ti.focus();"/></td>
                                <td class="cel"><input type="text" name="ti" id="ti" style="width:80px;" value="<?php echo $row['tiro'] ?>" onkeypress="if(event.keyCode == 13) cm.bo.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Bota:
                                </td>
                                <td class="cel">Talla:
                                </td>
                                <td class="cel">Molde:
                                </td>
                                <td class="cel">
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="bo" id="bo" style="width:80px;" value="<?php echo $row['bota'] ?>" onkeypress="if(event.keyCode == 13) cm.ta.focus();"/></td>
                                <td class="cel"><input type="text" name="ta" id="ta" style="width:80px;" value="<?php echo $row['talla'] ?>" onkeypress="if(event.keyCode == 13) cm.molde.focus();"/></td>
                                <td class="cel"><select name="molde" id="molde" style="width:80px" onkeypress="if(event.keyCode == 13) cm.ob.focus();">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>NO</option>
                                        <option>SI</option>
                                    </select></td>
                                <td class="cel"></td>
                            </tr>
                            <tr>
                                <td class="cel">Observacion: 
                                </td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"></td>
                                <td class="cel"> </td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"></td>
                                <td class="cel"></td>
                            </tr>
                        </table></form>
                    <?php if ($row['id_cliente'] == $ced) { ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                    <?php } else { ?>
                        <a href="javascript:registrar_bermuda();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>

                <?php
            }
        }
        if ($prenda == 'Chaleco') {
            $consulta = mysql_query("SELECT * FROM chaleco WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 220px;
                    width: 40px;
                    left: 490px;

                }
                #opciones{
                    position:absolute;
                    top: 250px;
                    left: 410px;

                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" >
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Chaleco" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required" />
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1"  class="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" cols="45" rows="5" class="required"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
            </div>
                    <h3>Medidas Chaleco</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Chaleco"/>
                        <table width="550">
                            <tr>
                                <td height="19" class="cel">Talle:    
                                </td>

                                <td class="cel">Largo:     
                                </td>
                                <td class="cel">Espalda:     
                                </td>
                                <td class="cel">Pecho:    
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="ta" id="ta" style="width:80px;" value="<?php echo $row['talle'] ?>" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                                <td class="cel"><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.esp.focus();"/></td>
                                <td class="cel"><input type="text" name="esp" id="esp" style="width:80px;" value="<?php echo $row['espalda'] ?>" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                                <td class="cel"><input type="text" name="pe" id="pe" style="width:80px;" value="<?php echo $row['pecho'] ?>" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Cintura:
                                </td>
                                <td class="cel">Base:
                                </td>
                                <td class="cel">Hombro:
                                </td>
                                <td class="cel">Separacion:
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                                <td class="cel"><input type="text" name="hom" id="hom" style="width:80px;" value="<?php echo $row['hombro'] ?>" onkeypress="if(event.keyCode == 13) cm.sep.focus();"/></td>
                                <td class="cel"><input type="text" name="sep" id="sep" style="width:80px;" value="<?php echo $row['separacion'] ?>" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Observacion: 
                                </td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><div align="">Altura: 

                                    </div></td>
                                <td class="cel"> <div align="">Molde: 
                                    </div></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" rows="5" onkeypress="if(event.keyCode == 13) cm.alt.focus();"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><input type="text" name="alt" id="alt" style="width:80px;" value="<?php echo $row['altura'] ?>"/></td>
                                <td class="cel"><select name="molde" id="molde"  style="width:80px;">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>SI</option>
                                        <option>NO</option></td>
                            </tr>
                        </table></form>
                    <?php if ($row['id_cliente'] == $ced) { ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                    <?php } else { ?>
                        <a href="javascript: registrar_chaleco();" title="Guardar Medida"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>

                <?php
            }
        }
        if ($prenda == 'Camisa') {
            $consulta = mysql_query("SELECT * FROM camisa WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 220px;
                    width: 40px;
                    left: 490px;

                }
                #opciones{
                    position:absolute;
                    top: 250px;
                    left: 410px;
font-size:15px;
                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle">
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Camisa" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required"/>
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1"  class="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" cols="45" rows="5" class="required"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                </div>
                <h3>Medidas Camiseta</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Camisa"/>
                        <table width="550">
                            <tr>
                                <td height="19" class="cel">Cuello:    
                                </td>

                                <td class="cel">Espalda alta:     
                                </td>
                                <td class="cel">Espalda baja:     
                                </td>
                                <td class="cel">Manga:    
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="cue" id="cue" style="width:80px;" value="<?php echo $row['cuello'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_a.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_a" id="esp_a" style="width:80px;" value="<?php echo $row['espalda_alta'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_b" id="esp_b" style="width:80px;" value="<?php echo $row['espalda_baja'] ?>" onkeypress="if(event.keyCode == 13) cm.man.focus();"/></td>
                                <td class="cel"><input type="text" name="man" id="man" style="width:80px;" value="<?php echo $row['manga'] ?>" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Largo:
                                </td>
                                <td class="cel">Base:
                                </td>
                                <td class="cel">Cintura:
                                </td>
                                <td class="cel">Talla:
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.talla.focus();"/></td>
                                <td class="cel"><input type="text" name="talla" id="talla" style="width:80px;" value="<?php echo $row['talla'] ?>" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Observacion: 
                                </td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><div align="">Hombro: 

                                    </div></td>
                                <td class="cel"> <div align="">Molde: 
                                    </div></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" rows="5" onkeypress="if(event.keyCode == 13) cm.hom.focus();"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><input type="text" name="hom" id="hom" style="width:80px;" value="<?php echo $row['hombro'] ?>"/></td>
                                <td class="cel"><select name="molde" id="molde"  style="width:80px;">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>SI</option>
                                        <option>NO</option></td>
                            </tr>
                        </table></form>
                    <?php if ($row['id_cliente'] == $ced) { ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                    <?php } else { ?>
                        <a href="javascript: registrar_camisa();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>
                <?php
            }
        }
        if ($prenda == 'Slack') {
            $consulta = mysql_query("SELECT * FROM slack WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 220px;
                    width: 40px;
                    left: 490px;

                }
                #opciones{
                    position:absolute;
                    top: 250px;
                    left: 410px;
font-size:15px;
                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" >
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Slack" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required"/>
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1" class="required" />
                            </td>    
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" class="required" cols="45" rows="5"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                    </div>
                        <h3>Medidas Slack</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Slack"/>
                        <table width="550">
                            <tr>
                                <td width="147" height="19" class="cel"><strong>Medidas Slack:</strong></td>
                                <td width="148" class="cel"></td>
                                <td width="150" class="cel"></td>
                                <td width="148" class="cel">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="19" class="cel">Cintura:    
                                </td>

                                <td class="cel">Base:     
                                </td>
                                <td class="cel">Largo:     
                                </td>
                                <td class="cel">Tiro:    
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.base.focus();"/></td>
                                <td class="cel"><input type="text" name="base" id="base" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.largo.focus();"/></td>
                                <td class="cel"><input type="text" name="largo" id="largo" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.tiro.focus();"/></td>
                                <td class="cel"><input type="text" name="tiro" id="tiro" style="width:80px;" value="<?php echo $row['tiro'] ?>" onkeypress="if(event.keyCode == 13) cm.pie.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Pierna:
                                </td>
                                <td class="cel">Rodilla:
                                </td>
                                <td class="cel">Bota:
                                </td>
                                <td class="cel">Talla:
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="pie" id="pie" style="width:80px;" value="<?php echo $row['pierna'] ?>" onkeypress="if(event.keyCode == 13) cm.rod.focus();"/></td>
                                <td class="cel"><input type="text" name="rod" id="rod" style="width:80px;" value="<?php echo $row['rodilla'] ?>" onkeypress="if(event.keyCode == 13) cm.bota.focus();"/></td>
                                <td class="cel"><input type="text" name="bota" id="bota" style="width:80px;" value="<?php echo $row['bota'] ?>" onkeypress="if(event.keyCode == 13) cm.tall.focus();"/></td>
                                <td class="cel"><input type="text" name="tall" id="tall" style="width:80px;" value="<?php echo $row['talla'] ?>" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Observacion: 
                                </td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><div align="">Abdomen: 

                                    </div></td>
                                <td class="cel"> <div align="">Molde: 
                                    </div></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" rows="5" onkeypress="if(event.keyCode == 13) cm.ab.focus();"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"><input type="text" name="ab" id="ab" style="width:80px;" value="<?php echo $row['abdomen'] ?>"/></td>
                                <td class="cel"><select name="molde" id="molde"  style="width:80px;">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>SI</option>
                                        <option>NO</option></td>
                            </tr>
                        </table></form>
                    <?php if ($row['id_cliente'] == $ced) { ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a href="javascript: registrar_slack();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>
                <?php
            }
        }
        if ($prenda == 'Chaqueta') {
            $consulta = mysql_query("SELECT * FROM chaqueta WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 340px;
                    width: 40px;
                    left: 520px;

                }
                #opciones{
                    position:absolute;
                    top: 365px;
                    left: 410px;

                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" >
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Chaqueta" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required"/>
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1"  class="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" class="required" cols="45" rows="5"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                    </div>
                <h3>Medidas Chaqueta</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Chaqueta"/>
                        <table width="600">
                            <tr>
                                <td height="19" class="cel">Talle Del:    
                                </td>

                                <td class="cel">Talle Tras:     
                                </td>
                                <td class="cel">Largo:     
                                </td>
                                <td class="cel">Espalda Alta:    
                                </td>
                                <td class="cel">Espalda Baja:
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="talle1" id="talle1" style="width:80px;" value="<?php echo $row['talle_del'] ?>" onkeypress="if(event.keyCode == 13) cm.talle2.focus();"/></td>
                                <td class="cel"><input type="text" name="talle2" id="talle2" style="width:80px;" value="<?php echo $row['talle_tras'] ?>" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                                <td class="cel"><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_a.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_a" id="esp_a" style="width:80px;" value="<?php echo $row['espalda_alta'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_b" id="esp_b" style="width:80px;" value="<?php echo $row['espalda_baja'] ?>" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                            </tr>
                            <tr>

                                <td class="cel">Pecho:
                                </td>
                                <td class="cel">Cintura:
                                </td>
                                <td class="cel">Base:
                                </td>
                                <td class="cel">Hombro: 
                                </td>
                                <td class="cel">Altura:
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="pe" id="pe" style="width:80px;" value="<?php echo $row['pecho'] ?>" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                                <td class="cel"><input type="text" name="hom" id="hom" style="width:80px;" value="<?php echo $row['hombro'] ?>" onkeypress="if(event.keyCode == 13) cm.alt.focus();"/></td>
                                <td class="cel"><input type="text" name="alt" id="alt" style="width:80px;" value="<?php echo $row['altura'] ?>" onkeypress="if(event.keyCode == 13) cm.man_l.focus();"/></td>
                            </tr>
                            <tr>


                                <td class="cel">Manga Larga: 
                                </td>
                                <td class="cel">Puño ML: 
                                </td>
                                <td class="cel">Manga Corta:
                                </td>
                                <td class="cel">Puño MC:
                                </td>
                                <td class="cel">Manga 3/4:</td>

                            </tr>
                            <tr>

                                <td class="cel"><input type="text" name="man_l" id="man_l" style="width:80px;" value="<?php echo $row['manga_larga'] ?>" onkeypress="if(event.keyCode == 13) cm.puno_l.focus();"/></td>
                                <td class="cel"><input type="text" name="puno_l" id="puno_l" style="width:80px;" value="<?php echo $row['punoml'] ?>" onkeypress="if(event.keyCode == 13) cm.man_c.focus();"/></td>
                                <td class="cel"><input type="text" name="man_c" id="man_c" style="width:80px;" value="<?php echo $row['manga_corta'] ?>" onkeypress="if(event.keyCode == 13) cm.puno_c.focus();"/></td>
                                <td class="cel"><input type="text" name="puno_c" id="puno_c" style="width:80px;" value="<?php echo $row['punomc'] ?>" onkeypress="if(event.keyCode == 13) cm.man_tres.focus();"/></td>
                                <td class="cel"><input type="text" name="man_tres" id="man_tres" style="width:80px;"value="<?php echo $row['manga_tres'] ?>" onkeypress="if(event.keyCode == 13) cm.puno_tres.focus();"/></td>    

                            </tr>
                            <tr>
                                <td class="cel">Puño 3/4: </td>
                                <td class="cel">Separacion:
                                </td>
                                <td class="cel">Braso:
                                </td>
                                <td class="cel">Costado:
                                </td>
                                <td class="cel">Entrepecho:
                                </td>

                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="puno_tres" id="puno_tres" style="width:80px;"value="<?php echo $row['puno_tres'] ?>"/></td>
                                <td class="cel"><input type="text" name="sep" id="sep" style="width:80px;" value="<?php echo $row['separacion'] ?>" onkeypress="if(event.keyCode == 13) cm.bra.focus();"/></td>
                                <td class="cel"><input type="text" name="bra" id="bra" style="width:80px;" value="<?php echo $row['braso'] ?>" onkeypress="if(event.keyCode == 13) cm.cos.focus();"/></td>
                                <td class="cel"><input type="text" name="cos" id="cos" style="width:80px;" value="<?php echo $row['costado'] ?>" onkeypress="if(event.keyCode == 13) cm.entre.focus();"/></td>
                                <td class="cel"><input type="text" name="entre" id="entre" style="width:80px;" value="<?php echo $row['entrepecho'] ?>" onkeypress="if(event.keyCode == 13) cm.molde.focus();"/></td>

                            </tr>
                            <tr>
                                <td class="cel"> Observacion
                                </td>
                                <td class="cel">
                                </td>
                                <td class="cel">
                                </td>
                                <td class="cel">Molde:
                                </td>

                                <td class="cel"></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea  name="ob" id="ob" cols="45" rows="5" style="position:absolute; width:235px; height:50px;"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel"></td>
                                <td class="cel"></td>
                                <td class="cel"><select name="molde" id="molde"  style="width:80px;" >
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>SI</option>
                                        <option>NO</option></select></td>
                            </tr>
                        </table></form>
                    <?php
                    if ($row['id_cliente'] == $ced) {
                        ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a href="javascript: registrar_chaqueta();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>

                    </div>
                </div>

                <?php
            }
        }
        if ($prenda == 'Blusa') {
            $consulta = mysql_query("SELECT * FROM blusa WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 340px;
                    width: 40px;
                    left: 520px;

                }
                #opciones{
                    position:absolute;
                    top: 365px;
                    left: 410px;
font-size:15px;
                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" >
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Blusa" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required"/>
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1"  class="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" class="required" cols="45" rows="5"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                </div>
            <h3>Medidas Blusa</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Blusa"/>
                        <table width="550">
                            <tr>
                                <td height="19" class="cel">Talle del:    
                                </td>

                                <td class="cel">Talle tras:     
                                </td>
                                <td>Espalda alta:</td>
                                <td>Espalda baja:</td>
                                <td class="cel">Pecho: </td>

                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="ta1" id="ta1" style="width:80px;" value="<?php echo $row['talle_del'] ?>" onkeypress="if(event.keyCode == 13) cm.ta2.focus();"/></td>
                                <td class="cel"><input type="text" name="ta2" id="ta2" style="width:80px;" value="<?php echo $row['talle_tras'] ?>" onkeypress="if(event.keyCode == 13) cm.esp.focus();"/></td>
                                <td class="cel"><input type="text" name="esp" id="esp" style="width:80px;" value="<?php echo $row['espalda'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_b" id="esp_b" style="width:80px;" value="<?php echo $row['espalda_baja'] ?>" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                                <td class="cel"><input type="text" name="pe" id="pe" style="width:80px;" value="<?php echo $row['pecho'] ?>" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>

                            </tr>
                            <tr>
                                <td class="cel">Cintura:</td>
                                <td class="cel">Base:
                                </td>
                                <td class="cel">Hombro:
                                </td>
                                <td class="cel">Manga Corta:
                                </td>
                                <td class="cel">Puño MC: 
                                </td>

                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                                <td class="cel"><input type="text" name="hom" id="hom" style="width:80px;" value="<?php echo $row['hombro'] ?>" onkeypress="if(event.keyCode == 13) cm.manc.focus();"/></td>
                                <td class="cel"><input type="text" name="manc" id="manc" style="width:80px;" value="<?php echo $row['mangac'] ?>" onkeypress="if(event.keyCode == 13) cm.puc.focus();"/></td>
                                <td class="cel"><input type="text" name="puc" id="puc" style="width:80px;" value="<?php echo $row['punomc'] ?>" onkeypress="if(event.keyCode == 13) cm.mal.focus();"/></td>

                            </tr>
                            <tr>
                                <td class="cel">Manga Larga:
                                </td>

                                <td class="cel">Puño ML: 
                                </td>
                                <td class="cel">Manga 3/4: 
                                </td>
                                <td class="cel">Puño 3/4:
                                </td>
                                <td class="cel">Entrepecho:
                                </td>

                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="mal" id="mal" style="width:80px;" value="<?php echo $row['mangal'] ?>" onkeypress="if(event.keyCode == 13) cm.pul.focus();"/></td>
                                <td class="cel"><input type="text" name="pul" id="pul" style="width:80px;" value="<?php echo $row['punoml'] ?>" onkeypress="if(event.keyCode == 13) cm.man3.focus();"/></td>
                                <td class="cel"><input type="text" name="man3" id="man3" style="width:80px;" value="<?php echo $row['mangatres'] ?>" onkeypress="if(event.keyCode == 13) cm.pu3.focus();"/></td>
                                <td class="cel"><input type="text" name="pu3" id="pu3" style="width:80px;" value="<?php echo $row['punotres'] ?>" onkeypress="if(event.keyCode == 13) cm.ent.focus();"/></td>
                                <td class="cel"><input type="text" name="ent" id="ent" style="width:80px;" value="<?php echo $row['entrepecho'] ?>" onkeypress="if(event.keyCode == 13) cm.esc.focus();"/></td>

                            </tr>
                            <tr>
                                <td class="cel">Escote:
                                </td>
                                <td class="cel">Costado:
                                </td>
                                <td class="cel">Altura busto:
                                </td>
                                <td class="cel">Separación busto:
                                </td>
                                <td class="cel">Molde:
                                </td>

                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="esc" id="esc" style="width:80px;" value="<?php echo $row['escote'] ?>" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                                <td class="cel"><input type="text" name="co" id="co" style="width:80px;" value="<?php echo $row['costado'] ?>" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                                <td class="cel"><input type="text" name="alt_busto" id="alt_busto" style="width:80px;" value="<?php echo $row['altura_busto'] ?>" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                                <td class="cel"><input type="text" name="sep_busto" id="sep_busto" style="width:80px;" value="<?php echo $row['separacion_busto'] ?>" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                                <td class="cel"><select name="molde" id="molde"  style="width:80px;">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>SI</option>
                                        <option>NO</option></td>
                            </tr>

                            <tr>
                                <td class="cel">Observacion:
                                </td>
                                <td class="cel"></td>
                                <td class="cel"></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" onkeypress="if(event.keyCode == 13) cm.co.focus();" rows="5" style="position:absolute; width:235px; height:50px;"><?php echo $row['observacion'] ?></textarea></td> 
                                <td class="cel"></td>
                                <td class="cel"></td>

                            </tr>
                        </table></form>
                    <?php
                    if ($row['id_cliente'] == $ced) {
                        ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a href="javascript: registrar_blusa();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>

                <?php
            }
        }
        if ($prenda == 'Vestido') {
            $consulta = mysql_query("SELECT * FROM vestido WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 340px;
                    width: 40px;
                    left: 520px;

                }
                #opciones{
                    position:absolute;
                    top: 365px;
                    left: 410px;

                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" >
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Vestido" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required"/>
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1" class="required" />
                            </td>
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" class="required" cols="45" rows="5"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                </div>
                <h3>Medidas Vestido</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Vestido"/>
                        <table width="550" >
                            <tr>
                                <td height="19" class="cel">Talle Del:    
                                </td>
                                <td class="cel">Talle Tras:     
                                </td>
                                <td class="cel">Espalda Alta:    
                                </td>
                                <td class="cel">Espalda Baja:
                                </td>
                                <td class="cel">Largo:     
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="ta1" id="ta1" style="width:80px;" value="<?php echo $row['talle_del'] ?>" onkeypress="if(event.keyCode == 13) cm.ta2.focus();"/></td>
                                <td class="cel"><input type="text" name="ta2" id="ta2" style="width:80px;" value="<?php echo $row['talle_tras'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_a.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_a" id="esp_a" style="width:80px;" value="<?php echo $row['espalda_alta'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                                <td class="cel"><input type="text" name="esp_b" id="esp_b" style="width:80px;" value="<?php echo $row['espalda_baja'] ?>" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                                <td class="cel"><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.lafa.focus();"/></td>
                            </tr>
                            <tr>

                                <td class="cel">Largo Falda:
                                </td>
                                <td class="cel">Pecho:
                                </td>
                                <td class="cel">Cintura:
                                </td>
                                <td class="cel">Base: 
                                </td>
                                <td class="cel">Hombro:
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="lafa" id="lafa" style="width:80px;" value="<?php echo $row['largo_falda'] ?>" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                                <td class="cel"><input type="text" name="pe" id="pe" style="width:80px;" value="<?php echo $row['pecho'] ?>" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.ho.focus();"/></td>
                                <td class="cel"><input type="text" name="ho" id="ho" style="width:80px;" value="<?php echo $row['hombro'] ?>" onkeypress="if(event.keyCode == 13) cm.ma.focus();"/></td>
                            </tr>
                            <tr>


                                <td class="cel">Manga: 
                                </td>
                                <td class="cel">Puño: 
                                </td>
                                <td class="cel">Altura: 
                                </td>
                                <td class="cel">Separación:
                                </td>
                                <td class="cel">Costado:
                                </td>

                            </tr>
                            <tr>

                                <td class="cel"><input type="text" name="ma" id="ma" style="width:80px;" value="<?php echo $row['manga'] ?>" onkeypress="if(event.keyCode == 13) cm.puno.focus();"/></td>
                                <td class="cel"><input type="text" name="puno" id="puno" style="width:80px;" value="<?php echo $row['puno_manga'] ?>" onkeypress="if(event.keyCode == 13) cm.alt.focus();"/></td>
                                <td class="cel"><input type="text" name="alt" id="alt" style="width:80px;" value="<?php echo $row['altura'] ?>" onkeypress="if(event.keyCode == 13) cm.sep.focus();"/></td>
                                <td class="cel"><input type="text" name="sep" id="sep" style="width:80px;" value="<?php echo $row['separacion'] ?>" onkeypress="if(event.keyCode == 13) cm.cos.focus();"/></td>
                                <td class="cel"><input type="text" name="cos" id="cos" style="width:80px;" value="<?php echo $row['costado'] ?>" onkeypress="if(event.keyCode == 13) cm.esc1.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Escote Del:
                                </td>
                                <td class="cel">Escote Tras:
                                </td>
                                <td class="cel">Imperio:
                                </td>
                                <td class="cel">Contorno:
                                </td>
                                <td class="cel">Molde:
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="esc1" id="esc1" style="width:80px;" value="<?php echo $row['escote_del'] ?>" onkeypress="if(event.keyCode == 13) cm.esc2.focus();"/></td>
                                <td class="cel"><input type="text" name="esc2" id="esc2" style="width:80px;" value="<?php echo $row['escote_tra'] ?>" onkeypress="if(event.keyCode == 13) cm.im.focus();"/></td>
                                <td class="cel"><input type="text" name="im" id="im" style="width:80px;" value="<?php echo $row['imperio'] ?>" onkeypress="if(event.keyCode == 13) cm.con.focus();"/></td>
                                <td class="cel"><input type="text" name="con" id="con" style="width:80px;" value="<?php echo $row['contorno'] ?>" onkeypress="if(event.keyCode == 13) cm.molde.focus();"/></td>
                                <td class="cel"><select name="molde" id="molde"  style="width:80px;">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>SI</option>
                                        <option>NO</option></td>
                            </tr>
                            <tr>
                                <td class="cel"> Observacion
                                </td>
                                <td class="cel">
                                </td>
                                <td class="cel">
                                </td>
                                <td class="cel"></td>

                                <td class="cel"></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" rows="5" style="position:absolute; width:235px; height:50px;"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel"></td>
                                <td class="cel"></td>
                                <td class="cel"></td>
                            </tr>
                        </table></form>
                    <?php
                    if ($row['id_cliente'] == $ced) {
                        ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a href="javascript: registrar_vestido();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>

                <?php
            }
        }

        if ($prenda == 'Falda') {
            $consulta = mysql_query("SELECT * FROM falda WHERE id_cliente='$ced';");
            $row = mysql_fetch_array($consulta);
            ?>
            <style>
                #saved{
                    position:absolute;
                    height: 30px;
                    top: 178px;
                    width: 40px;
                    left: 490px;

                }
                #opciones{
                    position:absolute;
                    top: 250px;
                    left: 410px;
font-size:15px;
                }
            </style>
            <div id="accordion">
                <h3>Detalle Pedido</h3>
                <div>
                <form name="det" id="det" action="javascript: ordenar()">
                    <table id="detalle" >
                        <input type="hidden" name="sol" id="sol" value="detalle" />
                        <input type="hidden" name="prenda" id="prenda" value="Falda" />
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>" />
                        <input type="hidden" name="numorden" id="numorden"  />
                        <tr>
                            <td width="196" height="43" class="cel">Modelo:
                                <input type="text" name="modelo" id="modelo" class="required"/>
                            </td>
                            <td width="191" class="cel">Color:
                                <input type="text" name="color" id="color" class="required"/>
                            </td>
                            <td width="216" class="cel">Fecha Entrega:
                                <input type="text" name="f1" id="f1"  />
                            </td>
                        </tr>
                        <tr>
                            <td height="55" class="cel">Precio:
                                <input type="text" name="precio" id="precio" class="required"/></td>
                            <td class="cel">Descripcion:

                                <label for="descrip">
                                    <textarea name="descrip" id="descrip" cols="45" rows="5" class="required"></textarea>
                                </label></td>
                            <td class="cel"></td>

                        </tr>
                    </table>
                </form>
                </div>
                <h3>Medidas Falda</h3>
                <div id="medidas">
                    <form name="cm" id="cm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Falda"/>
                        <table width="500">
                            <tr>
                                <td height="19" class="cel">Cintura:    
                                </td>

                                <td class="cel">Base:     
                                </td>
                                <td class="cel">Largo:     
                                </td>
                                <td class="cel">Vuelo largo:    
                                </td>
                            </tr>
                            <tr>
                                <td class="cel"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                                <td class="cel"><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                                <td class="cel"><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>" onkeypress="if(event.keyCode == 13) cm.vl.focus();"/></td>
                                <td class="cel"><input type="text" name="vl" id="vl" style="width:80px;" value="<?php echo $row['vuelo_lar'] ?>" onkeypress="if(event.keyCode == 13) cm.vc.focus();"/></td>
                            </tr>
                            <tr>
                                <td class="cel">Vuelo corto:
                                </td>
                                <td class="cel">Abdomen:
                                </td>
                                <td class="cel">Molde:
                                </td>
                                <td class="cel">
                                </td>
                            </tr>

                            <tr>
                                <td class="cel"><input type="text" name="vc" id="vc" style="width:80px;" value="<?php echo $row['vuelo_cor'] ?>" onkeypress="if(event.keyCode == 13) cm.ab.focus();"/></td>
                                <td class="cel"><input type="text" name="ab" id="ab" style="width:80px;" value="<?php echo $row['abdomen'] ?>" onkeypress="if(event.keyCode == 13) cm.molde.focus();"/></td>
                                <td class="cel"><select name="molde" id="molde"  style="width:80px;">
                                        <option><?php echo $row['molde'] ?></option>
                                        <option>SI</option>
                                        <option>NO</option></td>
                                <td class="cel"></td>
                            </tr>
                            <tr>
                                <td class="cel">Observacion: 
                                </td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"></td>
                                <td class="cel"></td>
                            </tr>
                            <tr>
                                <td class="cel"><textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                                <td class="cel">&nbsp;</td>
                                <td class="cel"></td>
                                <td class="cel"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if ($row['id_cliente'] == $ced) {
                        ?>
                        <div id="opciones">
                            <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/>Actualizar</a>
                            <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/>Eliminar</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a href="javascript: registrar_falda();" title="Guardar Medidas"><img src="img/save.png" id="saved"/></a>
                    </div>
                </div>

                <?php
            }
        }
    } else {
        echo '<h2 align="center" style="color:#000; margin:100px;"><strong>NO EXISTE CLIENTE REGISTRADO CON ESE NUMERO DE CEDULA</strong></h2>
   <div align="center"><input type="button" name="cancel" id="cancel" value="Cerrar" onClick="javascript: cerrar()"/></div>';
    }
}
?>