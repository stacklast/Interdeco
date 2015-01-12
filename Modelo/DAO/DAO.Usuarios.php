<?php 
include ('../../modelo/Db.class.php');/*Incluimos el fichero de la clase Db*/
include ('../../modelo/Conf.class.php');/*Incluimos el fichero de la clase Conf*/
include ('../../modelo/SQLConection.class.php');/*Incluimos el fichero de la clase Conf*/
/** 
  *Clase para acceso de datos
  * Hereda de: SQLConection
*/
$bd=Db::getInstance();
$tablaUsuarios =new SQLConection ('USU_USUARIOS');
$fields = $tablaUsuarios->fields =array (
              array ('private',    'ID', "' '"),
              array ('public',    'COP_CODIGO', "1"),
              array ('public',    'ROL', "Admin"),
              array ('public',    'USU_NOMBRE', "asdad"),
              array ('public',    'USU_APELLIDO', "asdasd"),
              array ('public',    'USU_ALIAS', "333"),
              array ('public',    'USU_EMAIL', "demo@mail.com")
); 
$longitud = count($fields);
//Recorro todos los elementos
for($i=0; $i<$longitud; $i++)
      {
      //saco el valor de cada elemento
      $aux =$fields[$i][2];//obtenemos los nombres de los campos
      //echo $aux;
      }

$insertar= array("1","adasads","asdads","asdasdas");
$resultado = $tablaUsuarios->insertRecord($insertar);
$demo="demo@demo.com";
$consulta = $tablaUsuarios->getRecords("USU_EMAIL = '$demo' AND USU_CODIGO = 1 ",false,1);
echo $consulta[0]['ROL'];
//var_dump($resultado);
//exit;
if (!$consulta) {
    die('Consulta no válida: ' . mysql_error());
}
//devolverConsulta($fields,$consulta,1);
function devolverConsulta($fields,$consulta,$colum)
{
$longitud = count($fields);
//Recorro todos los elementos
for($i=0; $i<$longitud; $i++)
      {
      //saco el valor de cada elemento
      $aux =$fields[$i][$colum];//obtenemos los nombres de los campos
      //  echo $consulta[0][$aux];
      }
}   
?>