
$(document).ready(function(){

    buscar();
    var x=document.getElementById("x").value;
    if(x=="valor"){
        viewDetalle();
    }
   	  $("#f1").datepicker({
	  dateFormat:'yy/mm/dd',
      showOn: 'both',
      buttonImage: 'ico/calendar.png',
      buttonImageOnly: true,
      changeYear: true,
	  changeMonth: true
   });
$("#edit").validate({
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea actualizar esta orden?');
				if (respuesta)
					form.submit();
			}
		});

});

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
function quitar(nropedido,nrorden){
    var x=document.getElementById("x").value;
    var respuesta = confirm("Desea quitar esta orden?");
    if (respuesta){
        $.ajax({
            url: '../modelo/pedidosController.php',
            data: 'nropedido='+nropedido+'&nrorden='+nrorden+'&sol=quitar',
            type: 'post',
            success: function(data){
                if(data!="")
                    alert(data);
                if (x=="null"){
                    verDetalle()
                }
                else{
                    viewDetalle()
                }
            }
        });
    }
}
function editar(nropedido,nrorden){

    $("#conte").load("DetalleUpdate.php",{
        nropedido:nropedido,
        nrorden:nrorden
    }, function(){
        $.blockUI({
            message: $('#conte'),
            css:{

                top: '50px',
                left:'300px',
                border: '10px solid #aaa',
                '-moz-border-radius':'7px',
                '-webkit-border-radius':'7px',
                '-webkit-box-shadow': '10px 10px 5px #000',
                opacity:'.90',
                'padding': '20px 20px 20px 20px',

                backgroundColor: '#fff',

                width: '320px',
                height: '500px',
                zIndex: '2000'


            }
        });
    });
}
function viewPedido(nroPedido){
    $(".tab_container").load("content4.php", {
        nroPedido: nroPedido
    });
}
function actualizarPedido(){
    
    var str = $("#ped").serialize();
    $.ajax({
        url: "../modelo/pedidosController.php",
        type: 'post',
        data: str,
        success: function(data){
            if(data!="")
                alert(data);
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
                viewDetalle()
            }
        });
    }

}
function editAbono(abono){

    $("#conte").load("abonoUpdate.php", {
        abono: abono
    }, function(){
        $.blockUI({
            message: $('#conte'),
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
                    viewDetalle()
                }
            });
        }
        else
            $("#abono").focus();
    }
}
function numero(numero){

    if (!/^([0-9])*$/.test(numero)){
        alert("El campo abono no es un valor númerico");
        return false;
    }
    else
        return true;

}
function fn_cerrar(){
    $.unblockUI({
        onUnblock: function(){
            $("#conte").html("");
        }
    });
}

//Función que registra el editar de una orden
 function update(){
var x=document.getElementById("x").value;
       
	  var str = $("#edit").serialize();
	$.ajax({
		url: "../modelo/pedidosController.php",
		type: 'post',
		data: str,
		success: function(data){
			if(data!="")
					alert(data);
		}
	});
	cerrar()
					 if (x=="null"){
	verDetalle()
         
         }
    else{
      viewDetalle()

    }
   

        
   }
        
