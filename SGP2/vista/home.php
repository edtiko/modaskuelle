<?php
session_start();
if (!isset($_SESSION['k_username'])) { 
  echo '<script type="text/javascript">window.location="../vista/index.php";</script>'; 
  }
else
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
 <link rel="stylesheet" type="text/css" href="css/estilos2.css"/> 
 <link type="text/css" href="css/main.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="pro_drop_1/pro_drop_1.css" />
  <script src="js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
<script src="pro_drop_1/stuHover.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function() {
		$( "#nav a" ).click(function(){
			var page = this.hash.substr(1);
			$("#content").html("");
			
			$.get(page+".php",function(gotHtml){
				$("#content").html(gotHtml);
				
			});
			return false;
			
		});
		
	});
	</script>
<title>S.G.P</title>
<style type="text/css">
.contenedor #tabs li div a strong {
	color:#FFF;
}
</style>
</head>
<body>
 

  <div class="banner">
    <img src="img/logo14.png" height="97" id="logo14" />
    <a href="../modelo/logout.php" title="Salir"><img src="img/Exit.png" width="50" height="37" id="exit" /></a>
</div>
  <div id="header">
    <table width="255" border="0">
      <tr>
        <th id="" class="null"><p>
          <?php
		echo '<font color="#FFFFFF">Bienvenido(a): ';
		echo '<b>'.$_SESSION['k_username'].'</b>';
	
		?>
        </p></th>
      </tr>
    </table>
</div>

<span class="preload1"></span>
<span class="preload2"></span>
<div class="contenedor">
  <ul id="nav">
  <li class="top"><a href="home.php" class="top_link"><span>Home</span></a></li>
  <li class="top"><a href="#content1"  class="top_link"><span >Clientes</span></a>
    
  </li>
  <li class="top"><a href="#content5"  class="top_link"><span >Pedidos</span></a>
   
  </li>
   <li class="top"><a href="#content7" class="top_link"><span>Operarios</span></a></li>
  <li class="top"><a href="" class="top_link"><span>Cuenta</span></a></li>
</ul>
<div id="content_wrapper">
<div id="content"><div id="letr">
  <img src="img/logo7.png" width="380" height="191" id="logo7" /></div>
</div></div>
</div>

<div class="pie-pagina"></div>
</body>
</html>

