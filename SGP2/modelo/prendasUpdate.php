<?php
include 'metodosGenerics.php';

if(isset($_POST["prenda"]))//se valida si la solicitud viene por GET
	$prenda=$_POST["prenda"];

if(isset($_GET["prenda"]))//se valida si la solicitud viene por POST
	$prenda=$_GET["prenda"];
	
	

if ($prenda=="Pantalon"){
   
   $cintura= $_POST['cin'];
   $base= $_POST['base'];
   $largo= $_POST['largo'];
   $tiro= $_POST['tiro'];
   $pie= $_POST['pie'];
   $rodilla=$_POST['rod'];
   $bota=$_POST['bota'];
   $talla=$_POST['tall'];
   $ob=$_POST['observacion'];
   $molde=$_POST['molde'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',cintura='".$cintura."',base='".$base."',largo='".$largo."',tiro='".$tiro."'
		,pierna='".$pie."',rodilla='".$rodilla."',bota='".$bota."'
		,talla='".$talla."',molde='".$molde."'
		,observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("pantalon",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Saco"){
   
   $talle= $_POST['talle'];
   $esp1= $_POST['esp_al'];
   $esp2= $_POST['esp_b'];
   $lar= $_POST['lar'];
   $pecho= $_POST['pecho'];
   $cintura=$_POST['cin'];
   $ba=$_POST['ba'];
   $hombro=$_POST['hom'];
   $manga=$_POST['man'];
   $molde=$_POST['molde'];
   $ob=$_POST['ob'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',talle='".$talle."',largo='".$lar."',espalda_alta='".$esp1."',espalda_baja='".$esp2."'
		,pecho='".$pecho."',cintura='".$cintura."',base='".$ba."'
		,hombro='".$hombro."',manga='".$manga."',molde='".$molde."'
		,observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("saco",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Bermuda"){
   
   $cintura= $_POST['cin'];
   $base= $_POST['ba'];
   $largo= $_POST['la'];
   $tiro= $_POST['ti'];
   $bota= $_POST['bo'];
   $ta=$_POST['ta'];
   
   $ob=$_POST['ob'];
   $molde=$_POST['molde'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',cintura='".$cintura."',base='".$base."',largo='".$largo."',tiro='".$tiro."'
		,bota='".$bota."',talla='".$ta."',molde='".$molde."'
		,observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("bermuda",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Chaleco"){
   
   $ta= $_POST['ta'];
   $la= $_POST['la'];
   $esp= $_POST['esp'];
   $pe= $_POST['pe'];
   $cin= $_POST['cin'];
   $ba=$_POST['ba'];
   $hom=$_POST['hom'];
   $sep=$_POST['sep'];
   $alt=$_POST['alt'];
   $molde=$_POST['molde'];
   $ob=$_POST['ob'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',talle='".$ta."',largo='".$la."',espalda='".$esp."',pecho='".$pe."'
		,cintura='".$cin."',base='".$ba."',hombro='".$hom."'
		,separacion='".$sep."',altura='".$alt."',molde='".$molde."'
		,observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("chaleco",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Camisa"){
   
   $cuello= $_POST['cue'];
   $esp1= $_POST['esp_a'];
   $esp2= $_POST['esp_b'];
   $man= $_POST['man'];
   $la=$_POST['la'];
   $ba=$_POST['ba'];
   $cin=$_POST['cin'];
   $ta=$_POST['talla'];
   $hom=$_POST['hom'];
   $molde=$_POST['molde'];
   $ob=$_POST['ob'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',cuello='".$cuello."',espalda_alta='".$esp1."',espalda_baja='".$esp2."',manga='".$man."'
		,largo='".$la."',base='".$ba."',cintura='".$cin."'
		,talla='".$ta."',hombro='".$hom."'
		,molde='".$molde."',observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("camisa",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Slack"){
   
   $cintura= $_POST['cin'];
   $base= $_POST['base'];
   $largo= $_POST['largo'];
   $tiro= $_POST['tiro'];
   $pie= $_POST['pie'];
   $rodilla=$_POST['rod'];
   $bota=$_POST['bota'];
   $talla=$_POST['tall'];
      $ab=$_POST['ab'];
   $ob=$_POST['ob'];
   $molde=$_POST['molde'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',cintura='".$cintura."',base='".$base."',largo='".$largo."',tiro='".$tiro."'
		,pierna='".$pie."',rodilla='".$rodilla."',bota='".$bota."'
		,talla='".$talla."',abdomen='".$ab."',molde='".$molde."'
		,observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("slack",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Chaqueta"){
   
   $ta1= $_POST['talle1'];
   $ta2= $_POST['talle2'];
   $largo= $_POST['la'];
   $esp1= $_POST['esp_a'];
   $esp2= $_POST['esp_b'];
   $pe=$_POST['pe'];
   $cin=$_POST['cin'];
   $ba=$_POST['ba'];
   $hom=$_POST['hom'];
   $alt=$_POST['alt'];
   $manl=$_POST['man_l'];
   $punol=$_POST['puno_l'];
   $manc=$_POST['man_c'];
   $punoc=$_POST['puno_c'];
   $sep=$_POST['sep'];
   $bra=$_POST['bra'];
   $cos=$_POST['cos'];
   $ent=$_POST['entre'];
   $ob=$_POST['ob'];
   $molde=$_POST['molde'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',talle_del='".$ta1."',talle_tras='".$ta2."',largo='".$largo."',espalda_alta='".$esp1."'
		,espalda_baja='".$esp2."',pecho='".$pe."',cintura='".$cin."'
		,base='".$ba."',hombro='".$hom."',altura='".$alt."',manga_larga='".$manl."'
		,punoml='".$punol."',manga_corta='".$manc."',punomc='".$punoc."'
		,separacion='".$sep."',braso='".$bra."',costado='".$cos."',entrepecho='".$ent."'
		,molde='".$molde."',observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("chaqueta",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Blusa"){
   
   $ta1= $_POST['ta1'];
   $ta2= $_POST['ta2'];
   $esp= $_POST['esp'];
   $pe= $_POST['pe'];
   $cin= $_POST['cin'];
   $ba=$_POST['ba'];
   $hom=$_POST['hom'];
   $manc= $_POST['manc'];
   $puc= $_POST['puc'];
   $mal= $_POST['mal'];
   $pul= $_POST['pul'];
   $man3= $_POST['man3'];
   $pu3=$_POST['pu3'];
   $ent=$_POST['ent'];
   $esc=$_POST['esc'];
    $co=$_POST['co'];
   $ob=$_POST['ob'];
   $molde=$_POST['molde'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',talle_del='".$ta1."',talle_tras='".$ta2."',espalda='".$esp."',pecho='".$pe."'
		,cintura='".$cin."',base='".$ba."',hombro='".$hom."',mangac='".$manc."',punomc='".$puc."',mangal='".$mal."'
		,punoml='".$pul."',mangatres='".$man3."',punotres='".$pu3."',entrepecho='".$ent."',escote='".$esc."'
		,costado='".$co."',molde='".$molde."',observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("Blusa",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Vestido"){
   
   $ta1= $_POST['ta1'];
   $ta2= $_POST['ta2'];
   $esp1= $_POST['esp_a'];
   $esp2= $_POST['esp_b'];
   $la= $_POST['la'];
   $lafa=$_POST['lafa'];
   $pe=$_POST['pe'];
   $cin=$_POST['cin'];
   $ba=$_POST['ba'];
   $ho= $_POST['ho'];
   $ma= $_POST['ma'];
   $al= $_POST['al'];
   $sep= $_POST['sep'];
   $cos= $_POST['cos'];
   $esc1=$_POST['esc1'];
   $esc2=$_POST['esc2'];
   $im=$_POST['im'];
   $con=$_POST['con'];
   $ob=$_POST['ob'];
   $molde=$_POST['molde'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',talle_del='".$ta1."',talle_tras='".$ta2."',espalda_alta='".$esp1."',espalda_baja='".$esp2."'
		,largo='".$la."',largo_falda='".$lafa."',pecho='".$pe."',cintura='".$cin."',base='".$ba."'
		,hombro='".$ho."',manga='".$ma."',altura='".$al."',separacion='".$sep."',costado='".$cos."',escote_del='".$esc1."'
		,escote_tra='".$esc2."',imperio='".$im."',contorno='".$con."',molde='".$molde."',observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("vestido",$campos,$condicion);

echo 'La prenda se actualizó.';

}
if ($prenda=="Falda"){
   
   $cintura= $_POST['cin'];
   $ba= $_POST['ba'];
   $la= $_POST['la'];
   $vl= $_POST['vl'];
   $vc=$_POST['vc'];
   $ab=$_POST['ab'];
   $ob=$_POST['ob'];
   $molde=$_POST['molde'];
   $cliente=$_POST['cedula'];

   $campos="id_cliente='".$cliente."',cintura='".$cintura."',base='".$ba."',largo='".$la."',vuelo_lar='".$vl."'
		,vuelo_cor='".$vc."',abdomen='".$ab."',molde='".$molde."'
		,observacion='".$ob."'";

$condicion="id_cliente='".$cliente."'";
create_update("falda",$campos,$condicion);

echo 'La prenda se actualizó.';

}





?>