<?php

if ($_POST['parametro']){

?>
<a href="javascript: fn_mostrar_frm_modificar(<?php echo $_POST['cedula'] ?> );" title="Actualizar"><img src="img/page_edit.png" id="ac"/></a>Actualizar
<a href="javascript: fn_eliminar(<?php echo $_POST['cedula'] ?>);" title="Eliminar"><img src="img/delete.png" id="de"/></a>Eliminar
<?php
}
else
    echo'error';


?>