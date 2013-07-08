<?php
include 'metodosGenerics.php';
include 'clientesBean.php';




 function insertCliente($cliente){
create_insert("`tbcliente`",$cliente->getFields(),$cliente->getValues());
}


 function updatePedido($cliente){

$campos="nombre_cliente='".$cliente->nombre_cliente."',apellido='".$cliente->apellido."',id_cliente='".$cliente->id_cliente."',sexo='".$cliente->sexo."'
		,telefono='".$cliente->telefono."',celular='".$cliente->celular."',ciudad='".$cliente->ciudad."'
		,direccion='".$cliente->direccion."',digitador='".$cliente->digitador."'
		,fecha_entrada='".$cliente->fecha_entrada."',update_last='".$cliente->update_last."',nombre_apellido='".$cliente->nombre_apellido."',empresa='".$cliente->empresa."',observacion='".$cliente->observacion."'";
		
$condicion="id_cliente='".$cliente->id_cliente."'";
create_update("tbcliente",$campos,$condicion);
}


 function deleteCliente($nroCliente){
create_delete("`tbcliente`","id_cliente='".$nroCliente."'");
create_delete("`pantalon`","id_cliente='".$nroCliente."'");
create_delete("`saco`","id_cliente='".$nroCliente."'");
create_delete("`bermuda`","id_cliente='".$nroCliente."'");
create_delete("`chaleco`","id_cliente='".$nroCliente."'");
create_delete("`camisa`","id_cliente='".$nroCliente."'");
create_delete("`slack`","id_cliente='".$nroCliente."'");
create_delete("`chaqueta`","id_cliente='".$nroCliente."'");
create_delete("`blusa`","id_cliente='".$nroCliente."'");
create_delete("`vestido`","id_cliente='".$nroCliente."'");
create_delete("`falda`","id_cliente='".$nroCliente."'");

}

?>