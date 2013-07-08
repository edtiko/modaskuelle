$(function(){
             $('#cedula_operario').autocomplete({
                    minLength: 3,
                    source: "autocomplete_operario.php"
                });
                $('#nombre_operario').autocomplete({
                    minLength: 3,
                    source: "autocomplete_operario2.php"
                });
                      $("#frm_asignar").validate({
                    submitHandler: function(form) {
                        var respuesta = confirm('\xBFDesea realmente asignar esta orden?');
                        if (respuesta)
                            form.submit();
                    }
                });
                $("#fecha_terminado").datepicker({
                dateFormat: 'yy/mm/dd',
                showOn: 'both',
                buttonImage: 'ico/calendar.png',
                buttonImageOnly: true
            });
 	
 });  
function newOp(){
    $("#popup").load("newOperario.php", function(){
		$.blockUI({
			message: $('#popup'),
			css:{

               top: '100px',
               left:'100px',
            border: '10px solid #aaa',
             '-moz-border-radius':'7px',
	   '-webkit-border-radius':'7px',
            '-webkit-box-shadow': '10px 10px 5px #000',
                         opacity:'.90',
                       'padding': '20px 20px 20px 20px',
            backgroundColor: '#fff',
            width: '360px',
            height: '500px'

			}
		});
     
	});

    
}
function asignarOp(pedido,orden,prenda){

    $("#conte").load("asignar.php",{
        pedido:pedido, 
        orden:orden, 
        prenda:prenda
    }); 
    $("#conte").dialog({
       width : 410,
       height : 460,
       modal : true,
       title : "Asignar Pedido",
       buttons : { 
           Guardar : function(){
               $("#frm_asignar").submit();
           },
           Cancelar : function(){
           $(this).dialog('destroy');
           }        
       }
    }
        );

}
function cerrar(){
	$.unblockUI({
		onUnblock: function(){
			$("#popup").html("");
		}
	});
}

function pedidos(){
    var str = $("#frm_asignados").serialize();
	$.ajax({
			url: "../modelo/trabajosModel.php",
			data: str,
			type: "post",
			success: function(msg){
				$("#listar_ordenes").html(msg);
			}
		});
}

function editar(nropedido,nrorden){

       $("#popup").load("DetalleUpdate.php",{nropedido:nropedido,nrorden:nrorden}, function(){
		$.blockUI({
			message: $('#popup'),
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
            height: '500px'


			}
		});
	});
}
   function saveOperario(){
         	  
                  var str = $("#frm_operario").serialize();
	$.ajax({
		url: "../modelo/pedidosController.php",
		type: 'post',
		data: str,
		success: function(data){
			if(data!="")
					alert(data);
                                    cerrar()
		}
	});
        }
        
        function json_operario(){
                var busqueda= document.getElementById("busqueda").value;
                if (busqueda== ""){
                  $("#datos_operario").css("display", "none");  
                }
    $.ajax({type:"POST",
        url:"ajax.php",
        data:"busqueda="+busqueda,
        dataType: "json",
        success:function(data){
               if(data!="")
                    $("#datos_operario").css("display", "block");
             $("#nom").text(data.nombre);
           $("#cc").text(data.cedula);
            $("#ba").text(data.barrio);
             $("#dir").text(data.direccion);
              $("#tel").text(data.telefono);

           }
      });

        }
        
        function json_asignar(){
    var cc=document.getElementById("cedula_operario").value;
    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:"cedula_operario="+cc,
        dataType: "json",
        success:function(data){

            $("#nombre_operario").val(data.nombre);
          

        }
    });


}

function json_asignar2(){
    var cc=document.getElementById("nombre_operario").value;
    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:"nombre_operario="+cc,
        dataType: "json",
        success:function(data){

            $("#cedula_operario").val(data.cedula);
          

        }
    });


}
function asignarOperario(){
    var str = $("#frm_asignar").serialize();
    $.ajax({
        url: "../modelo/pedidosController.php",
        type: 'post',
        data: str,
        success: function(data){
            if(data!="")
                alert(data);
            viewDetalle();
        }
    });
}