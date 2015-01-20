<?php 
/**
 *	@package Transporte
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Usuarios.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Combos
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
class ClsDAO_Combos
{   
//ATRIBUTOS Cooperativa
   private $_cooperativa;
//CONSTRUCTOR Cooperativa

      public function __construct()
      { 
         $this->_cooperativa=array();
      }
//METODO OBTENER Cooperativa
 
   public function Get_Cooperativa()
   {
   	  $bd=Db::getInstance();
      $sql="SELECT * FROM cop_coperativa ORDER BY COP_CODIGO ASC";
      $res=$bd->ejecutar($sql);
      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
      while($reg=mysql_fetch_assoc($res))
      {
         //recibe cada uno de los registros que tiene la tabla tipo_equipo
         $this->_cooperativa[]=$reg;   
      }   
 
      return $this->_cooperativa;       
   }
 
}
?>