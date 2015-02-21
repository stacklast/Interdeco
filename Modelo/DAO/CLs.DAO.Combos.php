<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Combos.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Combos
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
class ClsDAO_Combos
{   
   private $_participante;
   private $_empleado;
   private $_compania;
   private $_pais;
   private $_distrito;
   private $_ciudad;
   public  $_code;
   
      public function __construct()
      { 
         $this->_participante=array();
         $this->_empleado=array();
         $this->_compania=array();
         $this->_distrito=array();
         $this->_ciudad=array();
         $this->_pais=array();
      }
/**
  *  Obtener Participantes
  */
   public function Get_Participante()
   {
    $bd=Db::getInstance();
      $sql="SELECT PRO_ID, PRO_NOMBRE FROM pro_programas ORDER BY PRO_ID ASC";
      $res=$bd->ejecutar($sql);
      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
      while($reg=mysql_fetch_assoc($res))
      {
         //recibe cada uno de los registros que tiene la tabla pro_programas
         $this->_participante[]=$reg;   
      }   
 
      return $this->_participante;       
   }
 /**
  *  Obtener Empleados
  */
   public function Get_Empleado()
   {
   	$bd=Db::getInstance();
      $sql="SELECT EMP_ID, EMP_NOMBRE,EMP_APELLIDO FROM emp_empleados ORDER BY EMP_ID ASC";
      $res=$bd->ejecutar($sql);
      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
      while($reg=mysql_fetch_assoc($res))
      {
         //recibe cada uno de los registros que tiene la tabla emp_empleados
         $this->_empleado[]=$reg;   
      }   
 
      return $this->_empleado;       
   }
/**
  *  Obtener Companias
  */
   public function Get_Compania()
   {
      $bd=Db::getInstance();
      $sql="SELECT COM_ID, COM_NOMBRE FROM com_compania ORDER BY COM_ID ASC";
      $res=$bd->ejecutar($sql);
      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
      while($reg=mysql_fetch_assoc($res))
      {
         //recibe cada uno de los registros que tiene la tabla com_compania
         $this->_compania[]=$reg;   
      }   
      return $this->_compania;       
   }
/**
  *  Obtener Paises
  */
   public function Get_Pais()
   {
      $bd=Db::getInstance();
      $sql="SELECT PA_ID, PA_CODIGO, PA_NOMBRE FROM dpa_pais ORDER BY PA_ID ASC";
      $res=$bd->ejecutar($sql);
      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
      while($reg=mysql_fetch_assoc($res))
      {
         //recibe cada uno de los registros que tiene la tabla dpa_pais
         $this->_pais[]=$reg;   
      }   
      return $this->_pais;       
   }
/**
  *  Obtener Paises
  */
   public function Get_Distrito()
   {
      $bd=Db::getInstance();
      $sql="SELECT CI_DISTRITO FROM dci_ciudad WHERE CI_ID = '$this->_code' ORDER BY CI_DISTRITO ASC";
      $res=$bd->ejecutar($sql);
      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
      while($reg=mysql_fetch_assoc($res))
      {
         //recibe cada uno de los registros que tiene la tabla dci_ciudad
         $this->_distrito[]=$reg;   
      }   
      return $this->_distrito;       
   }
/**
  *  Obtener Paises
  */
   public function Get_Ciudad()
   {
      $bd=Db::getInstance();
      $sql="SELECT CI_ID, CI_NOMBRE FROM dci_ciudad WHERE CI_CODIGO_PAIS = '$this->_code' ORDER BY CI_ID ASC";
      $res=$bd->ejecutar($sql);
      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
      while($reg=mysql_fetch_assoc($res))
      {
         //recibe cada uno de los registros que tiene la tabla dci_ciudad
         $this->_ciudad[]=$reg;   
      }   
      return $this->_ciudad;       
   }
 
}

@$combo = $_POST["combo"];
if($combo == "ciudad")
{
  $ciudad = new ClsDAO_Combos();
  $ciudad->_code = $_POST["code"];
  $reg = $ciudad->Get_Ciudad();
  for($i=0; $i<count($reg); $i++) { ?>    
      <option value="<?php echo $reg[$i]["CI_ID"];?>"><?php echo $reg[$i]["CI_NOMBRE"];?></option>
  <?php } 
}
if($combo == "distrito")
{
  $distrito = new ClsDAO_Combos();
  $distrito->_code = $_POST["code"];
  $reg = $distrito->Get_Distrito();
  for($i=0; $i<count($reg); $i++) {  
       echo $reg[$i]["CI_DISTRITO"];
  } 
}

?>