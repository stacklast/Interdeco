<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Programas.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Programas
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Programas
{
	/**
	 * $tablaProgramas variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaProgramas;//Objeto
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
		 * $this->_tablaProgramas instancia al objeto de manipulacion de BD
		 * @var SQLConection
		 * @param String Nombre de la Tabla de BD a Usar
		 */
		$this->_tablaProgramas =new SQLConection ('pro_programas');
		$fields = $this->_tablaProgramas->fields =array (
		              array ('private', 'PRO_ID', "' '"),
		              array ('public', 'DET_ID'),
		              array ('public', 'PAR_ID'),
		              array ('public', 'PRO_NOMBRE'),
		              array ('public', 'PRO_DIAS'),
		              array ('public', 'PRO_SEMANAS'),
		              array ('public', 'PRO_FECHA_INICIO'),
		              array ('public', 'PRO_FECHA_FINALIZACION'),
		              array ('public', 'PRO_TARIFA')
				);  //instanciamos base de datos
	}
	/**
	 * InsertarPrograma
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarPrograma($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaProgramas->insertRecord($arrayDatos);
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Agregar Nuevo Programa: '.$e;
		}
	}
	/**
	 * ModificarUsuario 
	 * @param 	id, array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS y el id
	 * @return  string Mensaje de Validacion
	 */
	public function ModificarPrograma($id,$arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaProgramas->updateRecord($id,$arrayDatos,'PRO_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Programa: '.$e;
		}
	}
	public function EliminarPrograma($id)
	{
		try{
			 $this->_resultado = $this->_tablaProgramas->deleteRecord($id,'PRO_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Programa: '.$e;
		}
	}
	public function VerificaRegistroExistentePrograma($email,$ruc)
	{
		echo $this->_consulta = $this->_tablaProgramas->getRecords("COM_EMAIL='$email' OR COM_RUC = '$ruc' ",false,1);
		$numrows = mysql_num_rows($this->_consulta);
		if ($numrows!=0) { 
			echo "ya existe un registro con ese email o ese alias"; 
			exit();
		}
		else{
			echo "puede agregarse esa compania";
		}
	}
}
?>