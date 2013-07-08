<?php

class pedido{

 var $NRO_PEDIDO;
 var $TALONARIO;
 var $CLIENTE;
 var $FECHA_RECIBIDO;
 var $HORA;
 var $ESTADO;
 var $OBSERVACION;
 var $DIGITADOR;

								
			
		

function pedido($NRO_PEDIDO,$TALONARIO,$CLIENTE,$FECHA_RECIBIDO,$HORA,$ESTADO,
                    $OBSERVACION,$DIGITADOR){
   

       $this->NRO_PEDIDO=$NRO_PEDIDO;
       $this->CLIENTE=$CLIENTE;
       $this->TALONARIO=$TALONARIO;
       $this->FECHA_RECIBIDO=$FECHA_RECIBIDO;
       $this->HORA=$HORA;
       $this->ESTADO=$ESTADO;
       $this->OBSERVACION=$OBSERVACION;
       $this->DIGITADOR=$DIGITADOR;
	   
    }
	

	



 function getFields(){
return "(`NRO_PEDIDO`, `CLIENTE`, `TALONARIO`, `FECHA_RECIBIDO`,
`HORA`, `ESTADO`, `OBSERVACION`, `DIGITADOR`)";
}

 function getValues(){
return "('$this->NRO_PEDIDO', '$this->CLIENTE', '$this->TALONARIO', '$this->FECHA_RECIBIDO', '$this->HORA', '$this->ESTADO',
'$this->OBSERVACION', '$this->DIGITADOR')";
}





}













?>