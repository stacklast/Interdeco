<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Companias.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Inscripcion
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Inscripcion
{
	/**
	 * $tablaUsuarios variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaParticipantes;//Objeto
	private  $_tablaPar_Paq;//Objeto tabla intermedia participantes y paquetes
	private  $_tablaTransporte;//Objeto
	private  $_tablaNochesExtras;//Objeto
	private  $_tablaContactoEmergencia;//Objeto
	private  $_tablaDetallesPersonales;//Objeto
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
		              array ('public', 'PAR_FECHAINICIO'),
		              array ('public', 'PAR_FECHAFIN'),
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
		              array ('public', 'PAR_COMENTARIOS'),
		              array ('public', 'PAR_SEGURO_DE_VIAJE'),
		              array ('public', 'PAR_TICKET_AEREO')
				);  //instanciamos base de datos
		$this->_tablaPar_Paq =new SQLConection ('par_paq');
		$fields = $this->_tablaPar_Paq->fields =array (
		              array ('public', 'PAR_ID'),
		              array ('public', 'PAQ_ID')
				);  //instanciamos base de datos
		$this->_tablaTransporte =new SQLConection ('ext_transporte');
		$fields = $this->_tablaTransporte->fields =array (
					  array ('private', 'EXT_TRA_ID', "' '"),
		              array ('public', 'PAR_ID'),
		              array ('public', 'EXT_TRA_CANTIDAD'),
		              array ('public', 'EXT_TRA_DESDE'),
		              array ('public', 'EXT_TRA_HASTA')
				);  //instanciamos base de datos
		$this->_tablaNochesExtras =new SQLConection ('ext_noches_extras');
		$fields = $this->_tablaNochesExtras->fields =array (
					  array ('private', 'EXT_NE_ID', "' '"),
		              array ('public', 'PAR_ID'),
		              array ('public', 'EXT_NE_LUGAR'),
		              array ('public', 'EXT_NE_CANTIDAD'),
		              array ('public', 'EXT_NE_HOSPEDAJE'),
		              array ('private', 'EXT_NE_VALOR', "' '"),
		              array ('public', 'EXT_NE_FECHAINICIO'),
		              array ('public', 'EXT_NE_FECHAFIN')
				);  //instanciamos base de datos
		$this->_tablaContactoEmergencia =new SQLConection ('cem_contactos_emergencia');
		$fields = $this->_tablaContactoEmergencia->fields =array (
					  array ('private', 'CEM_ID', "' '"),
		              array ('public', 'PAR_ID'),
		              array ('public', 'CEM_CONDICION_MEDICA'),
		              array ('public', 'CEM_NOMBRE'),
		              array ('public', 'CEM_APELLIDO'),
		              array ('public', 'CEM_TELEFONO'),
		              array ('public', 'CEM_EMAIL')
				);  //instanciamos base de datos
		$this->_tablaDetallesPersonales =new SQLConection ('dep_detalles_personales');
		$fields = $this->_tablaDetallesPersonales->fields =array (
					  array ('private', 'DEP_ID', "' '"),
		              array ('public', 'PAR_ID'),
		              array ('public', 'DEP_OCUPACION'),
		              array ('public', 'DEP_INTERESES'),
		              array ('public', 'DEP_NIVEL_ESTUDIOS'),
		              array ('public', 'DEP_NOMBRE_ESCUELA'),
		              array ('public', 'DEP_LUGAR_TRABAJO'),
		              array ('public', 'DEP_REDES_SOCIALES'),
		              array ('public', 'DEP_FORMA_ENCUENTRO'),
		              array ('public', 'DEP_COMPARACION'),
		              array ('public', 'DEP_FINANCIAMIENTO_VIAJE')
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
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarPar_Paq($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaPar_Paq->insertRecord($arrayDatos);
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
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarTransporte($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaTransporte->insertRecord($arrayDatos);
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
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarNochesExtras($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaNochesExtras->insertRecord($arrayDatos);
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
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarContactoEmergencia($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaContactoEmergencia->insertRecord($arrayDatos);
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
	 * InsertarUsuario 
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla USU_USUARIOS
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarDetallesPersonales($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaDetallesPersonales->insertRecord($arrayDatos);
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
}
?>