<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['password']))
{
	/*<script type="text/javascript">
		function redireccionar(){
		  window.locationf="http://www.cristalab.com";
		} 
		setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos
		</script>
    header("Location: vista/home.php");*/
    echo '<script>location.href = "/Github/Interdeco/Vista/";</script>'; 
}
else
{
	//header("Location: vista/login.php");
	echo '<script>location.href = "/Github/Interdeco/Vista/Login/";</script>'; 
}
?>
