<?php 
/* ------ SUBIMOS EL ARCHIVO XML ------- */
$allowedExts = array("xml");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "text/xml"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "ERROR: " . $_FILES["file"]["error"] . "";
    }
  else
    {
    if (file_exists("XML/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " ya existe. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "XML/" . $_FILES["file"]["name"]);
      echo "Guardado en: " . "XML/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "ERROR. El fichero debe ser XML";
  }

/* ------ LEEMOS EL XML ------- */
$doc = new DOMDocument();

// Cargamos el fichero XML
$doc->load( "XML/" . $_FILES["file"]["name"] );

// Obtenemos el nodo 'persona'
$personas = $doc->getElementsByTagName( "persona" );

// Utilizamos un foreach aunque no sería necesario en nuestro caso
// porque solo existe una persona. Esto funcionaría para el caso
// de tener varias personas definidas con sus respectivos campos
// en el XML
foreach( $personas as $persona )
{
// Recogemos todas las etiquetas 'nombre'
$nombres = $persona->getElementsByTagName( "nombre" )->item(0)->nodeValue;

// Recogemos el valor de la que nos interesa
//$nombre = $nombres->item(0)->nodeValue;
//var_dump($nombre);

// Hacemos lo mismo para el apellido
$apellidos = $persona->getElementsByTagName( "apellido" )->item(0)->nodeValue;
//$apellido = $apellidos->item(0)->nodeValue;

echo "Datos de la persona: Nombre:".$nombres." - Apellido:".$apellidos;
}
?>