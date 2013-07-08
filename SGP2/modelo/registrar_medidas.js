function registrar_pantalon(){

        var cc=document.getElementById("ced").value;
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


        if(cc=="" || cin=="" || ba=="" || lar=="" || ti=="" || pie=="" || rod=="" || bota=="" || tall==""){
            alert ("        Ingrese Todas Las Medidas.");
            return ;
        }

$.ajax({type:"POST",url:"../modelo/guardar_medidas.php",data:"ced="+cc+"&cin="+cin+"&base="+ba+
"&largo="+lar+"&tiro="+ti+"&pie="+pie+"&rod="+rod+"&bota="+bota+"&tall="+tall+
"&observacion="+ob+"&molde="+mol+"&prenda="+pren,success:function(msg){
          $("#pan").html(msg);
          }})
    }
	function registrar_saco(){
	
	   var cc=document.getElementById("ced").value;
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
       

$.ajax({type:"POST",url:"../modelo/guardar_medidas.php",data:"ced="+cc+"&talle="+ta+"&esp_al="+esp_a+"&esp_b="+esp_b+"&lar="+lar+
"&pecho="+pe+"&cin="+cin+"&ba="+ba+"&hom="+hom+"&man="+man+"&molde="+mol+"&ob="+ob+"&prenda="+pren,success:function(msg){
          $("#pan").html(msg);
          }})
	
	}
	function registrar_bermuda(){
	  
	  var cc=document.getElementById("ced").value;
        var cin=document.getElementById("cin").value;
	    var ba=document.getElementById("ba").value;
        var la=document.getElementById("la").value;
	    var ti=document.getElementById("ti").value;
        var bo=document.getElementById("bo").value;
        var ta=document.getElementById("ta").value;
        var ob=document.getElementById("ob").value;
        var mo=document.getElementById("molde").value;
		var pren=document.getElementById("prenda").value;
		
		$.ajax({type:"POST",url:"../modelo/guardar_medidas.php",data:"ced="+cc+"&cin="+cin+"&ba="+ba+"&la="+ti+"&bo="+bo+
"&ta="+ta+"&ob="+ob+"&molde="+mo+"&prenda="+pren,success:function(msg){
          $("#pan").html(msg);
          }})
      
	}