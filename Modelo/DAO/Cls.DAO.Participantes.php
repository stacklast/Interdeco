<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Companias.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Participantes
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Participantes
{
	/**
	 * $tablaUsuarios variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaParticipantes;//Objeto
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
		 * $this->tablaUsuarios instancia al objeto de manipulacion de BD
		 * @var SQLConection
		 * @param String Nombre de la Tabla de BD a Usar
		 */
		$this->_tablaParticipantes =new SQLConection ('par_participantes');
		$fields = $this->_tablaParticipantes->fields =array (
		              array ('private', 'PAR_ID', "' '"),
		              array ('public', 'COM_ID'),
		              array ('public', 'PAR_FECHA'),
		              array ('public', 'PAR_NOMBRE'),
		              array ('public', 'PAR_APELLIDO'),
		              array ('public', 'PAR_GENERO'),
		              array ('public', 'PAR_FECHA_NACIMIENTO'),
		              array ('public', 'PAR_NUMERO_PASAPORTE'),
		              array ('public', 'PAR_NACIONALIDAD'),
		              array ('public', 'PAR_DIRECCION'),
		              array ('public', 'PAR_PAIS'),
		              array ('public', 'PAR_PROVINCIA_ESTADO'),
		              array ('public', 'PAR_CIUDAD'),
		              array ('public', 'PAR_ZIP_POSTAL'),
		              array ('public', 'PAR_TELEFONO'),
		              array ('public', 'PAR_EMAIL'),
		              array ('public', 'PAR_ESTADO'),
		              array ('public', 'PAR_AGENTE'),
		              array ('public', 'PAR_INFO_VUELO'),
		              array ('public', 'PAR_HOSPEDAJE'),
		              array ('public', 'PAR_COMENTARIOS')
				);  //instanciamos base de datos
	}
	/**
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarParticipante($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaParticipantes->insertRecord($arrayDatos);
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Agregar Nuevo Participante: '.$e;
		}
	}
	/**
	 * ModificarUsuario 
	 * @param 	id, array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS y el id
	 * @return  string Mensaje de Validacion
	 */
	public function ModificarParticipante($id,$arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaParticipantes->updateRecord($id,$arrayDatos,'PAR_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Participante: '.$e;
		}
	}
	public function EliminarParticipante($id)
	{
		try{
			 $this->_resultado = $this->_tablaParticipantes->deleteRecord($id,'PAR_ID');
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Modificar Participante: '.$e;
		}
	}
	public function VerificaRegistroExistenteParticipante($email,$ruc)
	{
		echo $this->_consulta = $this->_tablaParticipantes->getRecords("COM_EMAIL='$email' OR COM_RUC = '$ruc' ",false,1);
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