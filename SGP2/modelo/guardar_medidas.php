<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);
   $prenda=$_POST['prenda'];

   if($prenda=='Pantalon'){

$cc=$_POST['cedula'];
$cin=$_POST['cin'];
$ba=$_POST['base'];
$larg=$_POST['largo'];
$ti=$_POST['tiro'];
$pie=$_POST['pie'];
$ro=$_POST['rod'];
$bo=$_POST['bota'];
$ta=$_POST['tall'];
$ob=$_POST['observacion'];
$mol=$_POST['molde'];

$consulta=mysql_query("SELECT * FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);


if($row['id_cliente']==$cc){

$query=("INSERT INTO pantalon(id_cliente,cintura,base,largo,tiro,pierna,rodilla,bota,talla,molde,observacion) VALUES
    ('$cc','$cin','$ba','$larg','$ti','$pie','$ro','$bo','$ta','$mol','$ob');");
if(mysql_query($query)){
?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 12px;
	width: 366px;
	left: 0.9px;
	border:1px groove #06F;
	background-color:#06F;

}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar2{
	visibility:hidden;
}
#limpiar2{

	visibility:hidden;
}
</style>
<?php

    echo "<strong>PANTALON REGISTRADO</strong>";

}}

else {
echo'<strong>EL USUARIO NO EXISTE (NO REGISTRADO)</strong>';

}}
 if($prenda=='Saco'){
$cc=$_POST['cedula'];
$ta=$_POST['tall'];
$esp_a=$_POST['esp_al'];
$esp_b=$_POST['esp_b'];
$lar=$_POST['lar'];
$pe=$_POST['pecho'];
$cin=$_POST['cin'];
$ba=$_POST['ba'];
$hom=$_POST['hom'];
$man=$_POST['man'];
$ob=$_POST['ob'];
$mol=$_POST['molde'];

$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);

if($row['id_cliente']==$cc){

$query=("INSERT INTO saco(id_cliente,talle,largo,espalda_alta,espalda_baja,pecho,cintura,base,hombro,manga,molde,observacion) VALUES
    ('$cc','$ta','$esp_a','$esp_b','$lar','$pe','$cin','$ba','$hom','$man','$mol','$ob');");
if(mysql_query($query)){
?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 12px;
	width: 366px;
	left: 0.9px;
	border:1px groove #06F;
	background-color:#06F;

}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar3{
	visibility:hidden;
}
#limpiar3{

	visibility:hidden;
}
</style>
<?php
 echo '<strong>SACO REGISTRADO</strong>';

}}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}}
         
  if($prenda=='Bermuda'){
$cc=$_POST['cedula'];
$cin=$_POST['cin'];
$ba=$_POST['ba'];
$la=$_POST['la'];
$ti=$_POST['ti'];
$bo=$_POST['bo'];
$ta=$_POST['ta'];
$ob=$_POST['ob'];
$mo=$_POST['molde'];

$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO bermuda(id_cliente,cintura,base,largo,tiro,bota,talla,molde,observacion) VALUES
    ('$cc','$cin','$ba','$la','$ti','$bo','$ta','$mo','$ob');");
if(mysql_query($query)){
?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 12px;
	width: 366px;
	left: 0.9px;
	border:1px groove #06F;
	background-color:#06F;

}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar4{
	visibility:hidden;
}
#limpiar4{

	visibility:hidden;
}
</style>
<?php

    echo '<strong>BERMUDA REGISTRADA</strong>';

}}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

	}
if($prenda=='Chaleco'){

$cc=$_POST['cedula'];
$ta=$_POST['ta'];
$la=$_POST['la'];
$esp=$_POST['esp'];
$pe=$_POST['pe'];
$cin=$_POST['cin'];
$ba=$_POST['ba'];
$alt=$_POST['alt'];
$hom=$_POST['hom'];
$sep=$_POST['sep'];
$mo=$_POST['molde'];
$ob=$_POST['ob'];


$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");

$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO chaleco(id_cliente,talle,largo,espalda,pecho,cintura,base,hombro,separacion,altura,molde,observacion) VALUES
    ('$cc','$ta','$la','$esp','$pe','$cin','$ba','$hom','$sep','$alt','$mo','$ob');");
if(mysql_query($query)){
?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 387px;
	width: 366px;
	left: 48px;
	border:1px groove #06F;
	background-color:#06F;
	

}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar5{
	visibility:hidden;
}
#limpiar5{

	visibility:hidden;
}
</style>
<?php

    echo'<strong>CHALECO REGISTRADO</strong>';

}}

else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

	}
 if($prenda=='Camisa'){

 $cc=$_POST['cedula'];
$ta=$_POST['talla'];
$esp_a=$_POST['esp_a'];
$esp_b=$_POST['esp_b'];
$lar=$_POST['la'];
$cu=$_POST['cue'];
$cin=$_POST['cin'];
$ba=$_POST['ba'];
$hom=$_POST['hom'];
$man=$_POST['man'];
$ob=$_POST['ob'];
$mol=$_POST['molde'];

$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO camisa(id_cliente,cuello,espalda_alta,espalda_baja,manga,largo,base,cintura,talla,hombro,molde,observacion) VALUES
    ('$cc','$cu','$esp_a','$esp_b','$man','$lar','$ba','$cin','$ta','$hom','$mol','$ob');");
if(mysql_query($query)){
?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 387px;
	width: 366px;
	left: 49px;
	border:1px groove #06F;
	background-color:#06F;
}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar6{
	visibility:hidden;
}
#limpiar6{

	visibility:hidden;
}
</style>
<?php

    echo '<strong>CAMISA REGISTRADA</strong>';

}}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

	}

if($prenda=='Slack'){

$cc=$_POST['cedula'];
$cin=$_POST['cin'];
$ba=$_POST['base'];
$la=$_POST['largo'];
$ti=$_POST['tiro'];
$pie=$_POST['pie'];
$ro=$_POST['rod'];
$bo=$_POST['bota'];
$ta=$_POST['tall'];
$ab=$_POST['ab'];
$ob=$_POST['ob'];
$mol=$_POST['molde'];

$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO slack(id_cliente,cintura,base,largo,tiro,pierna,rodilla,bota,talla,abdomen,molde,observacion) VALUES
    ('$cc','$cin','$ba','$la','$ti','$pie','$ro','$bo','$ta','$ab','$mol','$ob');");
if(mysql_query($query)){
?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 387px;
	width: 366px;
	left: 49px;
	border:1px groove #06F;
	background-color:#06F;
}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar7{
	visibility:hidden;
}
#limpiar7{

	visibility:hidden;
}
</style>
<?php

    echo '<strong>SLACK REGISTRADO</strong>';

}}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

	}


if($prenda=='Chaqueta'){
 
 $cc= $_POST['cedula'];
 $ta1=$_POST['talle1'];
 $ta2=$_POST['talle2'];
 $la= $_POST['la'];
$esp_a= $_POST['esp_a'];
$esp_b= $_POST['esp_b'];
$pe= $_POST['pe'];
$cin= $_POST['cin'];
$ba= $_POST['ba'];
$hom= $_POST['hom'];
$alt= $_POST['alt'];
$ml= $_POST['man_l'];
$pl= $_POST['puno_l'];
$mc= $_POST['man_c'];
$pc= $_POST['puno_c'];
$m3= $_POST['man_tres'];
$p3= $_POST['puno_tres'];
$sep= $_POST['sep'];
$bra= $_POST['bra'];
$cos= $_POST['cos'];
$ent= $_POST['entre'];
$mol= $_POST['molde'];
$ob= $_POST['ob'];

$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO chaqueta(id_cliente,talle_del,talle_tras,largo,espalda_alta,espalda_baja,pecho,cintura,base,hombro,altura,manga_larga,punoml,manga_corta,punomc,manga_tres,puno_tres,separacion,braso,costado,entrepecho,molde,observacion) VALUES
('$cc','$ta1','$ta2','$la','$esp_a','$esp_b','$pe','$cin','$ba','$hom','$alt','$ml','$pl','$mc','$pc','$m3','$p3','$sep','$bra','$cos','$ent','$mol','$ob');");

if(mysql_query($query)){
?>
<style type="text/css">
#pan{
position:absolute;
	height: 18px;
	top: 387px;
	width: 366px;
	left: 49px;
	border:1px groove #06F;
	background-color:#06F;
}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar8{
	visibility:hidden;
}
#limpiar8{

	visibility:hidden;
}
</style>
<?php

echo '<strong>CHAQUETA REGISTRADA</strong>';

}}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

}
         if($prenda=='Blusa'){
	
$cc= $_POST['cedula'];
$ta1= $_POST['ta1'];
$ta2= $_POST['ta2'];
$esp= $_POST['esp'];
$espb= $_POST['esp_b'];
$alt_b= $_POST['alt_busto'];
$sep_b= $_POST['sep_busto'];
$pe= $_POST['pe'];
$ci= $_POST['cin'];
$ba= $_POST['ba'];
$ho= $_POST['hom'];
$manc= $_POST['manc'];
$puc= $_POST['puc'];
$mal= $_POST['mal'];
$pul= $_POST['pul'];
$man3= $_POST['man3'];
$pu3= $_POST['pu3'];
$ent= $_POST['ent'];
$esc= $_POST['esc'];
$co= $_POST['co'];
$mo= $_POST['molde'];
$ob= $_POST['ob'];

$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO blusa(id_cliente,talle_del,talle_tras,espalda,espalda_baja,pecho,cintura,base,hombro,mangac,punomc,mangal,punoml,mangatres,punotres,entrepecho,escote,costado,altura_busto,separacion_busto,molde,observacion) VALUES
('$cc','$ta1','$ta2','$esp','$espb','$pe','$ci','$ba','$ho','$manc','$puc','$mal','$pul','$man3','$pu3','$ent','$esc','$co','$alt_b','$sep_b','$mo','$ob');");

if(mysql_query($query)){

?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 387px;
	width: 366px;
	left: 49px;
	border:1px groove #06F;
	background-color:#06F;


}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar9{
	visibility:hidden;
}
#limpiar9{

	visibility:hidden;
}
</style>
<?php

    echo '<strong>BLUSA REGISTRADA</strong>';

}
else{
echo '<strong>FALLO AL REGISTRAR</strong>';
}
}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

	}
 if($prenda=='Vestido'){
	
$cc= $_POST['cedula'];
$ta1= $_POST['ta1'];
$ta2= $_POST['ta2'];
$esp_a= $_POST['esp_a'];
$esp_b= $_POST['esp_b'];
$la= $_POST['la'];
$laf= $_POST['lafa'];
$pe= $_POST['pe'];
$cin= $_POST['cin'];
$ba= $_POST['ba'];
$ho= $_POST['ho'];
$ma= $_POST['ma'];
$pu= $_POST['puno'];
$al= $_POST['al'];
$sep= $_POST['sep'];
$cos= $_POST['cos'];
$esc1= $_POST['esc1'];
$esc2= $_POST['esc2'];
$im= $_POST['im'];
$con= $_POST['con'];
$mo= $_POST['molde'];
$ob= $_POST['ob'];

$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO vestido(id_cliente,talle_del,talle_tras,espalda_alta,espalda_baja,largo,largo_falda,pecho,cintura,base,hombro,manga,puno_manga,altura,separacion,costado,escote_del,escote_tra,imperio,contorno,molde,observacion) VALUES
('$cc','$ta1','$ta2','$esp_a','$esp_b','$la','$laf','$pe','$cin','$ba','$ho','$ma','$pu','$al','$sep','$cos','$esc1','$esc2','$im','$con','$mo','$ob');");

if(mysql_query($query)){

?>
<style type="text/css">
#pan{
position:absolute;
	height: 18px;
	top: 387px;
	width: 366px;
	left: 49px;
	border:1px groove #06F;
	background-color:#06F;


}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar0{
	visibility:hidden;
}
#limpiar0{

	visibility:hidden;
}

</style>
<?php

    echo '<strong>VESTIDO REGISTRADO</strong>';

}
else {
 echo '<strong>FALLO AL REGISTRAR</strong>';
}

}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

	}
         if($prenda=='Falda'){
	$cc=$_POST['cedula'];
	$cin=$_POST['cin'];
$ba=$_POST['ba'];
$la=$_POST['la'];
$vl=$_POST['vl'];
$vc=$_POST['vc'];
$ab=$_POST['ab'];
$ob=$_POST['ob'];
$mo=$_POST['molde'];


$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){

$query=("INSERT INTO falda(id_cliente,cintura,base,largo,vuelo_lar,vuelo_cor,abdomen,molde,observacion) VALUES
    ('$cc','$cin','$ba','$la','$vl','$vc','$ab','$mo','$ob');");
if(mysql_query($query)){
?>
<style type="text/css">
#pan{
	position:absolute;
	height: 18px;
	top: 387px;
	width: 366px;
	left: 49px;
	border:1px groove #06F;
	background-color:#06F;


}
.tab_container #tab1 #div #pan strong {
	color: #FFF;
}
#guardar00{
	visibility:hidden;
}
#limpiar00{

	visibility:hidden;
}
</style>
<?php

    echo '<strong>FALDA REGISTRADA</strong>';

}}
else {
echo'<strong>EL USUARIO NO EXISTE (PRENDA NO REGISTRADA)</strong>';

}

	}
    

?>
