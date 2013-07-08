<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);
include  'PHPPaging.lib.php';
$paging = new PHPPaging;
 ?>
<style type="text/css">
    #resultado{

	width: 913px;
	height: 456px;
      
	top: 28px;
	border: 2px solid #06F;
       
       
        
}
.table {
	border-collapse: collapse;
	font-family: "Trebuchet MS", "Lucida Sans Unicode", verdana, lucida, helvetica, sans-serif;
	font-size: 0.9;
	margin: 0;
	padding: 0;
        border-color: #9BB1F3;
      
}
caption {
	font-size: 1.4em;
	font-stretch: condensed;
	font-weight: bold;
	padding-bottom: 5px;
	text-align: left;
	text-transform: uppercase;
}
th, .in {
	
	padding: 0.4em;
	vertical-align: 4px;

}
th {
	text-align: center;
	color:#15428B;
      
}



#bg{
 background:url(img/bar.png)50% 50%  repeat-x;
 color: #15428B;

}

tbody th, .in {
	background-color:#FFF;
}
tbody tr:hover .in, tbody tr:hover th {
	background-color:#D0E3EF;
}
tbody tr:hover .in, tbody tr:focus th {
	background-color:#D0E3EF;
}
.tab_container{
	border: 1px solid #999;
	border-top: none;
	overflow: hidden;
	clear: both;
	float: left;
	width: 917px;
	background: #fff;
	position:absolute;
	left: 1px;
	top: 76px;
	height: 460px;
	font-size:12px;
	-moz-border-radius:0px 0px 7px 7px;
	-webkit-border-radius:0px 0px 7px 7px;

}
tr.odd td, tr.odd th {
	background-color: #ddd;
}
tbody a {
	color: #333;
}
tbody a:visited {
	color: #999999;
}
tbody a:hover {
	color: #33c;
}
tbody a:active {
	color: #33c;
}

tfoot th {
	text-align: right;
}
tfoot th:after {
	content: "";
}
#bus{
  width: 120px;

}
thead{
   background: url(img/bar.png)50% 50% repeat-x;
      color: #15428B;
      border: 1px solid #4297d7;

}

</style>
<?php
if(isset ($_POST['nombre']) OR (isset($_GET['nombre']))){
if ($_POST['nombre']!=''){

		$query .="SELECT * FROM tbcliente WHERE nombre_cliente LIKE'%$_POST[nombre]%'";
	}else
	if ($_GET['nombre']!=''){
		$query .="SELECT * FROM tbcliente WHERE nombre_cliente LIKE'%$_GET[nombre]%'";
	}
    

    if(isset($_POST["nombre"]))//validar si el criterio viene por POST
	$paging->porPagina=$_POST['nombre'];

	if(isset($_GET["nombre"]))//validar si el criterio viene por GET
	$paging->porPagina=$_GET['nombre'];

        $paging->porPagina=8;
       $paging->agregarConsulta($query);
	$paging->div('resultado');
	$paging->modo('desarrollo');
	$paging->verPost(true);
	$paging->ejecutar();
}
if(isset ($_POST['apellido']) OR (isset($_GET['apellido']))){
if ($_POST['apellido']!=''){

		$query .="SELECT * FROM tbcliente WHERE apellido LIKE'%$_POST[apellido]%'";
	}else
	if ($_GET['apellido']!=''){
		$query .="SELECT * FROM tbcliente WHERE apellido LIKE'%$_GET[apellido]%'";
	}


    if(isset($_POST["apellido"]))//validar si el criterio viene por POST
	$paging->porPagina=$_POST['apellido'];

	if(isset($_GET["apellido"]))//validar si el criterio viene por GET
	$paging->porPagina=$_GET['apellido'];

        $paging->porPagina=5;
       $paging->agregarConsulta($query);
	$paging->div('resultado');
	$paging->modo('desarrollo');
	$paging->verPost(true);
	$paging->ejecutar();
}
if(isset ($_POST['sexo']) OR (isset($_GET['sexo']))){
if ($_POST['sexo']!=''){

		$query .="SELECT * FROM tbcliente WHERE sexo LIKE'%$_POST[sexo]%'";
	}else
	if ($_GET['sexo']!=''){
		$query .="SELECT * FROM tbcliente WHERE sexo LIKE'%$_GET[sexo]%'";
	}


    if(isset($_POST["sexo"]))//validar si el criterio viene por POST
	$paging->porPagina=$_POST['sexo'];

	if(isset($_GET["sexo"]))//validar si el criterio viene por GET
	$paging->porPagina=$_GET['sexo'];

        $paging->porPagina=7;
       $paging->agregarConsulta($query);
	$paging->div('resultado');
	$paging->modo('desarrollo');
	$paging->verPost(true);
	$paging->ejecutar();
}
if(isset ($_POST['bus']) OR (isset($_GET['bus']))){
if ($_POST['bus']!=''){

		$query .="SELECT * FROM tbcliente WHERE nombre_cliente LIKE'%$_POST[bus]%' OR apellido LIKE'%$_POST[bus]%'
    OR telefono LIKE'%$_POST[bus]%' OR ciudad LIKE'%$_POST[bus]%' OR celular LIKE'%$_POST[bus]%' ";
	}else
	if ($_GET['bus']!=''){
		$query .="SELECT * FROM tbcliente WHERE nombre_cliente LIKE'%$_GET[bus]%'";
	}


    if(isset($_POST["bus"]))//validar si el criterio viene por POST
	$paging->porPagina=$_POST['bus'];

	if(isset($_GET["bus"]))//validar si el criterio viene por GET
	$paging->porPagina=$_GET['bus'];

        $paging->porPagina=7;
       $paging->agregarConsulta($query);
	$paging->div('resultado');
	$paging->modo('desarrollo');
	$paging->verPost(true);
	$paging->ejecutar();
}
?>

     <table class='table' width='912' border='1'>
            
<thead><tr>
 
        <th align='center' width='100px'>Cedula</th>
        <th align='center' width='100px'>Nombre</th>
        <th align='center' width='100px'>Apellido</th>
      
        <th align='center' width='100px'>Telefono</th>
        <th align='center' width='100px'>Celular</th>
      <th align='center' width='100px'>Ciudad</th>
     
    
      <th align='center' width='100px'>Ingreso</th>
       <th><img src='img/IconoLupa.gif' /></th>
       <th><img src='img/page_edit.png' /></th>
       <th><img src='img/delete.png' /></th>
     </tr></thead><tbody>
	 <?php

while($row = $paging->fetchResultado()){
    echo "<td class='in'>".$row['id_cliente']."</td>";
    echo "<td class='in'>".ucwords (strtolower($row['nombre_cliente']))."</td>";
    echo "<td class='in'>".ucwords (strtolower($row['apellido']))."</td>";
    echo "<td class='in'>".ucfirst(strtolower($row['telefono']))."</td>";
    echo "<td class='in'>".ucfirst(strtolower($row['celular']))."</td>";
    echo "<td class='in'>".ucwords (strtolower($row['ciudad']))."</td>";
    echo "<td class='in'>".ucfirst(strtolower($row['fecha_entrada']))."</td>";


         	echo('<td class="in" align="center"><a href="javascript: fn_ver(\''.$row[id_cliente].'\');">
			<img src="img/IconoLupa.gif" /></a></td>
			<td class="in" align="center"><a href="javascript: fn_mostrar_frm_modificar(\''.$row[id_cliente].'\');">
			<img src="img/page_edit.png" alt="preview"/></a></td>
			<td class="in" align="center"><a href="javascript: fn_eliminar(\''.$row[id_cliente].'\');">
			<img src="img/delete.png" /></a></td>
			</tr>');
   
 
}
  echo "</tbody></table>
      <div id='bg'>
  <table class='table' width='912px' border='0px'>
   <tfoot>
        <tr>
        <td><b>Buscar</b>:
<input type='text' name='bus' id='bus'  onkeypress='if(event.keyCode == 13) _busqueda();' />
</td>
            <td align='center'>";
                echo  "<b>Navegaci&oacute;n</b>:".$paging->fetchNavegacion();
         echo"  </td>
               
        </tr>
   </tfoot>
</table></div>";


   ?>



