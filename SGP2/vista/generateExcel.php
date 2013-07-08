<?php
if(isset($_GET['criterio1'])){
    echo $_GET['criterio1']; exit;
}
include '../modelo/metodosGenerics.php';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=PEDIDOS.xls");
 
conexDB();
$qry =mysql_query("SELECT p.*,c.* FROM tbpedido p,tbcliente c WHERE  c.id_cliente=p.CLIENTE;");


  
echo "&nbsp;<center><table border=\"1\" align=\"center\">";  
echo "<tr bgcolor=\"#336666\">  
  <td><font color=\"#ffffff\"><strong>ORDEN</strong></font></td>
  <td><font color=\"#ffffff\"><strong>CANTIDAD</strong></font></td>
  <td><font color=\"#ffffff\"><strong>CLIENTE</strong></font></td>
  <td><font color=\"#ffffff\"><strong>FECHA RECIBIDO</strong></font></td>
  <td><font color=\"#ffffff\"><strong>HORA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>ESTADO</strong></font></td>
  <td><font color=\"#ffffff\"><strong>TOTAL</strong></font></td>
  <td><font color=\"#ffffff\"><strong>ABONADO</strong></font></td>
  <td><font color=\"#ffffff\"><strong>SALDO</strong></font></td>
  
</tr>";  
while($row=mysql_fetch_array($qry))  
{    
    $sql2=mysql_query("SELECT count(*), sum(PRECIO) FROM detalle_pedido WHERE NRO_PEDIDO=".$row['NRO_PEDIDO']."");
          $sql3=mysql_query("select sum(abono) from abonos where NRO_PEDIDO=".$row['NRO_PEDIDO']."");

$row2=mysql_fetch_row($sql2);
$abonado=mysql_fetch_row($sql3);
        
		$saldo= $row2[1]-$abonado[0];
    echo "<tr><td>".$row['NRO_PEDIDO']."</td>";
   
    echo "<td >".$row2[0]."</td>";
    echo "<td >".ucfirst(strtolower($row['nombre_apellido']))."</td>";
    echo "<td >".ucfirst(strtolower($row['FECHA_RECIBIDO']))."</td>";
    echo "<td >".ucwords (strtolower($row['HORA']))."</td>";
    echo "<td >".ucfirst(strtolower($row['ESTADO']))."</td>";
     echo "<td >".$row2[1]."</td>";
      echo "<td >".$abonado[0]."</td>";
      echo "<td >".$saldo."</td></tr>";
}    
echo "</table>";  

?>