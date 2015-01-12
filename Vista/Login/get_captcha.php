<?php
session_start();
$string = '';
for ($i = 0; $i < 5; $i++) {     //Obtenemos un caracter aleatorio entre el 97 (A) y 122 (Z)
    $string .= chr(rand(97, 122));
}
//Guardamos el valor aleatorio en la sesión
$_SESSION['random_number'] = $string;

//Utilizamos una fuente especial para que se vean mejor las letras, estas se encuentran en la carpeta fonts
$dir = 'fonts/';
$image = imagecreatetruecolor(165, 50);

// Elige la fuente aleatoriamente
$num = rand(1, 2);

if ($num == 1) {
    $font = "Capture it 2.ttf";
    // Estilo de Fuente 1
} else {
    $font = "Molot.otf";
    // Estilo de fuente 2
}

//Se crea la imagen del color que deseamos, en este caso es el RGB(50,50,50)
$color = imagecolorallocate($image, 50, 50, 50);

// color
$white = imagecolorallocate($image, 255, 255, 255);

// Color de Fondo Blanco
imagefilledrectangle($image, 0, 0, 399, 99, $white);

//Se escribe el número generado anteriormente en el color y con la fuente elegida
imagettftext($image, 30, 0, 10, 40, $color, $dir . $font, $_SESSION['random_number']);

//Por ultimo se devuelve una imagen png para su uso
header("Content-type: image/png");
imagepng($image);
?>