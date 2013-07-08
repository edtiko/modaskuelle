$(document).ready(function(){
    $("#form1").validate();
    
$("input:text:visible:first").focus();
    $('#cedula').autocomplete({
        minLength: 3,
        source:"encode.php"
    });
        $('#nombre').autocomplete({
        minLength: 3,
        source:"autocomplete.php"
    });
    
        $('#ced').autocomplete({
        minLength: 3,
        max: 3,
        highlightItem: true,
        multiple: true,
        multipleSeparator: " ",
        source:"encode.php"
    });
});
function _nombre(){
   
    var nom= document.getElementById("nombre").value;

    if(nom==""){
        alert("Para su busqueda rellene campo");
        $("#nombre").focus();
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/grilla.php",
        data:"nombre="+nom,
        success:function(msg){
            $("#resultado").html(msg);
        }
    })
}
function _apellido(){

    var nom= document.getElementById("apellido").value;

    if(nom==""){
        alert("Para su busqueda rellene campo");
        $("#apellido").focus();
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/grilla.php",
        data:"apellido="+nom,
        success:function(msg){
            $("#resultado").html(msg);
        }
    })
}
function _telefono(){

    var nom= document.getElementById("nombre").value;

    if(nom==""){
        alert("Para su busqueda rellene campo");
        $("#telefono").focus();
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/grilla.php",
        data:"nombre="+nom,
        success:function(msg){
            $("#resultado").html(msg);
        }
    })
}
function _celular(){

    var nom= document.getElementById("celular").value;

    if(nom==""){
        alert("Para su busqueda rellene campo");
        $("#celular").focus();
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/grilla.php",
        data:"celular="+nom,
        success:function(msg){
            $("#resultado").html(msg);
        }
    })
}
function _sexo(){

    var nom= document.getElementById("sexo").value;

    if(nom==""){
        alert("Para su busqueda rellene campo");
        $("#sexo").focus();
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/grilla.php",
        data:"sexo="+nom,
        success:function(msg){
            $("#resultado").html(msg);
        }
    })
}
function _busqueda(){

    var nom= document.getElementById("bus").value;

    if(nom==""){
        alert("Para su busqueda rellene campo");
        $("#bus").focus();
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/grilla.php",
        data:"bus="+nom,
        success:function(msg){
            $("#resultado").html(msg);
        }
    })
}

function opciones(){
    var x;
    var cc=document.getElementById("cedula").value;

    $.ajax({
        type:"POST",
        url:"opciones.php",
        data:"parametro="+x+"&cedula="+cc,
        success:function(msg){
            $("#op").html(msg);
        }
    })
}
function prenda(){
    var x;
    $.ajax({
        type:"POST",
        url:"agregar_prenda.php",
        data:"parametro="+x,
        success:function(msg){
            $("#agreg").html(msg);
		   
		         
        }
    })
}
function last(){
    var x;
    var cc = document.getElementById("cedula").value;
    $.ajax({
        type:"POST",
        url:"agregar_prenda.php",
        data:"ultima="+x+"&cedula="+cc,
        success:function(msg){
            $("#last").html(msg);
		   
		         
        }
    })
}
function validarCed(numero){
    if (!/^([0-9])*$/.test(numero)){
        alert("El valor de *Cedula: " + numero + " no es un número");
        $("#cedula").focus();
        return false;
    }else{
        return true;
    }
}

function json2(){

    var cli= document.getElementById("nombre").value;
    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:"nombre="+cli,
        dataType: "json",
        success:function(data){
                
            $("#cedula").val(data.cedula);
            $("#ciudad").val(data.ciudad);
            $("#telefono").val(data.telefono);
            $("#celular").val(data.celular);
            $("#direccion").val(data.direccion);
            $("#digitador").val(data.digitador);
            $("#sexo").val(data.sexo);
            $("#fecha").val(data.fecha);
            $("#nombre").val(data.nombre);
            $("#apellido").val(data.apellido);
            $("#empresa").val(data.empresa);
            $("#ob_reg").val(data.observacion);
            opciones()
            prenda()
            last()
            $("#guardar").css("display", "none");
                
                
                

        }
    })
}

function _registrar()
{
    var ced=document.getElementById("cedula").value;
    var nom=document.getElementById("nombre").value;
    var ape=document.getElementById("apellido").value;
    var tel=document.getElementById("telefono").value;
    var ciu=document.getElementById("ciudad").value;
    var dig=document.getElementById("digitador").value;
    var cel=document.getElementById("celular").value;
		
	
		
    if(nom==""  || ape=="" || ced=="" || tel==""  || ciu=="" || dig == ""){
        alert ("ingrese todos los datos del cliente.");
        return false ;
    }
    else{
        if(validarCed($.trim(ced))){
            var str = $("#form1").serialize();
            $.ajax({
                url: '../modelo/clientesController.php',
                data: str,
                type: 'post',
                success: function(msg){
                    $("#dato").html(msg); //Agrega efecto de transición (fade) en el contenido activo
                    $(document).ready(function(){
                        setTimeout(function(){
                            $("#dato").fadeOut(400).fadeIn(7000).fadeOut(400);
                        });
                        $("#cli").val(nom+" "+ape);
                        $("#ced").val(ced);
      
                    });

                    return false;

                }
            })
        }
    }
}

function load(){
    $("#content").load("content1.php");
}
function _registrarMedidas(){

    var pren=document.getElementById("prenda").value;
    var ced=document.getElementById("cedula").value;


    if(ced==""){
        alert ("llene campo cedula");
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/mostrar_medidas.php",
        data:"prenda="+pren+"&cedula="+ced,
        success:function(msg){
            $("#contenedor").html(msg);
        }
    })
}
	 