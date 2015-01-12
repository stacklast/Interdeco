<?php
session_start();

//Verificamos si el código almacenado en la sesión es el mísmo que se envió
if (@$_REQUEST['code'] && (@strtolower($_REQUEST['code']) == strtolower($_SESSION['random_number']))) {
    echo "1";
} else {
    echo "0";
}
?>