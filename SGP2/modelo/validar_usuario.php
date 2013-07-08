<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('modaskuelle');
$usuario = strtolower($_POST["user"]);
$password = $_POST["pass"];
if($usuario!= "user" && $password!= "pass")
{
	$sql = mysql_query("SELECT login,password FROM tbusuario WHERE login='$usuario' and password='$password'");
	$f= mysql_fetch_array($sql);
        if($f>0){
		if($f["password"] == $password){
			$_SESSION["k_username"] = $f['login'];
			echo 'Has sido validado correctamente '.$_SESSION['k_username'].' <p>';
			echo '<script type="text/javascript">window.location="../vista/home.php";</script>';
                      
		}else{
			echo " X ERROR: Password Incorrecto.". mysql_error() ;
		}
	}

        else{
            echo "Usuario no existente en la base de datos.". mysql_error() ;
	}
}


?>
