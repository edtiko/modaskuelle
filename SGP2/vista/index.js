// JavaScript Document

$(document).ready(function(){
    
	buscar()
    
	$(".table tbody tr").mouseover(function(){
		$(this).addClass("over");
	}).mouseout(function(){
		$(this).removeClass("over");
	});

});
function cargarAbonos(){
 
$(".tab_container").load("AbonosView.php");
}
function precio(){
    var precio=document.getElementById("vlr").value;
    $.ajax({type:"POST",
        url:"content6.php",
        data:"vlr="+precio,
        dataType: "post"

});
}
function json1(){
    var cc=document.getElementById("cedula").value;
    $.ajax({type:"POST",
        url:"ajax.php",
        data:"cedula="+cc,
        dataType: "json",
        success:function(data){

             $("#cliente").val(data.cliente);
             $("#ciudad").val(data.ciudad);
             $("#telefono").val(data.telefono);
              $("#celular").val(data.celular);
             $("#direccion").val(data.direccion);

           }
      });


}
 $(function(){
    $('#nombre').autocomplete({
         minLength: 3,
       source:"autocomplete.php"
    });
 });
  $(function(){
    $('#cedula').autocomplete({
         minLength: 3,
       source:"encode.php"
    });
 });

function fn_cerrar(){
	$.unblockUI({ 
		onUnblock: function(){
			$("#div_oculto").html("");
                        $("#div_abonar").html("");
		}
	}); 
}
function cerrar(){
	$.unblockUI({
		onUnblock: function(){
			$("#conte").html("");
                        $("#prenda").val("Elige..");
                         
		}
	});
       
}


function fn_mostrar_frm_modificar(nroPedido){

$("#div_oculto").load("ClienteUpdate.php", {nroPedido: nroPedido}, function(){
		$.blockUI({
			message: $('#div_oculto'),
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


function viewPedido(nroPedido){
$(".tab_container").load("content4.php", {nroPedido: nroPedido}); 
}


function fn_paginar(var_div, url){
	var div = $("#" + var_div);
	$(div).load(url);
}

function fn_eliminar(nroPedido){
	var respuesta = confirm("Desea eliminar este Usuario?");
	if (respuesta){
		$.ajax({
			url: '../modelo/clientesController.php',
			data:'nroPedido='+nroPedido+'&sol=eliminar',
			type: 'post',
			success: function(data){
				if(data!="")
					alert(data);
				load()
			}
		});
	}
}
function load(){
$("#content").load("../content1.php");
}
function newpedido(){

$("#div_oculto").load("content6.php");
 $('#div_oculto').dialog({
     width: 630, 
     height: 680,
     modal:true,
     title: "Pedido Nuevo",
     beforeclose: function(event, ui) { 
         var respuesta = confirm('Esta seguro de cancelar el pedido?');
         
         if(respuesta){
             return cancelarPedido();
         }
         else
        return false;     
     }});
}
function cancelarPedido(){
 var nroPedido = document.getElementById('orden').value;
 
 $.ajax({
			url: '../modelo/pedidosController.php',
			data:'nroPedido='+nroPedido+'&sol=cancelar',
			type: 'post'
		});
}

function eliminarPedido(){
var nroPedido= document.getElementById("gridview").value;
if (nroPedido==""){
    alert("Seleccione un pedido");
}
else{
var respuesta = confirm("Desea eliminar este pedido?");
	if (respuesta){
		$.ajax({
			url: '../modelo/pedidosController.php',
			data:'nroPedido='+nroPedido+'&sol=eliminar',
			type: 'post',
			success: function(data){
				if(data!="")
					alert(data);
				buscar()
			}
		});
	}
}
}
function buscar(){

    $("#gridview").val("");
	var str = $("#frm_buscar").serialize();
	$.ajax({
		url: "../modelo/pedidosController.php",
		type: 'post',
		data: str,
		success: function(data){
			$("#div_listar").html(data);
		}
	});
}
function change(i,nropedido){


    $("."+i).css({'background-color':'#FFFF99'})
    
    $("#gridview").val(nropedido);

    $('#tbody, td').click(function() {
  $("#bodyon, td").css({'background-color':''})
  $("."+i).css({'background-color':'#FFFF99'})
});
}



   function op(){
     var total= $("#vlr").val();
     var abono= $("#ab").val();
     var saldo;

     saldo=total-abono;
       $("#sa").val(saldo);
   }
   function json(){
    var cc=document.getElementById("cedula").value;
    $.ajax({type:"POST",
        url:"ajax.php",
        data:"cedula="+cc,
        dataType: "json",
        success:function(data){
            
             $("#nombre").val(data.nombre);
             $("#apellido").val(data.apellido);
             $("#ciudad").val(data.ciudad);
             $("#telefono").val(data.telefono);
             $("#celular").val(data.celular);
             $("#direccion").val(data.direccion);
             $("#digitador").val(data.digitador);
             $("#sexo").val(data.sexo);
	     $("#fecha").val(data.fecha);
	     $("#ob_reg").val(data.observacion);
	     $("#empresa").val(data.empresa);
		 opciones()
                 prenda()
		 last()
	     $("#guardar").css("display", "none");
           }
      });


}

function verDetalle(){
var orden=document.getElementById("orden").value;
	$.ajax({
			url: "detalleModel.php",
			data:"orden="+orden,
			type: "post",
			success: function(msg){
				$("#detal").html(msg);
			}
		});
}
function viewDetalle(){
var orden=document.getElementById("orden").value;

	$.ajax({
			url: "viewDetalle.php",
			data:"orden="+orden,
			type: "post",
			success: function(msg){
				$("#detal").html(msg);
			}
		});
}
function guardar_pedido(){

	var respuesta = confirm("Desea guardar ya el pedido?");
	if (respuesta){

	var str = $("#ped").serialize();
	$.ajax({
		url: "../modelo/pedidosController.php",
		type: 'post',
		data: str,
		success: function(data){
			if(data!="")
					alert(data);
		$("#content").load("content5.php");
		}
	});

}
}

function abonar(nroPedido){

$("#div_abonar").load("abonar.php", {nroPedido: nroPedido}, function(){
		$.blockUI({
			message: $('#div_abonar'),
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

function reg_abono(){

var fa=document.getElementById("fecha_abono").value;
var fp=document.getElementById("forma_pago").value;
var a=document.getElementById("abono").value;


if (numero(a)== true){
	var str = $("#frm_abono").serialize();
	$.ajax({
		url: "../modelo/pedidosController.php",
		type: 'post',
		data: str,
		success: function(data){
			if(data!="")
					alert(data);
                                  $.unblockUI({ 
		onUnblock: function(){
			$("#div_abonar").html("");
		}
	}); 
                                    buscar()
		}
	});
}
else
    $("#abono").focus();
}

function numero(numero){

if (!/^([0-9])*$/.test(numero)){
alert("El campo Abono no es un valor númerico");
  return false;}
  else
  return true;
  
}
function generarExcel(){
   var str = $("#frm_buscar").serialize();
   $.ajax({
			url: "generateExcel.php",
			data: str,
			type: "post"
			
		});
    
}