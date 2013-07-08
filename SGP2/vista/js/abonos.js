// JavaScript Document
$(document).ready(function(){
    var orden=document.getElementById("gridview").value;
 $("#busqueda").val(orden);
Abonos()

});

function Abonos(){
        var str = $("#frm_ab").serialize();
	$.ajax({
			url: "../modelo/pedidosController.php",
			data: str,
			type: "post",
			success: function(msg){
				$("#conte").html(msg);
			}
		});
}
function quitarAbono(abono){
var respuesta = confirm("Desea quitar este abono?");
	if (respuesta){
		$.ajax({
			url: '../modelo/pedidosController.php',
			data: 'abono='+abono+'&sol=quitar_abono',
			type: 'post',
			success: function(data){
				if(data!="")
					alert(data);
                            Abonos()
                            }
                        });
                      }

}
function editAbono(abono){

$("#oculto").load("abonoUpdate.php", {abono: abono}, function(){
		$.blockUI({
			message: $('#oculto'),
			css:{
            border: '10px solid #aaa',
             '-moz-border-radius':'7px',
	                 '-webkit-border-radius':'7px',
            '-webkit-box-shadow': '10px 10px 5px #000',
                         opacity:'.90',
'padding': '5px 5px 5px 15px',


            backgroundColor: '#fff',

            width: '370px'

			}
		});
	});
}
function update_abono(){
var fa=document.getElementById("fecha_abono").value;
var fp=document.getElementById("forma_pago").value;
var a=document.getElementById("abono").value;
var respuesta = confirm("Desea actualizar el abono?");
	if (respuesta){
 if(fa=="" || fp=="" || a=="" ){
            alert ("Rellene todos los campos.");
            return ;
        }
if (numero(a)== true){
	var str = $("#frm_abono").serialize();
	$.ajax({
		url: "../modelo/pedidosController.php",
		type: 'post',
		data: str,
		success: function(data){
			if(data!="")
					alert(data);
                                    fn_cerrar()
                                    Abonos()
		}
	});
}
else
    $("#abono").focus();}
}
function numero(numero){

if (!/^([0-9])*$/.test(numero)){
alert("El campo abono no es un valor númerico");
  return false;}
  else
  return true;

}
function fn_cerrar(){
	$.unblockUI({
		onUnblock: function(){
			$("#oculto").html("");
		}
	});
}