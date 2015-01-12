<?php 
/**
 * NoInjection Evitamos Injection SQL en los campos obtenidos 
 * @param campos
 */
function NoInjection($campos)
{
	$value = mysql_real_escape_string($campos);
	$value = htmlspecialchars($campos);//cambia a codigo html los caracteres &,“,‘,<,>
	return $value;
}
function EncriptarMD5_SALT($contraseña)
{
	$password = NoInjection($contraseña);
	$salt = 'edwin';
	$s_salt = md5($salt . $password);
	return $s_salt;
}
?>