<style type="text/css">
    .pie-pagina{
        display: none;
        
    }
    #tablacm{
                position:absolute;
              
                top: 45px;
              
                left: 40px;

            }
</style>
<?php
$bd = 'modaskuelle';
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db($bd, $conexion);


if (isset($_POST["cedula"]) && isset($_POST["prenda"])) {


    $prenda = $_POST['prenda'];
    $ced = $_POST['cedula'];
    $consult = mysql_query("SELECT * FROM tbcliente WHERE id_cliente='$ced';");
    $ro = mysql_fetch_array($consult);



    if ($prenda == 'Pantalon') {
        ?>
        <style type="text/css">
            #content_wrapper{
                width:992px;
                height:750px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 265px;
                border: 1px groove #06F;
              
            }
            #observacion{
                position:absolute;
                left: 2px;
                top: 135px;
                height: 60px;
                width: 240px;
            }
            #molde{
                position:static;
                left: 317px;
                top: 100px;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 0.9px;
                border:1px groove #06F;
                background-color:#06F;

            }
            .tab_container #div #pan strong {
                color: #FFF;
            }
            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 660px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;}

            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        



        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM pantalon WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>

            <div id="div">
                <form name="cm" id="cm">

                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Pantalon"/>
                        <input type="hidden" name="sol" id="sol" value=""/>
                        <tr>
                            <td width="166" height="19">Cintura:      </td>
                            <td width="169">Base:      </td>
                            <td width="166">Largo:        </td>
                            <td width="167">Tiro:      </td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>"/></td>
                            <td><input type="text" name="base" id="base" style="width:80px;" value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="largo" id="largo" style="width:80px;" value="<?php echo $row['largo'] ?>"/></td>
                            <td><input type="text" name="tiro" id="tiro" style="width:80px;" value="<?php echo $row['tiro'] ?>"/></td>
                        </tr>
                        <tr>
                            <td height="18">Pierna:</td>
                            <td>Rodilla:</td>
                            <td>Bota: </td>
                            <td>Talla: </td>
                        </tr>
                        <tr>
                            <td height="28"><div align="left">
                                    <input type="text" name="pie" id="pie" style="width:80px;" value="<?php echo $row['pierna'] ?>"/>
                                </div></td>
                            <td><input type="text" name="rod" id="rod" style="width:80px;" value="<?php echo $row['rodilla'] ?>"/></td>
                            <td><input type="text" name="bota" id="bota" style="width:80px;" value="<?php echo $row['bota'] ?>"/></td>
                            <td><input type="text" name="tall" id="tall" style="width:80px; text-transform: uppercase;" value="<?php echo $row['talla'] ?>"/></td>
                        </tr>
                        <tr>
                            <td height="27">Observaciones:
                                <textarea name="observacion" id="observacion" cols="45" rows="5"><?php echo $row['observacion']; ?></textarea></td>
                            <td>&nbsp;</td>
                            <td>Tiene molde:      </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label for="observacion"></label></td>
                            <td>&nbsp;</td>
                            <td><select name="molde" id="molde" style="width:50px">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                </form>
                <div id="pan"><strong>PANTALON-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
                <div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div>
            </div>

            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#cin").focus();
            </script>
            <div id="div" >
                <form id="cm" name="cm">

                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td width="166" height="19">Cintura:      </td>
                            <td width="169">Base:      </td>
                            <td width="166">Largo:   </td>
                            <td width="167">Tiro:      </td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="cin" id="cin" style="width:80px;"  onkeypress="if(event.keyCode == 13) cm.base.focus();"/></td>
                            <td><input type="text" name="base" id="base" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.largo.focus();"/></td>
                            <td><input type="text" name="largo" id="largo" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.tiro.focus();"/></td>
                            <td><input type="text" name="tiro" id="tiro" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pie.focus();"/></td>
                        </tr>
                        <tr>
                            <td height="18">Pierna:</td>
                            <td>Rodilla:</td>
                            <td>Bota: </td>
                            <td>Talla: </td>
                        </tr>
                        <tr>
                            <td height="28"><div align="left">
                                    <input type="text" name="pie" id="pie" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.rod.focus();"/>
                                </div></td>
                            <td><input type="text" name="rod" id="rod" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.bota.focus();"/></td>
                            <td><input type="text" name="bota" id="bota" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.tall.focus();"/></td>
                            <td><input type="text" name="tall" id="tall" style="width:80px; text-transform: uppercase;" onkeypress="if(event.keyCode == 13) cm.observacion.focus();"/></td>
                        </tr>
                        <tr>
                            <td height="27">Observaciones:
                                <textarea name="observacion" id="observacion" cols="45" rows="5"></textarea></td>
                            <td>&nbsp;</td>
                            <td>Tiene molde:</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;</td>
                            <td><select name="molde" id="molde" style="width:50px">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select>  </td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <input id="guardar2" name="guardar2" value="Guardar" type="button" onClick="javascript:registrar_pantalon()"/>
                    <input id="limpiar2" name="limpiar2" value="Limpiar" type="reset" />
                </form>
                <div id="pan"><strong>PANTALON</strong></div>

            </div>

        <?php
        }
    }
    if ($prenda == 'Saco') {
        ?>
        <style type="text/css">
            #ob{
                position:absolute;
                left: 2px;
                top: 185px;
                height: 60px;
                width: 248px;
            }
            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 320px;
                border: 1px groove #06F;
            }
            #content_wrapper{
                width:992px;
                height:833px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 730px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }
            #pan{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 366px;
                left: 0.9px;
                border:1px groove #06F;
                background-color:#06F;

            }
            .tab_container #div #pan strong {
                color: #FFF;
            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM saco WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form name="cm" id="cm">
                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Saco"/>
                        <input type="hidden" name="sol" id="sol" value=""/>
                        <tr>
                            <td width="161" height="18">Talle:     </td>

                            <td width="140">Espalda alta:</td>
                            <td width="150">Espalda baja:</td>
                            <td width="148">Largo:</td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="talle" id="talle" style="width:80px;" value="<?php echo $row['talle'] ?>"/></td>
                            <td><input type="text" name="esp_al" id="esp_al"  style="width:80px;" value="<?php echo $row['espalda_alta'] ?>"/></td>
                            <td><input type="text" name="esp_b" id="esp_b"  style="width:80px;" value="<?php echo $row['espalda_baja'] ?>"/></td>
                            <td><input type="text" name="lar" id="lar"  style="width:80px;" value="<?php echo $row['largo'] ?>"/></td>
                        </tr>
                        <tr>
                            <td height="22">Pecho:
                                <label for="baja"></label></td>
                            <td>Cintura:
                                <label for="pe"></label></td>
                            <td>Base:
                                <label for="cin"></label></td>
                            <td>Hombro:
                                <label for="ba"></label></td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="pecho" id="pecho"  style="width:80px; "value="<?php echo $row['pecho'] ?>"/></td>
                            <td><input type="text" name="cin" id="cin"  style="width:80px;"value="<?php echo $row['cintura'] ?>"/></td>
                            <td><input type="text" name="ba" id="ba"  style="width:80px;"value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="hom" id="hom"  style="width:80px;" value="<?php echo $row['hombro'] ?>"/></td>
                        </tr>
                        <tr>
                            <td height="18">Manga:</td>
                            <td>Tiene molde:</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="man" id="man"  style="width:80px;"value="<?php echo $row['manga'] ?>"/></td>
                            <td> <select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>

                                </select></td>
                            <td>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td height="18">Observaciones:</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td height="18">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td height="25"> <textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea>
                                <div align="left">:</div>
                                <label for="rod10"></label></td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </form>
                <div id="pan"><strong>SACO-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
                <div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div>
            </div>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#talle").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td width="161" height="18">Talle: </td>

                            <td width="140">Espalda alta:</td>
                            <td width="150">Espalda baja:</td>
                            <td width="148">Largo:</td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="talle" id="talle" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_al.focus();"/></td>
                            <td><input type="text" name="esp_al" id="esp_al"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                            <td><input type="text" name="esp_b" id="esp_b"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.lar.focus();"/></td>
                            <td><input type="text" name="lar" id="lar"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pecho.focus();"/></td>
                        </tr>
                        <tr>
                            <td height="22">Pecho:
                                <label for="baja"></label></td>
                            <td>Cintura:
                                <label for="pe"></label></td>
                            <td>Base:
                                <label for="cin"></label></td>
                            <td>Hombro:
                                <label for="ba"></label></td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="pecho" id="pecho"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                            <td><input type="text" name="cin" id="cin"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                            <td><input type="text" name="hom" id="hom"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.man.focus();"/></td>
                        </tr>
                        <tr>
                            <td height="18">Manga:</td>
                            <td>Tiene molde:</td>

                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="man" id="man"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                            <td><select name="molde" id="molde">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select></td>

                        </tr>
                        <tr>
                            <td height="18">Observaciones:</td>

                        </tr>

                        <tr>
                            <td height="25"> <textarea name="ob" id="ob" cols="45" rows="5"></textarea>

                            </td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td><input id="guardar3" name="guardar3" value="Guardar" type="button" onClick="javascript:registrar_saco()"/>
                                <input id="limpiar3" name="limpiar3" value="Limpiar" type="reset" />
                            </td>
                        </tr>
                    </table>
                </form>
                <div id="pan"><strong>SACO</strong></div>
            </div>
            <?php
        }
    }

    if ($prenda == 'Bermuda') {
        ?>
        <style type="text/css">
            #content_wrapper{
                width:992px;
                height:807px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 700px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;}
            #div{
                position:absolute;
                left: 49px;
                top: 375px;
                width: 725px;
                height: 290px;
                border: 1px groove #06F;
            }
            #ob{
                position:absolute;
                left: 2px;
                top: 135px;
                width: 276px;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 366px;
                left: 0.9px;
                border:1px groove #06F;
                background-color:#06F;

            }
            .tab_container #div #pan strong {
                color: #FFF;
            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM bermuda WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Bermuda"/>
                        <input type="hidden" name="sol" id="sol" value=""/>
                        <tr>

                            <td height="26">Cintura:      </td>
                            <td>Base:        </td>
                            <td>Largo:      </td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>" /></td>
                            <td><input type="text" name="la" id="la" style="width:80px;"value="<?php echo $row['largo'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Tiro:</td>
                            <td>Bota:</td>
                            <td>Talla:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="ti" id="ti" style="width:80px;" value="<?php echo $row['tiro'] ?>"/></td>
                            <td><input type="text" name="bo" id="bo" style="width:80px;" value="<?php echo $row['bota'] ?>"/></td>
                            <td><input type="text" name="ta" id="ta" style="width:80px;" value="<?php echo $row['talla'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Observaciones:
                                <textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td>&nbsp;</td>
                            <td>Tiene Molde:</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>



                                </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><label for="molde"></label></td>
                            <td></td>

                        </tr>
                    </table>
                </form>
                <div id="pan"><strong>BERMUDA-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
                <div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div>
            </div>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#cin").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <tr>

                            <td height="26">Cintura:      </td>
                            <td>Base:        </td>
                            <td>Largo:      </td>
                        </tr>
                        <tr>
                            <td height="24"><input type="text" name="cin" id="cin" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ti.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Tiro:</td>
                            <td>Bota:</td>
                            <td>Talla:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="ti" id="ti" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.bo.focus();"/></td>
                            <td><input type="text" name="bo" id="bo" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ta.focus();"/></td>
                            <td><input type="text" name="ta" id="ta" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Observaciones:

                                <textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td>&nbsp;</td>
                            <td>Tiene Molde:</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><select name="molde" id="molde">
                                    <option>NO</option>
                                    <option>SI</option>


                                </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><label for="molde"></label></td>
                            <td><input id="limpiar4" name="limpiar4" value="Limpiar" type="reset" />
                                <input id="guardar4" name="guardar4" value="Guardar" type="button" onClick="javascript:registrar_bermuda()"/></td>

                        </tr>
                    </table>
                </form>
                <div id="pan"><strong>BERMUDA</strong></div>
            </div>
            <?php
        }
    }
    if ($prenda == 'Chaleco') {
        ?>
        <style type="text/css">
            #content_wrapper{
                width:992px;
                height:825px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 750px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;}
            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 729px;
                height: 315px;
                border: 1px groove #06F;
            }
            #ob{
                position:absolute;
                width: 279px;
                height: 73px;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 387px;
                width: 366px;
                left: 48px;
                border:1px groove #06F;
                background-color:#06F;


            }

            .tab_container #pan strong {
                color: #FFF;
            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM chaleco WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>

            <div id="div">
                <form name="cm" id="cm">
                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Chaleco"/>
                        <input type="hidden" name="sol" id="sol" value=""/>
                        <tr>
                            <td>Talle:     </td>
                            <td>Largo:      </td>
                            <td>Espalda:        </td>
                            <td>Pecho:      </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="ta" id="ta" style="width:80px;"value="<?php echo $row['talle'] ?>"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;"value="<?php echo $row['largo'] ?>"/></td>
                            <td><input type="text" name="esp" id="esp" style="width:80px;"value="<?php echo $row['espalda'] ?>"/></td>
                            <td><input type="text" name="pe" id="pe" style="width:80px;"value="<?php echo $row['pecho'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Cintura: </td>
                            <td>Base: </td>
                            <td>Hombro: </td>
                            <td>Separación: </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cin" id="cin" style="width:80px;"value="<?php echo $row['cintura'] ?>"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;"value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;"value="<?php echo $row['hombro'] ?>"/></td>
                            <td><input type="text" name="sep" id="sep" style="width:80px;"value="<?php echo $row['separacion'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Altura:</td>
                            <td>Tiene molde:</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="alt" id="alt" style="width:80px;" value="<?php echo $row['altura'] ?>"/></td>
                            <td><select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>

                                </select></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </form><div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div></div>
            <div id="pan"><strong>CHALECO-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>

            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#ta").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td>Talle:</td>
                            <td>Largo:</td>
                            <td>Espalda:</td>
                            <td>Pecho:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="ta" id="ta" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp.focus();"/> </td>
                            <td><input type="text" name="esp" id="esp" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                            <td><input type="text" name="pe" id="pe" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Cintura: </td>
                            <td>Base: </td>
                            <td>Hombro: </td>
                            <td>Separación: </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.sep.focus();"/></td>
                            <td><input type="text" name="sep" id="sep" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.alt.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Altura:</td>
                            <td>Tiene molde:</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="alt" id="alt" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                            <td><select name="molde" id="molde">
                                    <option>NO</option>
                                    <option>SI</option>

                                </select></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td></td>
                            <td></td>
                            <td> <input id="guardar5" name="guardar5" value="Guardar" type="button" onClick="javascript:registrar_chaleco()"/><input id="limpiar5" name="limpiar5" value="Limpiar" type="reset" /></td>
                        </tr>
                    </table>
                </form></div>
            <div id="pan"><strong>CHALECO</strong></div>
            <?php
        }
    }
    if ($prenda == 'Camisa') {
        ?>
        <style type="text/css">
            #content_wrapper{
                width:992px;
                height:807px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 730px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;}
            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 270px;
                border: 1px groove #06F;
            }
            .tab_container #pan strong {
                color: #FFF;
            }
            #ob{
                position:absolute;
                width: 270px;
                height: 70px;
                top: 128px;
                left: 4px;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 387px;
                width: 366px;
                left: 49px;
                border:1px groove #06F;
                background-color:#06F;
            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM camisa WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form name="cm" id="cm">
                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Camisa"/>
                        <tr>
                            <td>Cuello:</td>
                            <td>Espalda alta:</td>
                            <td>Espalda baja:</td>
                            <td>Manga:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cue" id="cue" style="width:80px;"value="<?php echo $row['cuello'] ?>"/></td>
                            <td><input type="text" name="esp_a" id="esp_a" style="width:80px;"value="<?php echo $row['espalda_alta'] ?>"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;"value="<?php echo $row['espalda_baja'] ?>"/></td>
                            <td><input type="text" name="man" id="man" style="width:80px;"value="<?php echo $row['manga'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Largo:</td>
                            <td>Base:</td>
                            <td>Cintura:</td>
                            <td>Talla:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="la" id="la" style="width:80px;"value="<?php echo $row['largo'] ?>"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;"value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;"value="<?php echo $row['cintura'] ?>"/></td>
                            <td>
                                <input type="text" name="talla" id="talla" style="width:80px;"value="<?php echo $row['talla'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>Hombro:</td>
                            <td>Tiene Molde:</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;"value="<?php echo $row['hombro'] ?>"/></td>
                            <td><select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>

                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="ob"></label>
                                <textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>

                        </tr>
                    </table>
                </form><div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div></div>

            <div id="pan"><strong>CAMISA-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#cue").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm" >
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td>Cuello:</td>
                            <td>Espalda alta:</td>
                            <td>Espalda baja:</td>
                            <td>Manga:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cue" id="cue"  style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_a.focus();"/></td>
                            <td><input type="text" name="esp_a" id="esp_a" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.man.focus();"/></td>
                            <td><input type="text" name="man" id="man" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Largo:</td>
                            <td>Base:</td>
                            <td>Cintura:</td>
                            <td>Talla:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="la" id="la" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.talla.focus();"/></td>
                            <td><input type="text" name="talla" id="talla" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>Hombro:</td>
                            <td>Tiene Molde:</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                            <td><select name="molde" id="molde">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input id="guardar6" name="guardar6" value="Guardar" type="button" onClick="javascript: registrar_camisa();"/>
                                <input id="limpiar6" name="limpiar6" value="Limpiar" type="reset" /></td>

                        </tr>
                    </table>
                </form></div>

            <div id="pan"><strong>CAMISA</strong></div>
            <?php
        }
    }
    if ($prenda == 'Slack') {
        ?>
        <style type="text/css">
            #content_wrapper{
                width:992px;
                height:807px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 730px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;}
            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 280px;
                border: 1px groove #06F;
            }
            #ob{
                position:absolute;
                left: 4px;
                top: 129px;
                width: 253px;
                height: 66px;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 387px;
                width: 366px;
                left: 49px;
                border:1px groove #06F;
                background-color:#06F;
            }
            .tab_container #pan strong {
                color: #FFF;
            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }

        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM slack WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form  id="cm" name="cm" >
                    <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                    <input type="hidden" name="prenda" id="prenda" value="Slack"/>
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td>Cintura:</td>
                            <td>Base:</td>
                            <td>Largo:</td>
                            <td>Tiro:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cin" id="cin" style="width:80px;"value="<?php echo $row['cintura'] ?>" /></td>
                            <td><input type="text" name="base" id="base" style="width:80px;"value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="largo" id="largo" style="width:80px;"value="<?php echo $row['largo'] ?>"/></td>
                            <td><input type="text" name="tiro" id="tiro" style="width:80px;"value="<?php echo $row['tiro'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Pierna:</td>
                            <td>Rodilla:</td>
                            <td>Bota:</td>
                            <td>Talla: </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="pie" id="pie" style="width:80px;"value="<?php echo $row['pierna'] ?>"/></td>
                            <td><input type="text" name="rod" id="rod" style="width:80px;"value="<?php echo $row['rodilla'] ?>"/></td>
                            <td><input type="text" name="bota" id="bota" style="width:80px;"value="<?php echo $row['bota'] ?>"/></td>
                            <td><input type="text" name="tall" id="tall" style="width:80px;"value="<?php echo $row['talla'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>Abdomen:</td>
                            <td>Tiene molde:</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="ab" id="ab" style="width:80px;" value="<?php echo $row['abdomen'] ?>"/></td>
                            <td><select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </form><div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div></div>
            <div id="pan"><strong>SLACK-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#cin").focus();
            </script>
            <div id="div">
                <form  id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td>Cintura:</td>
                            <td>Base:</td>
                            <td>Largo:</td>
                            <td>Tiro:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.base.focus();"/></td>
                            <td><input type="text" name="base" id="base" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.largo.focus();"/></td>
                            <td><input type="text" name="largo" id="largo" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.tiro.focus();"/></td>
                            <td><input type="text" name="tiro" id="tiro" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.pie.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Pierna:</td>
                            <td>Rodilla:</td>
                            <td>Bota:</td>
                            <td>Talla: </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="pie" id="pie" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.rod.focus();"/></td>
                            <td><input type="text" name="rod" id="rod" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.bota.focus();"/></td>
                            <td><input type="text" name="bota" id="bota" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.tall.focus();"/></td>
                            <td><input type="text" name="tall" id="tall" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.ab.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>Abdomen:</td>
                            <td>Tiene molde:</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="ab" id="ab" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ob.focus();" /></td>
                            <td><select name="molde" id="molde">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <input id="guardar7" name="guardar7" value="Guardar" type="button" onClick="javascript:registrar_slack()"/>
                                <input id="limpiar7" name="limpiar7" value="Limpiar" type="reset" />
                            </td>
                        </tr>
                    </table>
                </form></div>
            <div id="pan"><strong>SLACK</strong></div>
            <?php
        }
    }
    if ($prenda == 'Chaqueta') {
        ?>
        <style type="text/css">


            #content_wrapper{
                width:992px;
                height:880px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 807px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }


            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 371px;
                border: 1px groove #06F;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 387px;
                width: 366px;
                left: 49px;
                border:1px groove #06F;
                background-color:#06F;


            }
            .tab_container #pan strong {
                color: #FFF;
            }
            #ob{
                position:absolute;
                width: 262px;
                height: 73px;
                left: 2px;
                top: 224px;
            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM chaqueta WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form name="cm" id="cm">
                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Chaqueta"/>
                        <tr>
                            <td width="123">Talle delantero:     </td>
                            <td width="121">Talle trasero:</td>
                            <td width="115">Largo:</td>
                            <td width="120">Espalda alta::</td>
                            <td width="116">Espalda baja: </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="talle1" id="talle1" style="width:80px;"value="<?php echo $row['talle_del'] ?>"/></td>
                            <td><input type="text" name="talle2" id="talle2" style="width:80px;"value="<?php echo $row['talle_tras'] ?>"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;"value="<?php echo $row['largo'] ?>" /></td>
                            <td><input type="text" name="esp_a" id="esp_a" style="width:80px;"value="<?php echo $row['espalda_alta'] ?>"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;"value="<?php echo $row['espalda_baja'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Pecho: </td>
                            <td>Cintura: </td>
                            <td>Base: </td>
                            <td>Hombro: </td>
                             <td>Manga larga:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="pe" id="pe" style="width:80px;"value="<?php echo $row['pecho'] ?>"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;"value="<?php echo $row['cintura'] ?>"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;"value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;"value="<?php echo $row['hombro'] ?>"/></td>
                           
                             <td><input type="text" name="man_l" id="man_l" style="width:80px;"value="<?php echo $row['manga_larga'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Puño m.l:</td>
                            <td>Manga corta:</td>
                            <td>Puño m.c:</td>
                            <td>Manga 3/4:</td>
                            <td>Puño 3/4: </td>

                        </tr>
                        <tr>
                            <td><input type="text" name="puno_l" id="puno_l" style="width:80px;"value="<?php echo $row['punoml'] ?>"/></td>
                            <td><input type="text" name="man_c" id="man_c" style="width:80px;"value="<?php echo $row['manga_corta'] ?>"/></td>
                            <td><input type="text" name="puno_c" id="puno_c" style="width:80px;"value="<?php echo $row['punomc'] ?>"/></td>
                            <td><input type="text" name="man_tres" id="man_tres" style="width:80px;"value="<?php echo $row['manga_tres'] ?>"/></td>
                             <td><input type="text" name="puno_tres" id="puno_tres" style="width:80px;"value="<?php echo $row['puno_tres'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Separación: </td>
                            <td>Altura: </td>
                            <td>Brazo: </td>
                            <td>Costado:</td>
                            <td>Entrepecho</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="sep" id="sep" style="width:80px;"value="<?php echo $row['separacion'] ?>"/></td>
                             <td><input type="text" name="alt" id="alt" style="width:80px;"value="<?php echo $row['altura'] ?>"/></td>
                            <td><input type="text" name="bra" id="bra" style="width:80px;"value="<?php echo $row['braso'] ?>"/></td>
                            <td><input type="text" name="cos" id="cos" style="width:80px;"value="<?php echo $row['costado'] ?>"/></td>
                            <td><input type="text" name="entre" id="entre" style="width:80px;"value="<?php echo $row['entrepecho'] ?>"/></td>


                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Tiene molde:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><select name="molde" id="molde" style="width:80px;">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </form><div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div></div>
            <div id="pan"><strong>CHAQUETA-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>


            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#talle1").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td width="123">Talle delantero:     </td>
                            <td width="121">Talle trasero:</td>
                            <td width="115">Largo:</td>
                            <td width="120">Espalda alta::</td>
                            <td width="116">Espalda baja: </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="talle1" id="talle1" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.talle2.focus();"/></td>
                            <td><input type="text" name="talle2" id="talle2" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_a.focus();"/></td>
                            <td><input type="text" name="esp_a" id="esp_a" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Pecho: </td>
                            <td>Cintura: </td>
                            <td>Base: </td>
                            <td>Hombro: </td>
                            <td>Manga larga:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="pe" id="pe" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.man_l.focus();"/></td>
                             <td><input type="text" name="man_l" id="man_l" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.puno_l.focus();" /></td>
                        </tr>
                        <tr>
                            <td>Puño m.l:</td>
                            <td>Manga corta:</td>
                            <td>Puño m.c:</td>
                            <td>Manga 3/4:</td>
                            <td>Puño 3/4: </td>

                        </tr>
                        <tr>
                            <td><input type="text" name="puno_l" id="puno_l" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.man_c.focus();"/></td>
                            <td><input type="text" name="man_c" id="man_c" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.puno_c.focus();"/></td>
                            <td><input type="text" name="puno_c" id="puno_c" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.man_tres.focus();"/></td>
                            <td><input type="text" name="man_tres" id="man_tres" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.puno_tres.focus();"/></td>
                            <td><input type="text" name="puno_tres" id="puno_tres" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.sep.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Separación: </td>
                            <td>Altura: </td>
                            <td>Brazo: </td>
                            <td>Costado:</td>
                            <td>Entrepecho</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="sep" id="sep" style="width:80px;"onkeypress="if(event.keyCode == 13) cm.alt.focus();"/></td>
                            <td><input type="text" name="alt" id="alt" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.bra.focus();"/></td>
                            <td><input type="text" name="bra" id="bra" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.cos.focus();"/></td>
                            <td><input type="text" name="cos" id="cos" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.entre.focus();"/></td>
                            <td><input type="text" name="entre" id="entre" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Tiene molde:</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><select name="molde" id="molde" style="width:80px">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td><input id="guardar8" name="guardar8" value="Guardar" type="button" onClick="javascript:registrar_chaqueta()"/>
                                <input id="limpiar8" name="limpiar8" value="Limpiar" type="reset" /></td>
                        </tr>
                    </table>
                </form></div>
            <div id="pan"><strong>CHAQUETA</strong></div>
            <?php
        }
    }
    if ($prenda == 'Blusa') {
        ?>
        <style type="text/css">

            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 372px;
                border: 1px groove #06F;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 387px;
                width: 366px;
                left: 49px;
                border:1px groove #06F;
                background-color:#06F;


            }
            .tab_container #pan strong {
                color: #FFF;
            }
            #ob{
                position:absolute;
                width: 253px;
                height: 45px;
                top: 264px;
            }

            #content_wrapper{
                width:992px;
                height:880px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }

            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 782px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM blusa WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form name="cm" id="cm">
                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Blusa"/>
                        <tr>
                            <td>Talle delantero:</td>
                            <td>Talle trasero:</td>
                            <td>Espalda alta:</td>
                            <td>Espalda baja:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="ta1" id="ta1" style="width:80px;" value="<?php echo $row['talle_del'] ?>" onkeypress="if(event.keyCode == 13) cm.ta2.focus();"/></td>
                            <td><input type="text" name="ta2" id="ta2" style="width:80px;" value="<?php echo $row['talle_tras'] ?>" onkeypress="if(event.keyCode == 13) cm.esp.focus();"/></td>
                            <td><input type="text" name="esp" id="esp" style="width:80px;" value="<?php echo $row['espalda'] ?>" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;" value="<?php echo $row['espalda_baja'] ?>" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Pecho:</td>
                            <td>Cintura:</td>
                            <td>Base:</td>
                            <td>Hombro:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="pe" id="pe" style="width:80px;"value="<?php echo $row['pecho'] ?>" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;"value="<?php echo $row['cintura'] ?>" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;"value="<?php echo $row['base'] ?>" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;"value="<?php echo $row['hombro'] ?>" onkeypress="if(event.keyCode == 13) cm.manc.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Manga corta:</td>
                            <td>Puño m.c: </td>
                            <td>Manga larga: </td>
                            <td>Puño m.l:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="manc" id="manc" style="width:80px;"value="<?php echo $row['mangac'] ?>" onkeypress="if(event.keyCode == 13) cm.puc.focus();"/></td>
                            <td><input type="text" name="puc" id="puc" style="width:80px;"value="<?php echo $row['punomc'] ?>" onkeypress="if(event.keyCode == 13) cm.mal.focus();"/></td>
                            <td><input type="text" name="mal" id="mal" style="width:80px;"value="<?php echo $row['mangal'] ?>" onkeypress="if(event.keyCode == 13) cm.pul.focus();"/></td>
                            <td><input type="text" name="pul" id="pul" style="width:80px;"value="<?php echo $row['punoml'] ?>" onkeypress="if(event.keyCode == 13) cm.man3.focus();"/></td>

                        </tr>
                        <tr>
                            <td>Manga 3/4:</td>
                            <td>Puño 3/4:</td>
                            <td>Entrepecho:</td>
                            <td>Escote:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="man3" id="man3" style="width:80px;"value="<?php echo $row['mangatres'] ?>" onkeypress="if(event.keyCode == 13) cm.pu3.focus();"/></td>
                            <td><input type="text" name="pu3" id="pu3" style="width:80px;"value="<?php echo $row['punotres'] ?>" onkeypress="if(event.keyCode == 13) cm.ent.focus();"/></td>
                            <td><input type="text" name="ent" id="ent" style="width:80px;"value="<?php echo $row['entrepecho'] ?>" onkeypress="if(event.keyCode == 13) cm.esc.focus();"/></td>
                            <td><input type="text" name="esc" id="esc" style="width:80px;"value="<?php echo $row['escote'] ?>" onkeypress="if(event.keyCode == 13) cm.co.focus();"/></td>

                        </tr>
                        <tr>
                            <td>Costado:</td>
                            <td>Altura busto:</td>
                            <td>Separación busto:</td>
                            <td>Tiene molde:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="co" id="co" style="width:80px;"value="<?php echo $row['costado'] ?>" onkeypress="if(event.keyCode == 13) cm.sep_busto.focus();"/></td>
                            <td><input type="text" name="alt_busto" id="alt_busto" style="width:80px;"value="<?php echo $row['altura_busto'] ?>" onkeypress="if(event.keyCode == 13) cm.sep_busto.focus();"/></td>
                            <td><input type="text" name="sep_busto" id="sep_busto" style="width:80px;"value="<?php echo $row['separacion_busto'] ?>" onkeypress="if(event.keyCode == 13) cm.co.focus();"/></td>  
                            <td><select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>

                                </select></td>
                        </tr>

                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td>&nbsp;</td>


                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>
                        </tr>
                    </table>

                </form>
                <div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div>
            </div>
            <div id="pan"><strong>BLUSA-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#ta1").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td>Talle delantero:</td>
                            <td>Talle trasero:</td>
                            <td>Espalda alta:</td>
                            <td>Espalda baja:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="ta1" id="ta1" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ta2.focus();"/></td>
                            <td><input type="text" name="ta2" id="ta2" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp.focus();"/></td>
                            <td><input type="text" name="esp" id="esp" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Pecho:</td>
                            <td>Cintura:</td>
                            <td>Base:</td>
                            <td>Hombro:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="pe" id="pe" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.hom.focus();"/></td>
                            <td><input type="text" name="hom" id="hom" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.manc.focus();"/></td>

                        </tr>
                        <tr>
                            <td>Manga corta:</td>
                            <td>Puño m.c: </td>
                            <td>Manga larga: </td>
                            <td>Puño m.l:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="manc" id="manc" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.puc.focus();"/></td>
                            <td><input type="text" name="puc" id="puc" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.mal.focus();"/></td>
                            <td><input type="text" name="mal" id="mal" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pul.focus();"/></td>
                            <td><input type="text" name="pul" id="pul" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.man3.focus();"/></td>

                        </tr>
                        <tr>
                            <td>Manga 3/4:</td>
                            <td>Puño 3/4:</td>
                            <td>Entrepecho:</td>
                            <td>Escote:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="man3" id="man3" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pu3.focus();"/></td>
                            <td><input type="text" name="pu3" id="pu3" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ent.focus();"/></td>
                            <td><input type="text" name="ent" id="ent" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esc.focus();"/></td>
                            <td><input type="text" name="esc" id="esc" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.co.focus();"/></td>

                        </tr>
                        <tr>
                            <td>Costado:</td>
                            <td>Altura busto:</td>
                            <td>Separación busto:</td>
                            <td>Tiene molde:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="co" id="co" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.alt_busto.focus();"/></td>
                            <td><input type="text" name="alt_busto" id="alt_busto" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.sep_busto.focus();"/></td>
                            <td><input type="text" name="sep_busto" id="sep_busto" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.co.focus();"/></td>  
                            <td><select name="molde" id="molde" style="width:80px;">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>

                            <td></td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td>&nbsp;</td>

                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input id="guardar9" name="guardar9" value="Guardar" type="button" onClick="javascript:registrar_blusa()"/>
                                <input id="limpiar9" name="limpiar9" value="Limpiar" type="reset" /></td>
                        </tr>
                    </table>

                </form>
            </div>
            <div id="pan"><strong>BLUSA</strong></div>
            <?php
        }
    }

    if ($prenda == 'Vestido') {
        ?>
        <style type="text/css">

            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 367px;
                border: 1px groove #06F;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 387px;
                width: 366px;
                left: 49px;
                border:1px groove #06F;
                background-color:#06F;


            }
            .tab_container #pan strong {
                color: #FFF;
            }
            #ob{
                position:absolute;
                width: 320px;
                height: 69px;
                top: 222px;
                left: 5px;
            }


            #content_wrapper{
                width:992px;
                height:872px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 36px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }
            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 780px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }
        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM vestido WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form name="cm" id="cm">
                    <table width="800" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Vestido"/>
                        <tr>
                            <td width="119">Talle del: </td>
                            <td width="116">Talle tras:</td>
                            <td width="122">Espalda alta:</td>
                            <td width="118">Espalda baja:</td>
                            <td width="120">Largo:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="ta1" id="ta1" style="width:80px;" value="<?php echo $row['talle_del'] ?>"/></td>
                            <td><input type="text" name="ta2" id="ta2" style="width:80px;" value="<?php echo $row['talle_tras'] ?>"/></td>
                            <td><input type="text" name="esp_a" id="esp_a" style="width:80px;" value="<?php echo $row['espalda_alta'] ?>"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;" value="<?php echo $row['espalda_baja'] ?>"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Largo  falda:</td>
                            <td>Pecho: </td>
                            <td>Cintura:</td>
                            <td>Base:</td>
                            <td>Hombro:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="lafa" id="lafa" style="width:80px;" value="<?php echo $row['largo_falda'] ?>"/></td>
                            <td><input type="text" name="pe" id="pe" style="width:80px;" value="<?php echo $row['pecho'] ?>"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="ho" id="ho" style="width:80px;" value="<?php echo $row['hombro'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Manga:</td>
                            <td>Puño:</td>
                            <td>Altura:</td>
                            <td>Separación:</td>
                            <td>Costado: </td>

                        </tr>
                        <tr>
                            <td><input type="text" name="ma" id="ma" style="width:80px;" value="<?php echo $row['manga'] ?>"/></td>
                            <td><input type="text" name="puno" id="puno" style="width:80px;" value="<?php echo $row['puno_manga'] ?>"/></td>
                            <td><input type="text" name="alt" id="alt" style="width:80px;" value="<?php echo $row['altura'] ?>"/></td>
                            <td><input type="text" name="sep" id="sep" style="width:80px;"value="<?php echo $row['separacion'] ?>"/></td>
                            <td><input type="text" name="cos" id="cos" style="width:80px;" value="<?php echo $row['costado'] ?>"/></td>

                        </tr>
                        <tr>
                            <td>Escote del:</td>
                            <td>Escote tras:</td>
                            <td>Imperio:</td>
                            <td>Contorno:</td>
                            <td>Tiene molde:</td>

                        </tr>
                        <tr>
                            <td><input type="text" name="esc1" id="esc1" style="width:80px;"value="<?php echo $row['escote_del'] ?>"/></td>
                            <td><input type="text" name="esc2" id="esc2" style="width:80px;" value="<?php echo $row['escote_tra'] ?>"/></td>
                            <td><input type="text" name="im" id="im" style="width:80px;" value="<?php echo $row['imperio'] ?>"/></td>
                            <td><input type="text" name="con" id="con" style="width:80px;" value="<?php echo $row['contorno'] ?>"/></td>
                            <td><select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                </form>
                <div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div></div>
            <div id="pan"><strong>VESTIDO-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#ta1").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="800" border="0" id="tablacm">

                        <tr>
                            <td width="119">Talle del: </td>
                            <td width="116">Talle tras:</td>
                            <td width="122">Espalda alta:</td>
                            <td width="118">Espalda baja:</td>
                            <td width="120">Largo:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="ta1" id="ta1" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ta2.focus();"/></td>
                            <td><input type="text" name="ta2" id="ta2" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_a.focus();"/></td>
                            <td><input type="text" name="esp_a" id="esp_a" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esp_b.focus();"/></td>
                            <td><input type="text" name="esp_b" id="esp_b" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.lafa.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Largo  falda:</td>
                            <td>Pecho: </td>
                            <td>Cintura:</td>
                            <td>Base:</td>
                            <td>Hombro:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="lafa" id="lafa" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.pe.focus();"/></td>
                            <td><input type="text" name="pe" id="pe" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.cin.focus();"/></td>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ho.focus();"/></td>
                            <td><input type="text" name="ho" id="ho" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ma.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Manga:</td>
                            <td>Puño:</td>
                            <td>Altura:</td>
                            <td>Separación:</td>
                            <td>Costado: </td>

                        </tr>
                        <tr>
                            <td><input type="text" name="ma" id="ma" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.puno.focus();"/></td>
                            <td><input type="text" name="puno" id="puno" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.alt.focus();"/></td>
                            <td><input type="text" name="alt" id="alt" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.sep.focus();"/></td>
                            <td><input type="text" name="sep" id="sep" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.cos.focus();"/></td>
                            <td><input type="text" name="cos" id="cos" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esc1.focus();"/></td>

                        </tr>
                        <tr>
                            <td>Escote del:</td>
                            <td>Escote tras:</td>
                            <td>Imperio:</td>
                            <td>Contorno:</td>
                            <td>Tiene molde:</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="esc1" id="esc1" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.esc2.focus();"/></td>
                            <td><input type="text" name="esc2" id="esc2" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.im.focus();"/></td>
                            <td><input type="text" name="im" id="im" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.con.focus();"/></td>
                            <td><input type="text" name="con" id="con" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ob.focus();" /></td>
                            <td><select name="molde" id="molde">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                            <td><input id="guardar0" name="guardar0" value="Guardar" type="button" onClick="javascript:registrar_vestido()"/>
                                <input id="limpiar0" name="limpiar0" value="Limpiar" type="reset" /></td>
                        </tr>
                    </table>

                </form></div>
            <div id="pan"><strong>VESTIDO</strong></div>
            <?php
        }
    }
    if ($prenda == 'Falda') {
        ?>
        <style type="text/css">
            #content_wrapper{
                width:992px;
                height:807px;
                background-color:#ccc;
                margin:0px;
                padding:6px;
                overflow:hidden;
                position:absolute;
                left: 0px;
                top: 37px;
                -moz-border-radius: 0px opx 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;

            }
            .tab_container {
                border: 1px solid #999;
                border-top: none;
                overflow: hidden;
                clear: both;
                float: left;
                width: 817px;
                background: #fff;
                position:absolute;
                left: 52px;
                top: 76px;
                height: 680px;
                font-size:12px;
                -moz-border-radius:0px 7px 7px 7px;
                -webkit-border-radius:0px 0px 7px 7px;}
            #div{
                position:absolute;
                left: 49px;
                top: 374px;
                width: 727px;
                height: 262px;
                border: 1px groove #06F;
            }
            #pan{
                position:absolute;
                height: 18px;
                top: 387px;
                width: 366px;
                left: 49px;
                border:1px groove #06F;
                background-color:#06F;


            }
            .tab_container #pan strong {
                color: #FFF;
            }
            #ob{
                position:absolute;
                width: 246px;
                height: 69px;
                top: 119px;
                left: 3px;
            }
            #tablac{
                position:absolute;
                height: 18px;
                top: 12px;
                width: 380px;
                left: 588px;

            }

        </style>
        <?php
        $consulta = mysql_query("SELECT * FROM falda WHERE id_cliente='$ced';");
        $row = mysql_fetch_array($consulta);
        if ($row['id_cliente'] == $ced) {
            ?>
            <div id="div">
                <form name="cm" id="cm">
                    <table width="683" border="0" id="tablacm">
                        <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>"/>
                        <input type="hidden" name="prenda" id="prenda" value="Falda"/>
                        <tr>
                            <td>Cintura: </td>
                            <td>Base:</td>
                            <td>Largo:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" value="<?php echo $row['cintura'] ?>"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" value="<?php echo $row['base'] ?>"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;" value="<?php echo $row['largo'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Vuelo largo:</td>
                            <td>Vuelo corto:</td>
                            <td>Abdomen:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="vl" id="vl" style="width:80px;" value="<?php echo $row['vuelo_lar'] ?>"/></td>
                            <td><input type="text" name="vc" id="vc" style="width:80px;" value="<?php echo $row['vuelo_cor'] ?>"/></td>
                            <td><input type="text" name="ab" id="ab" style="width:80px;" value="<?php echo $row['abdomen'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>Tiene molde:</td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"><?php echo $row['observacion'] ?></textarea></td>
                            <td></td>
                            <td><select name="molde" id="molde">
                                    <option><?php echo $row['molde'] ?></option>
                                    <option>SI</option>
                                    <option>NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td></td>
                        </tr>
                    </table>
                </form><div id="tablac">
                    <a href="javascript: modificarPrenda();" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
                    <a href="javascript: eliminarPrenda();" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
                </div></div>
            <div id="pan"><strong>FALDA-<?php echo strtoupper($ro['nombre_cliente']) . ' ' . strtoupper($ro['apellido']) ?></strong></div>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#cin").focus();
            </script>
            <div id="div">
                <form id="cm" name="cm">
                    <table width="683" border="0" id="tablacm">
                        <tr>
                            <td>Cintura: </td>
                            <td>Base:</td>
                            <td>Largo:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cin" id="cin" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ba.focus();"/></td>
                            <td><input type="text" name="ba" id="ba" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.la.focus();"/></td>
                            <td><input type="text" name="la" id="la" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.vl.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Vuelo largo:</td>
                            <td>Vuelo corto:</td>
                            <td>Abdomen:</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="vl" id="vl" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.vc.focus();"/></td>
                            <td><input type="text" name="vc" id="vc" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ab.focus();"/></td>
                            <td><input type="text" name="ab" id="ab" style="width:80px;" onkeypress="if(event.keyCode == 13) cm.ob.focus();"/></td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>&nbsp;</td>
                            <td>Tiene molde:</td>
                        </tr>
                        <tr>
                            <td><textarea name="ob" id="ob" cols="45" rows="5"></textarea></td>
                            <td></td>
                            <td><select name="molde" id="molde">
                                    <option>SI</option>
                                    <option>NO</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input id="guardar00" name="guardar00" value="Guardar" type="button" onClick="javascript:registrar_falda();"/>
                                <input id="limpiar00" name="limpiar00" value="Limpiar" type="reset" /></td>
                        </tr>
                    </table>
                </form></div>
            <div id="pan"><strong>FALDA</strong></div>

            <?php
        }
    }
}
?>
