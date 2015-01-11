<?php 
/* Clase encargada de gestionar las conexiones a la base de datos */
Class Db{

   private $servidor;
   private $usuario;
   private $password;
   private $base_datos;
   private $tipo;
   private $link;
   private $stmt;
   private $array;

   private static $_instance;

   /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
   private function __construct(){
      $this->setConexion();
      $this->conectar();
   }

   /*Método para establecer los parámetros de la conexión*/
   private function setConexion(){
      $conf = Conf::getInstance();
      $this->servidor=$conf->getHostDB();
      $this->base_datos=$conf->getDB();
      $this->usuario=$conf->getUserDB();
      $this->password=$conf->getPassDB();
      $this->tipo=$conf->getDBType();
   }

   /*Evitamos el clonaje del objeto. Patrón Singleton*/
   private function __clone(){ }

   private function __wakeup(){ }

   /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
   public static function getInstance(){
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
      return self::$_instance;
   }

   /*Realiza la conexión a la base de datos.*/
	private function conectar(){
	   switch ($this->tipo){
	      case 'mysql':       $link=mysql_connect($this->servidor, $this->usuario, $this->password);
	                          if ($link){
	                             mysql_select_db($this->base_datos,$link);
	                             @mysql_query("SET NAMES 'utf8'");
	                          }
	                          break;

	      case 'postgress':   $link=pg_connect("host=".$this->servidor." dbname=".$this->base_datos." user=".$this->usuario." password=".$this->password);
	                          break;
	      break;
	   }
	   if (!$link){
	      error_log(0,'Problema de conexión a la base de datos.');
	      exit('Perdonen las molestias. Tenemos un problema técnico. Esperamos resolverlo en los próximos minutos');
	   }else{
	      $this->link=$link;
	   }
	}

   /*Método para ejecutar una sentencia sql*/
   public function ejecutar($sql){
      switch ($this->tipo){
         case 'mysql':     $this->stmt=mysql_query($sql,$this->link);
                  break;
         case 'postgress': $this->stmt=pg_Euery($this->link,$sql);
                   break;
         break;
      }
      return $this->stmt;
   }

   /*Método para obtener una fila de resultados de la sentencia sql*/
   public function obtener_fila($stmt,$fila){
      switch ($this->tipo){
         case 'mysql':     if ($fila==0){
                               $this->array=mysql_fetch_array($stmt);
                            }else{
                               mysql_data_seek($stmt,$fila);
                               $this->array=mysql_fetch_array($stmt);
                            }
                            break;
         case 'postgress': if ($fila==0){
                     $this->array=pg_fetch_row($stmt);
                   }else{
                      $this->array=pg_fetch_row($stmt,$fila);
                   }
                   break;
          break;
      }
      return $this->array;
   }

   //Devuelve el último id del insert introducido
   public function lastID(){
      return mysql_insert_id($this->link);
   }
}
 ?>