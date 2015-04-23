<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Pago.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Pago
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Pago
{
	/**
	 * $tablaUsuarios variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaPago;//Objeto
	private  $_resultado;// bool true false

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
		$this->_tablaPago =new SQLConection ('pag_pagos');
		$fields = $this->_tablaPago->fields =array (
		              array ('private', 'PAG_ID', "' '"),
		              array ('public', 'PAR_ID'),
		              array ('public', 'PAG_FORMA_PAGO'),
		              array ('public', 'PAG_NUM_TRANSACCION'),
		              array ('public', 'PAG_DESCUENTO'),
		              array ('public', 'PAG_VALOR'),
		              array ('public', 'PAG_FECHA'),
		              array ('public', 'PAG_OBSERVACION'),
		              array ('public', 'PAG_ESTADO')
				);  //instanciamos base de datos
	}
	/**
	 * InsertarPago
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla pag_pagos
	 * @return  string Mensaje de Validacion
	 */
	public function InsertarPago($arrayDatos)
	{
		try{
			 $this->_resultado = $this->_tablaPago->insertRecord($arrayDatos);
			if($this->_resultado)
			{
				return 'Exito';
			}
			else
			{
				return "1";
			}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Agregar Nuevo Pago: '.$e;
		}
	}
	public function ConsultarPago($id)
	{
		try{
			$this->_consulta = $this->_tablaPago->getRecords("PAR_ID='$id'",false,1);
			if($this->_consulta)
				{
					return $this->_consulta;
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