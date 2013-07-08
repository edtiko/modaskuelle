<?php

class cliente{


 var $nombre_cliente;
 var $apellido;
  var $id_cliente;
   var $sexo;
 var $telefono;
 var $celular;
  var $ciudad;
 var $direccion;
 var $digitador;
 var $fecha_entrada;
 var $update_last;
 var $empresa;
 var $observacion;
 var $nombre_apellido;





function cliente($nombre_cliente,$apellido,$id_cliente,$sexo,$telefono,$celular,$ciudad,$direccion,
                     $digitador,$fecha_entrada,$update_last,$nombre_apellido,$empresa,$observacion){



       $this->nombre_cliente=$nombre_cliente;
	   $this->apellido=$apellido;
           $this->id_cliente=$id_cliente;
             $this->sexo=$sexo;
	   $this->telefono=$telefono;
	   $this->celular=$celular;
            $this->ciudad=$ciudad;
	   $this->direccion=$direccion;
	    $this->digitador=$digitador;
	   $this->fecha_entrada=$fecha_entrada;
            $this->update_last=$update_last;
			$this->nombre_apellido=$nombre_apellido;
			$this->empresa=$empresa;
            $this->observacion=$observacion;
           
     
	 
	 
	  
    }
	
function getFields(){
return "(`nombre_cliente`, `apellido`, `id_cliente`, `sexo`,
`telefono`, `celular`, `ciudad`, `direccion`, `digitador`, 
`fecha_entrada`, `update_last`, `nombre_apellido`, `empresa`, `observacion`)";
}

 function getValues(){
return "('$this->nombre_cliente', '$this->apellido', '$this->id_cliente', '$this->sexo', '$this->telefono', '$this->celular', '$this->ciudad',
'$this->direccion', '$this->digitador', '$this->fecha_entrada', '$this->update_last', '$this->nombre_apellido', '$this->empresa',
'$this->observacion')";
}





}

?>