<?php 
$tablaUsuarios =new SQLConection ('USU_USUARIOS');
$fields = $tablaUsuarios->fields =array (
		              array ('private',    'USU_CODIGO', "' '"),
		              array ('public',    'COP_CODIGO', "1"),
		              array ('public',    'ROL', "Admin"),
		              array ('public',    'USU_NOMBRE', "asdad"),
		              array ('public',    'USU_APELLIDO', "asdasd"),
		              array ('public',    'USU_ALIAS', "333"),
		              array ('public',    'USU_EMAIL', "demo@mail.com")
		);  //instanciamos base de datos
function devolverConsulta($fields,$consulta,$colum)
{
$longitud = count($fields);
//Recorro todos los elementos
for($i=0; $i<$longitud; $i++)
      {
      //saco el valor de cada elemento
      $aux =$fields[$i][$colum];//obtenemos los nombres de los campos
        echo $consulta[0][$aux];
      }
return $consulta;
}
	function ValidarLogin($email,$password){
		

		$variable = '0';
	 	/*Creamos una query sencilla*/
		$sql='SELECT * FROM usu_usuarios' ;

		/*Ejecutamos la query*/
		$stmt=$bd->ejecutar($sql);

		/*Realizamos un bucle para ir obteniendo los resultados*/
		while ($x=$bd->obtener_fila($stmt,0)){
		  // echo $x['USU_NOMBRE'].'<br />';
			$nombre = $x['USU_NOMBRE'];
			$apellido= $x['USU_APELLIDO'];
			$password1= $x['USU_PASSWORD'];
			$email2=$x['USU_EMAIL'];
		}
		//si el password y el email coinciden con la BD
		if($password1==$password && $email == $email2){
			session_start();
			$_SESSION['usuario'] = $nombre.' '.$apellido;
			$_SESSION['password'] = $password ;
			$variable = $nombre.' '.$apellido;
		}
		else{
			// si solo la contraseña es correcta
			if($password1==$password){
				$variable = '1';
			}
			// si solo el correo es correcto
			else if($email == $email2){
				$variable = '2';
			}
			// si ninguno es correcto
			else{
				$variable = '3';
			}
		}
		return $variable; // valor impreso para respuesta AJAX
	}
?>