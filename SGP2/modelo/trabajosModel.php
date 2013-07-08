<?php
include 'PHPPaging.lib.php';
$bd = 'modaskuelle';
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db($bd, $conexion);
Planilla();
function Planilla(){


if ($_POST['busqueda'] != '') {
    $sql = " SELECT c.PRENDA, 
           e.nombre_apellido, 
           a.*, 
           b.NOMBRE,
           b.APELLIDO,
           count(c.PRENDA) as cantidad, 
           sum(a.PAGO) as total
       FROM pedidos_asignados a
       INNER JOIN operario b ON a.ID_OPERARIO = b.CEDULA 
        INNER JOIN detalle_pedido c ON a.NRO_ORDEN=c.NRO_ORDEN
        INNER JOIN tbpedido d JOIN tbcliente e ON a.NRO_PEDIDO=d.NRO_PEDIDO and d.CLIENTE= e.id_cliente 
       where CONCAT(b.NOMBRE, ' ', b.APELLIDO) like '%" . $_POST['busqueda'] . "%' or b.CEDULA like '%" . $_POST['busqueda'] . "%' group by c.PRENDA";

    if (($_POST['fechauno'] != '') && ($_POST['fechados'] != '')) {
        $fecha1 = $_POST['fechauno'];
        $fecha2 = $_POST['fechados'];
        $sql .= " having a.FECHA_ENTREGA BETWEEN '$fecha1' AND '$fecha2'";
    } 
    $pagin = new PHPPaging;
    $pagin->porPagina = 5;
    $pagin->agregarConsulta($sql);
    $pagin->div('detal');
    $pagin->modo('desarrollo');
    $pagin->verPost(true);
    $pagin->ejecutar();



    ?>
    <table class='table' width='975' border='0px' style="font-family: Calibri; font-size: 13px;  border-collapse: collapse;  color:'#000'; ">
        <thead><tr>

                <th align='center'><strong>NO. PEDIDO</strong></th>
                <th align='center'><strong>CLIENTE</strong></th>
                <th align='center'><strong>PRENDA</strong></th>
                <th align='center'><strong>CANTIDAD</strong></th>
                <th align='center'><strong>VALOR UNITARIO</strong></th>
                <th align='center'><strong>VALOR TOTAL</strong></th>


            </tr> </thead>

        <tbody id='bodyon'>

    <?php
    $total=0;
    $prendas=0;
    while ($row = $pagin->fetchResultado()) {
$total+=$row['total'];
$prendas+=$row['cantidad'];
        echo "<tr>";

        echo "<td class='h'>" . $row['NRO_PEDIDO'] . "</td>";
        echo "<td class='h'>" . $row['nombre_apellido'] . "</td>";
        echo "<td class='h'>" . $row['PRENDA'] . "</td>";
        echo "<td class='h'>" . $row['cantidad'] . "</td>";
        echo "<td class='h'>" . $row['PAGO'] . "</td>";
        echo "<td class='h'>" . $row['total'] . "</td>";


        echo "</tr>";
    }
    ?></tbody></table>
    <div id='bg' style='width:975px'>
        <table class='table' width='975px' border='0' >
            <thead>
                <tr>
                    <th colspan='14' class='null' style='color:#15428B;' align='center'> 
    <?php echo "<b>Navegaci&oacute;n</b>: " . $pagin->fetchNavegacion();
 ?>
                </th></tr></thead></table></div>
<table width="980" border="1" style="font-family: Calibri; font-size: 13px;  border-collapse: collapse;">
    <tr>
        
        <td class="cel" width="200"><strong>FECHA DE PAGO DEL:</strong> <?php echo " ".$_POST['fechauno'] ?></td>
        <td class="cel" width="200"><strong>AL:</strong> <?php echo " ".$_POST['fechados'] ?></td>
        <td class="cel"></td>
        <td class="cel" width="150"><strong>TOTALES PRENDAS: </strong><?php echo $prendas ?></td>
        <td class="cel" width="168"><strong>SUBTOTAL: </strong><?php echo "$".$total ?></td>
    </tr>
</table>
<?php 
} }
function Trabajos(){
    
    
if ($_POST['busqueda']!=''){
    if ($_POST['criterio']=="operario"){
        $sql .= "select a.pago, 
                        a.fecha_entrega,
                        b.*,
                        concat(c.NOMBRE,' ', c.APELLIDO) as nombre_operario,
                        d.nombre_apellido
                 from pedidos_asignados a,
                 detalle_pedido b,
                 operario c,
                 tbcliente d,
                 tbpedido e
                 where CONCAT(c.NOMBRE, ' ', c.APELLIDO) like '%".$_POST['busqueda']."%' 
                 or c.CEDULA like '%".$_POST['busqueda']."%'
                 and  a.NRO_PEDIDO= b.NRO_PEDIDO
                 and  a.ID_OPERARIO= c.CEDULA
                 and e.NRO_PEDIDO=a.NRO_PEDIDO
                 and d.id_cliente=e.cliente";
    }
    else{
	$sql .= " where a.NRO_PEDIDO  like '%".$_POST['busqueda']."%'";
            }
}
 $pagin = new PHPPaging;
    $pagin->porPagina = 5;
    $pagin->agregarConsulta($sql);
    $pagin->div('detal');
    $pagin->modo('desarrollo');
    $pagin->verPost(true);
    $pagin->ejecutar();
    
    ?>
    <table class='table' width='975' border='0px' style="font-family: Calibri; font-size: 13px;  border-collapse: collapse;  color:'#000'; ">
        <thead><tr>

                <th align='center'><strong>NO. PEDIDO</strong></th>
                <th align='center'><strong>CLIENTE</strong></th>
                <th align='center'><strong>PRENDA</strong></th>
                <th align='center'><strong>DESCRIPCION</strong></th>
                <th align='center'><strong>PRECIO</strong></th>
                <th align='center'><strong>FECHA TERMINADO</strong></th>


            </tr> </thead>

        <tbody id='bodyon'>

    <?php
    while ($row = $pagin->fetchResultado()) {
        echo "<tr>";

        echo "<td class='h'>" . $row['NRO_PEDIDO'] . "</td>";
        echo "<td class='h'>" . $row['nombre_apellido'] . "</td>";
        echo "<td class='h'>" . $row['PRENDA'] . "</td>";
        echo "<td class='h'>" . $row['DESCRIPCION'] . "</td>";
        echo "<td class='h'>" . $row['PRECIO'] . "</td>";
        echo "<td class='h'>" . $row['fecha_entrega'] . "</td>";


        echo "</tr>";
    }
    ?></tbody></table>
    <div id='bg' style='width:975px'>
        <table class='table' width='975px' border='0' >
            <thead>
                <tr>
                    <th colspan='14' class='null' style='color:#15428B;' align='center'> 
    <?php echo "<b>Navegaci&oacute;n</b>: " . $pagin->fetchNavegacion();
 ?>
                </th></tr></thead></table></div>

<?php 
   
}


?>