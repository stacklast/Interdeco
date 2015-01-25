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
   private $_empleado;
   private $_compania;


      public function __construct()
      { 
         $this->_empleado=array();
         $this->_compania=array();
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
         //recibe cada uno de los registros que tiene la tabla tipo_equipo
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
         //recibe cada uno de los registros que tiene la tabla tipo_equipo
         $this->_compania[]=$reg;   
      }   
      return $this->_compania;       
   }
 
}
?>