<?php

### Pasamos headers para prevenir que se cachee la imagen
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
### Iniciamos sesion
session_start();

### Configuración
// Es el nombre se la variable de sesión que se crea
// Contra este valor se compara el valor ingresado en el input "codigo_seguridad"
// que se pasa por post
$variable_captcha = "codigo_captcha";
 
// Cantidad de caracteres que contendrá nuestra imágen
// de modificarse y en función del tamaño de la fuente 
// habrá que redefinir las dimensiones de "bgcaptcha1.gif"
// que es para este ejemplo de 130x50 px
$numero_caracteres = 7;
 
// La imágen que funcionará de fondo y que permitirá 
// 'ensuciar' la cadena de caracteres
$imagen = "bgcaptcha1.gif";
 
// El archivo de fuentes, puede ser un .ttf / .otf 
$fuente = "molot.otf";
 
// Tamaño de la fuente
$size_fuente = 20;
 
// Angulos, cada vez que se refresca la imagen se modifica en forma aleatoria
// la inclinación de la misma
$angulo_uno = 2;
$angulo_dos= -2;
 
// $x e $y representan las coordenadas de inicio de la aparición de la cadena
// de caracteres respecto del las dimensiones de la imagen
$x = 15;
$y = 30;
 
#### fin configuración
 
#### No editar desde aquí
 
# Creamos la variable de sesion  llamando la función para asignarle un valor
$_SESSION["$variable_captcha"] = TextoAleatorio("$numero_caracteres");
 
# Creamos la imagen a partir del gif $imagen
$captcha = imagecreatefromgif($imagen);
 
# Cambiamos el color y el ángulo en forma alternada
$cambiar_color = rand(1,2);
if($cambiar_color==1){
$color = imagecolorallocate($captcha, 19, 28, 6);
$angulo = $angulo_uno;
}else{
$color = imagecolorallocate($captcha, 0, 69, 102);
$angulo = $angulo_dos;
}
 
# Aplicamos a la imagen todos los elementos
imagettftext ($captcha, $size_fuente, $angulo, $x, $y, $color, $fuente, $_SESSION['codigo_captcha']);
# hacemos de este php un gif
header("Content-type: image/png");
imagegif($captcha);
 
# Creamos una cadena de x caracteres que se establecerá como valor para la sesion
# usamos la siguiente función
function TextoAleatorio($caracteres_cadena) {
$matriz = '12345-67890A,BCDEFGHIJKLMN@PQR_STUWXYZ';
for($i=0;$i<$caracteres_cadena;$i++) {
$clave .= $matriz{rand(0,38)};
}
return $clave;
}
?>