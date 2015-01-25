<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Empleados.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Empleados
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Empleados
{
	/**
	 * $_tablaEmpleados variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaEmpleados;//Objeto
	private  $_resultado;// bool true false
	private  $_consulta; //array();
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
		 * $this->_tablaEmpleados instancia al objeto de manipulacion de BD
		 * @var SQLConection
		 * @param String Nombre de la Tabla de BD a Usar
		 */
		$this->_tablaEmpleados =new SQLConection ('emp_empleados');
		$fields = $this->_tablaEmpleados->fields =array (
		              array ('private', 'EMP_ID', "' '"),
		              array ('public', 'COM_ID'),
		              array ('public', 'EMP_NOMBRE'),
		              array ('public', 'EMP_APELLIDO'),
		              array ('public', 'EMP_TELEFONO'),
		              array ('public', 'EMP_CELULAR'),
		              array ('public', 'EMP_PAIS'),
		              array ('public', 'EMP_PROVINCIA_ESTADO'),
		              array ('public', 'EMP_CIUDAD'),
		              array ('public', 'EMP_DIRECCION'),
		              array ('public', 'EMP_CARGO'),
		              array ('public', 'EMP_TELEFAX')
				);  //instanciamos base de datos
	}
	/**
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarEmpleado($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaEmpleados->insertRecord($arrayDatos);
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Agregar Nuevo Empleado: '.$e;
		}
	}
	/**
	 * ModificarUsuario 
	 * @param 	id, array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS y el id
	 * @return  string Mensaje de Validacion
	 */
	public function ModificarEmpleado($id,$arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaEmpleados->updateRecord($id,$arrayDatos,'EMP_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Empleado: '.$e;
		}
	}
	public function EliminarEmpleado($id)
	{
		try{
			 $this->_resultado = $this->_tablaEmpleados->deleteRecord($id,'EMP_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Empleado: '.$e;
		}
	}
	public function VerificaRegistroExistenteEmpleado($email,$ruc)
	{
		echo $this->_consulta = $this->_tablaEmpleados->getRecords("COM_EMAIL='$email' OR COM_RUC = '$ruc' ",false,1);
		$numrows = mysql_num_rows($this->_consulta);
		if ($numrows!=0) { 
			echo "ya existe un registro con ese email o ese alias"; 
			exit();
		}
		else{
			echo "puede agregarse ese empleado";
		}
	}
}
?>