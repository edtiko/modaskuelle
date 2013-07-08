<?php
session_start();

session_destroy();
$parametros_cookies = session_get_cookie_params(); 
setcookie(session_name(),0,1,$parametros_cookies["path"]);
echo 'Ha terminado la sesi&oacute;n <p><a href="../vista/index.php">index</a></p>';
?>
<SCRIPT type=""  LANGUAGE="javascript">
location.href = "../vista/index.php";
</SCRIPT>
<html>
<body>
</body>
</html>
<?