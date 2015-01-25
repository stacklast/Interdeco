<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Companias.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Companias
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Companias
{
	/**
	 * $tablaUsuarios variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaCompanias;//Objeto
	private  $_nombre;//String
	private  $_ruc;//String
	private  $_resultado;// bool true false
	private  $_consulta; //array();
	private  $_direccion;//string 
	private  $_telefono;//string
	private  $_email;//string
	private  $_web;//string
	/**
	 * [__construct constructor para instanciar tabla a utilizar]
	 */
	public function __construct()
	{
		/**
		 * $bd variable que instancia la conexion a BD
		 * @var objeto
		 */
		$bd=Db::getInstance();	
		/**
		 * $this->tablaUsuarios instancia al objeto de manipulacion de BD
		 * @var SQLConection
		 * @param String Nombre de la Tabla de BD a Usar
		 */
		$this->_tablaCompanias =new SQLConection ('com_compania');
		$fields = $this->_tablaCompanias->fields =array (
		              array ('private', 'COM_ID', "' '"),
		              array ('public', 'COM_NOMBRE'),
		              array ('public', 'COM_RUC'),
		              array ('public', 'COM_DIRECCION'),
		              array ('public', 'COM_TELEFONO'),
		              array ('public', 'COM_EMAIL'),
		              array ('public', 'COM_WEB')
				);  //instanciamos base de datos
	}
	/**
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarUsuario($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaCompanias->insertRecord($arrayDatos);
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Agregar Nuevo Usuario: '.$e;
		}
	}
	/**
	 * ModificarUsuario 
	 * @param 	id, array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS y el id
	 * @return  string Mensaje de Validacion
	 */
	public function ModificarUsuario($id,$arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaCompanias->updateRecord($id,$arrayDatos,'COM_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Usuario: '.$e;
		}
	}
	public function EliminarUsuario($id)
	{
		try{
			 $this->_resultado = $this->_tablaCompanias->deleteRecord($id,'COM_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Usuario: '.$e;
		}
	}
	public function VerificaRegistroExistente($email,$ruc)
	{
		echo $this->_consulta = $this->_tablaCompanias->getRecords("COM_EMAIL='$email' OR COM_RUC = '$ruc' ",false,1);
		$numrows = mysql_num_rows($this->_consulta);
		if ($numrows!=0) { 
			echo "ya existe un registro con ese email o ese alias"; 
			exit();
		}
		else{
			echo "puede agregarse ese usuario";
		}
	}
}
?>