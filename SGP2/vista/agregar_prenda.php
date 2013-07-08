<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);
if (isset($_POST['parametro'])){

?>
Prendas:

      <select name="prenda" id="prenda" onchange="javascript:_registrarMedidas()" >
      <option>Elige..</option>
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

      </select>
<?php
}
if (isset($_POST['ultima'])){
$cc=$_POST["cedula"];
	$consulta=mysql_query("SELECT update_last FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
?>
Ultima Actualizacion:
<input type="text" name="fecha_ac" id="fecha_ac" value="<?php echo $row['update_last'] ?>"  />
<?php
}
?>