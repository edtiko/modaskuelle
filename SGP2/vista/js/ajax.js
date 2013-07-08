/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function _registrar(){

	divResultado = document.getElementById('dato');
	numorden=document.nuevo_producto.nombre.value;
	ses_id=document.nuevo_producto.apellido.value;
	numclie=document.nuevo_producto.cedula.value;
	nombre=document.nuevo_producto.sexo.value;
	numvend=document.nuevo_producto.valor.value;
	nomvend=document.nuevo_producto.saldo.value;
	fe = document.nuevo_producto.abono.value;
	
	if (numorden=="" || numclie=="" || nombre=="" || numvend=="" || nomvend==""|| fecventa=="") {
		alert ("¡Error: Primero llene los datos del documento!");
		return;
	}
	ajax=objetoAjax();
	ajax.open("POST", "../modelo/registrarcliente.php?"+"&no="+numorden+"&nc="+numclie+"&n="+nombre+"&nv="+numvend+"&nv1="+nomvend+"&fv="+fecventa+"&codart="+codart+"&cantidad="+cantidad,true);
	divResultado.innerHTML= '<img src="../animgif/anim.gif">'
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
			//LimpiarCampos();
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
}



