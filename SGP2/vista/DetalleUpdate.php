<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);
$sql=mysql_query("select * from detalle_pedido where NRO_PEDIDO=".$_POST['nropedido']." and NRO_ORDEN=".$_POST['nrorden']);
$row=mysql_fetch_assoc($sql);

?>
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="es" lang="es">
<body>
<h2>Modificar Detalle</h2>
<form id="edit" action="javascript: update()">
<table width="343" height="371">
<input type="hidden" name="sol" id="sol" value="modetalle" />
<input type="hidden" name="nropedido" id="nropedido" value="<?php echo $_POST['nropedido'] ?>" />
<input type="hidden" name="nrorden" id="nrorden" value="<?php echo $_POST['nrorden'] ?>" />
<tr>
<td width="96" height="38" class="cel">Producto:</td>
<td width="287" class="cel">
  
  <select name="producto" id="producto" style="width:150px">
  <option><?php echo $row['PRENDA'] ?></option>
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
</tr>
<tr>
<td  class="cel">Descripción:</td>
<td class="cel"><label for="descripcion"></label>
  <textarea name="descripcion" id="descripcion" class="required" style="width:200px; height:40px !important;" cols="45" rows="5"><?php echo $row['DESCRIPCION'] ?></textarea></td>
</tr>
<tr>
<td height="45" class="cel">Modelo:</td>
<td class="cel"><label for="modelo"></label>
  <input type="text" name="modelo" id="modelo" value="<?php echo $row['MODELO'] ?>"/></td>
</tr>
<tr>
<td height="49" class="cel">Color:</td>
<td class="cel"><label for="color"></label>
  <input type="text" name="color" id="color" value="<?php echo $row['COLOR'] ?>"/></td>
</tr>
<tr>
<td height="52" class="cel">Precio:</td>
<td class="cel"><label for="precio"></label>
  <input type="text" name="precio" id="precio" class="required" value="<?php echo $row['PRECIO'] ?>"/></td>
</tr>
<tr>
<td height="43" class="cel">Fecha Entrega:</td>
<td class="cel"><label for="f1"></label>
  <input type="text" name="f1" id="f1" class="required" value="<?php echo $row['FECHA'] ?>"/></td>
</tr>
<tr>
<td height="40" class="cel"></td>
<td class="cel"><div align="center">
  <input type="submit" name="save" id="save" value="Actualizar" />
  <input type="button" name="cancel" id="cancel" value="Cancelar" onclick="cerrar()" />
</div></td>
</tr>
</table>
</form>
</body>
</html>