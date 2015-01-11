<?php 

Class Conf{
   private $_domain;
   private $_userdb;
   private $_passdb;
   private $_hostdb;
   private $_db;
   private $_dbType;
   private static $_instance;

   private function __construct(){
      //require('Config.php');
      //Datos de configuración de la conexión a la base de datos
      $domain = 'localhost';

      //Usuario
      $user='root';

      //Password
      $password='';

      //Servidor
      $host='localhost';

      //Base de datos a utilizar
      $db='embarque';

      //Qué sistema gestor de base de datos utilizamos, mysql, oracle, ...
      $dbType='mysql';

      $this->_domain = $domain;
      $this->_userdb = $user;
      $this->_passdb = $password;
      $this->_hostdb = $host;
      $this->_db = $db;
      $this->_dbType = $dbType;
   }

   private function __clone(){ }

   private function __wakeup(){ }

   public static function getInstance(){
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
      return self::$_instance;
   }

   public function getUserDB(){
      $var=$this->_userdb;
      return $var;
   }

   public function getHostDB(){
      $var=$this->_hostdb;
      return $var;
   }

   public function getPassDB(){
      $var=$this->_passdb;
      return $var;
   }

   public function getDB(){
      $var=$this->_db;
      return $var;
   }

   public function getDBType(){
     $var=$this->_dbType;
     return $var;
   }

}
 ?>