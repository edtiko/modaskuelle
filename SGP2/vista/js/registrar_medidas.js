function registrar_pantalon(){

    var cc=document.getElementById("cedula").value;
    var cin=document.getElementById("cin").value;
    var ba=document.getElementById("base").value;
    var lar=document.getElementById("largo").value;
    var ti=document.getElementById("tiro").value;
    var pie=document.getElementById("pie").value;
    var rod=document.getElementById("rod").value;
    var bota=document.getElementById("bota").value;
    var tall=document.getElementById("tall").value;
     
    var ob=document.getElementById("observacion").value;
    var mol=document.getElementById("molde").value;
    var pren=document.getElementById("prenda").value;


    if(cc=="" || cin=="" || ba=="" || lar=="" || ti=="" || pie=="" || rod=="" || bota=="" ){
        alert ("Ingrese Todas Las Medidas."); 
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&cin="+cin+"&base="+ba+
        "&largo="+lar+"&tiro="+ti+"&pie="+pie+"&rod="+rod+"&bota="+bota+"&tall="+tall+
        "&observacion="+ob+"&molde="+mol+"&prenda="+pren,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
		       

}
function registrar_saco(){
	
    var cc=document.getElementById("cedula").value;
    var ta=document.getElementById("talle").value;
    var esp_a=document.getElementById("esp_al").value;
    var esp_b=document.getElementById("esp_b").value;
    var lar=document.getElementById("lar").value;
    var pe=document.getElementById("pecho").value;
    var cin=document.getElementById("cin").value;
    var ba=document.getElementById("ba").value;
    var hom=document.getElementById("hom").value;
    var man=document.getElementById("man").value;
    var mol=document.getElementById("molde").value;
    var ob=document.getElementById("ob").value;
    var pren=document.getElementById("prenda").value;
        
    if(esp_a=="" || esp_b=="" || lar=="" || pe=="" || cin=="" || ba=="" || hom=="" || man=="" ){
        alert ("Ingrese Todas Las Medidas."); 
        return ;
    }

    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&talle="+ta+"&esp_al="+esp_a+"&esp_b="+esp_b+"&lar="+lar+
        "&pecho="+pe+"&cin="+cin+"&ba="+ba+"&hom="+hom+"&man="+man+"&molde="+mol+"&ob="+ob+"&prenda="+pren,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
	
}
function registrar_bermuda(){
	  
    var cc=document.getElementById("cedula").value;
    var cin=document.getElementById("cin").value;
    var ba=document.getElementById("ba").value;
    var la=document.getElementById("la").value;
    var ti=document.getElementById("ti").value;
    var bo=document.getElementById("bo").value;
    var ta=document.getElementById("ta").value;
    var ob=document.getElementById("ob").value;
    var mo=document.getElementById("molde").value;
    var pren=document.getElementById("prenda").value;
		
    if(cin=="" || ba=="" || la=="" || ti=="" || bo=="" ){
        alert ("Ingrese Todas Las Medidas."); 
        return ;
    }
    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&cin="+cin+"&ba="+ba+"&la="+la+"&ti="+ti+"&bo="+bo+
        "&ta="+ta+"&ob="+ob+"&molde="+mo+"&prenda="+pren,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
      
}
function registrar_chaleco(){
	  
    var cc=document.getElementById("cedula").value;
    var ta=document.getElementById("ta").value;
    var la=document.getElementById("la").value;
    var esp=document.getElementById("esp").value;
    var pe=document.getElementById("pe").value;
    var cin=document.getElementById("cin").value;
    var ba=document.getElementById("ba").value;
    var hom=document.getElementById("hom").value;
    var sep=document.getElementById("sep").value;
    var alt=document.getElementById("alt").value;
    var mo=document.getElementById("molde").value;
    var ob=document.getElementById("ob").value;
    var pren=document.getElementById("prenda").value;
		
    if(la=="" || esp=="" || pe=="" || cin=="" || ba=="" || hom=="" || sep=="" || alt==""  ){
        alert ("Ingrese todas las medidas."); 
        return ;
    }
		
    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&cin="+cin+"&ba="+ba+"&pe="+pe+"&esp="+esp+"&la="+la+
        "&ta="+ta+"&ob="+ob+"&molde="+mo+"&prenda="+pren+"&hom="+hom+"&sep="+sep+"&alt="+alt,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
      
}
function registrar_camisa(){


    var cc=document.getElementById("cedula").value;
    var cu=document.getElementById("cue").value;
    var esp_a=document.getElementById("esp_a").value;
    var esp_b=document.getElementById("esp_b").value;
    var man=document.getElementById("man").value;
    var la=document.getElementById("la").value;
    var ba=document.getElementById("ba").value;
    var cin=document.getElementById("cin").value;
    var ta=document.getElementById("talla").value;
    var ho=document.getElementById("hom").value;
    var mo=document.getElementById("molde").value;
    var ob=document.getElementById("ob").value;
    var pren=document.getElementById("prenda").value;


    if(cu=="" || esp_a=="" || esp_b=="" || man=="" || la=="" || ba=="" || cin=="" || ho==""){
        alert ("Ingrese Todas Las Medidas."); 
        return ;
    }
		
    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&cue="+cu+"&esp_a="+esp_a+"&esp_b="+esp_b+"&man="+man+"&la="+la+
        "&ba="+ba+"&cin="+cin+"&talla="+ta+"&hom="+ho+"&molde="+mo+"&ob="+ob+"&prenda="+pren,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
}
function registrar_slack(){


    var cc=document.getElementById("cedula").value;
    var cin=document.getElementById("cin").value;
    var ba=document.getElementById("base").value;
    var la=document.getElementById("largo").value;
    var ti=document.getElementById("tiro").value;
    var pie=document.getElementById("pie").value;
    var ro=document.getElementById("rod").value;
    var bo=document.getElementById("bota").value;
    var ta=document.getElementById("tall").value;
    var ab=document.getElementById("ab").value;
    var mo=document.getElementById("molde").value;
    var ob=document.getElementById("ob").value; 
    var pren=document.getElementById("prenda").value;


    if(cin=="" || ba=="" || la=="" || ti=="" || pie=="" || ro=="" || bo=="" || ab==""){
        alert ("Ingrese Todas Las Medidas."); 
        return ;
    }
		
    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&cin="+cin+"&base="+ba+"&largo="+la+"&tiro="+ti+"&pie="+pie+
        "&rod="+ro+"&bota="+bo+"&tall="+ta+"&ab="+ab+"&molde="+mo+"&ob="+ob+"&prenda="+pren,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
}

function registrar_chaqueta(){


    var cc = document.getElementById("cedula").value;
    var ta1 = document.getElementById("talle1").value;
    var ta2 = document.getElementById("talle2").value;
    var la = document.getElementById("la").value;
    var esp_a = document.getElementById("esp_a").value;
    var esp_b = document.getElementById("esp_b").value;
    var pe = document.getElementById("pe").value;
    var cin = document.getElementById("cin").value;
    var ba = document.getElementById("ba").value;
    var hom = document.getElementById("hom").value;
    var al = document.getElementById("alt").value;
    var man_l = document.getElementById("man_l").value;
    var pl = document.getElementById("puno_l").value;
    var mc = document.getElementById("man_c").value;
    var pc = document.getElementById("puno_c").value;
    var m3 = document.getElementById("man_tres").value;
    var p3 = document.getElementById("puno_tres").value;
    var sep = document.getElementById("sep").value;
    var bra = document.getElementById("bra").value;
    var cos = document.getElementById("cos").value;
    var ent = document.getElementById("entre").value;
    var mo = document.getElementById("molde").value;
    var pren = document.getElementById("prenda").value;
    var ob = document.getElementById("ob").value;

    if(ta1=="" || ta2=="" || la=="" || esp_a=="" || esp_b=="" || pe=="" || cin=="" || ba=="" || hom=="" || al=="" || man_l==""  || pl=="" || mc=="" || pc=="" || m3=="" || p3=="" ||  sep=="" || bra=="" || cos=="" || ent==""  ){
        alert ("Ingrese Todas Las Medidas"); 
        return ;
    }
		
    $.ajax({

        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&talle1="+ta1+"&talle2="+ta2+"&la="+la+"&esp_a="+esp_a+"&esp_b="+esp_b+"&pe="+pe+"&cin="+cin+"&ba="+ba+"&hom="+hom+"&alt="+al+
        "&man_l="+man_l+"&puno_l="+pl+"&man_c="+mc+"&puno_c="+pc+"&man_tres="+m3+"&puno_tres="+p3+"&sep="+sep+"&bra="+bra+"&cos="+cos+"&entre="+ent+"&molde="+mo+"&ob="+ob+"&prenda="+pren,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
}

function registrar_blusa(){

    var cc=document.getElementById("cedula").value;
    var ta1=document.getElementById("ta1").value;
    var ta2=document.getElementById("ta2").value;
    var esp=document.getElementById("esp").value;
    var esp_b=document.getElementById("esp_b").value;
    var pe=document.getElementById("pe").value;
    var cin=document.getElementById("cin").value;
    var ba=document.getElementById("ba").value;
    var hom=document.getElementById("hom").value;
    var manc=document.getElementById("manc").value;
    var puc=document.getElementById("puc").value;
    var mal=document.getElementById("mal").value;
    var pul=document.getElementById("pul").value; 
    var man3=document.getElementById("man3").value;
    var pu3=document.getElementById("pu3").value;
    var ent=document.getElementById("ent").value;
    var esc=document.getElementById("esc").value;
    var co=document.getElementById("co").value;
    var ob=document.getElementById("ob").value;
    var alt_b=document.getElementById("alt_busto").value;
    var sep_b=document.getElementById("sep_busto").value;
    var mo=document.getElementById("molde").value;
    var pren=document.getElementById("prenda").value;


    if(ta1=="" || ta2=="" || esp=="" || pe=="" || cin=="" || ba=="" || hom=="" || manc=="" || puc==""){
        alert ("Ingrese Todas Las Medidas."); 
        return ;
    }
		
    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&ta1="+ta1+"&ta2="+ta2+"&esp="+esp+"&esp_b="+esp_b+"&alt_busto="+alt_b+"&sep_busto="+sep_b+"&pe="+pe+"&cin="+cin+"&ba="+ba+
        "&hom="+hom+"&manc="+manc+"&puc="+puc+"&mal="+mal+"&pul="+pul+"&man3="+man3+"&pu3="+pu3+"&ent="+ent+"&esc="+esc+"&co="+co+"&ob="+ob+
        "&molde="+mo+"&prenda="+pren,
        success:function(msg){
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
}
function registrar_vestido(){

    var cc=document.getElementById("cedula").value;
    var ta1=document.getElementById("ta1").value;
    var ta2=document.getElementById("ta2").value;
    var esp_a=document.getElementById("esp_a").value;
    var esp_b=document.getElementById("esp_b").value;
    var la=document.getElementById("la").value;
    var laf=document.getElementById("lafa").value;
    var pe=document.getElementById("pe").value;
    var cin=document.getElementById("cin").value;
    var ba=document.getElementById("ba").value;
    var ho=document.getElementById("ho").value;
    var ma=document.getElementById("ma").value; 
    var pu=document.getElementById("puno").value; 
    var al=document.getElementById("alt").value;
    var sep=document.getElementById("sep").value;
    var cos=document.getElementById("cos").value;
    var esc1=document.getElementById("esc1").value;
    var esc2=document.getElementById("esc2").value;
    var im=document.getElementById("im").value;
    var con=document.getElementById("con").value;
    var mo=document.getElementById("molde").value;
    var ob=document.getElementById("ob").value;
    var pren=document.getElementById("prenda").value;


    if(ta1=="" || ta2=="" || esp_a=="" || esp_b=="" || la=="" || laf=="" || pe=="" || cin=="" || ba=="" || ho=="" || ma=="" || al=="" || sep=="" || cos=="" || esc1=="" || esc2=="" || im=="" || con=="" ){
        alert ("Ingrese todas las medidas."); 
        return ;
    }
        
		
    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&ta1="+ta1+"&ta2="+ta2+"&esp_a="+esp_a+"&esp_b="+esp_b+"&la="+la+"&lafa="+laf+
        "&pe="+pe+"&cin="+cin+"&ba="+ba+"&ho="+ho+"&ma="+ma+"&puno="+pu+"&al="+al+"&sep="+sep+"&cos="+cos+"&esc1="+esc1+"&esc2="+esc2+"&im="+im+
        "&con="+con+"&molde="+mo+"&ob="+ob+"&prenda="+pren,
        success:function(msg){ 
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
}
function registrar_falda(){

    var cc= document.getElementById("cedula").value;
    var cin= document.getElementById("cin").value;
    var ba= document.getElementById("ba").value;
    var la= document.getElementById("la").value;
    var vl= document.getElementById("vl").value;
    var vc= document.getElementById("vc").value;
    var ab= document.getElementById("ab").value;
    var ob= document.getElementById("ob").value;
    var mo= document.getElementById("molde").value;
    var pren= document.getElementById("prenda").value;
 
    if(cin=="" || ba=="" || la=="" || vl=="" || vc=="" || ab=="" ){
        alert ("Ingrese todas las medidas."); 
        return ;
    }
		
    $.ajax({
        type:"POST",
        url:"../modelo/guardar_medidas.php",
        data:"cedula="+cc+"&cin="+cin+"&ba="+ba+"&la="+la+"&vl="+vl+"&vc="+vc+"&ab="+ab+"&ob="+ob+"&molde="+mo+"&prenda="+pren,
        success:function(msg){ 
            $("#pan").html(msg);
            $("#saved").css({
                'visibility':'hidden'
            })
        }
    })
}
function modificarPrenda(){
    var respuesta = confirm("Desea modificar esta prenda?");
    if (respuesta){


        var str = $("#cm").serialize();
        $.ajax({
            url: '../modelo/prendasUpdate.php',
            data: str,
            type: 'post',
            success: function(data){
                if(data != "")
                    alert(data);
			
                _registrarMedidas();
            }
        });
    }

}
function eliminarPrenda(){

    var respuesta = confirm("Desea eliminar esta prenda?");
    if (respuesta){

        var cc= document.getElementById("cedula").value;
        var pren= document.getElementById("prenda").value;
 


        $.ajax({
            type: 'post',
            url: '../modelo/prendasDelete.php',
            data:"cedula="+cc+"&prenda="+pren,
			
            success: function(data){
                if(data != "")
                    alert(data);
			  
			
                _registrarMedidas()
                registrarDetalle()
				
            }
        });
    }
}
function validarPedido()
{
    var pedido= document.getElementById("orden").value;

    return $.ajax({
        url: "../modelo/pedidosController.php",
        type: 'post',
        async:false,
        data: "orden="+pedido+'&sol=validar',
        success: function(msg){
            if(msg!=""){
                alert(msg);        
            }     
        }
    }).responseText; 
            
}

function registrarDetalle() {

    var prenda = document.getElementById("prenda").value,
            cedula = document.getElementById("cedula").value,
            orden = document.getElementById("orden").value,
            ancho, 
            alto;
    
    
    if (cedula == "" || orden == "") {
        alert("rellene todos los campos de pedido");

        $("#prenda").val("Elige..");
        return;
    }

    if (prenda == "Arreglo") {
        ancho = 470,
        alto = 400;
    }
    else if (prenda == "Chaqueta" || prenda == "Blusa" || prenda == "Vestido") {
        ancho = 675;
        alto = 600;
    }
    else if (prenda == 'Elige..') {
    return false;
    }
    else {
        ancho = 650;
        alto = 500;
    }
    $("#conte").load("../modelo/detallePedido.php", {
        prenda: prenda,
        cedula: cedula,
        orden: orden
    });
    $('#conte').dialog({
        width: ancho,
        height: alto,
        modal: true,
        open: function(){
            $("#accordion").accordion({ autoHeight: true });
        },
        buttons: {
            Guardar: function(){
              $("#det").submit();  
            },
            Cancelar: function(){
            $(this).dialog("destroy");
            $("#prenda").val("Elige..");
        return;
            }        
        }
    });

}

