<?php
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Facturacion.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Facturacion
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Facturacion
{
	/**
	 * $tablaUsuarios variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaParticipantes;//Objeto
	private  $_tablaPar_Paq;//Objeto tabla intermedia participantes y paquetes
	private  $_tablaPaquetes;//Objeto
	private  $_tablaTransporte;//Objeto
	private  $_tablaNochesExtras;//Objeto
	private  $_tablaCabeceraFactura;//Objeto
	private  $_tablaDetalleFactura;//Objeto
	private  $_resultado;// bool true false
	private  $_consulta; //array();
	private  $_idParticipante;
	private  $_idPaquete;
	private  $_Paquete;

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
		$this->_tablaCabeceraFactura =new SQLConection ('fac_cabecera');
		$fields = $this->_tablaCabeceraFactura->fields =array (
		              array ('private', 'FAC_ID', "' '"),
		              array ('public', 'PAR_ID'),
		              array ('public', 'COM_ID'),
		              array ('public', 'FACT_NUMERO'),
		              array ('public', 'FAC_AUT_SRI'),
		              array ('public', 'FAC_FECHA'),
		              array ('public', 'FACT_FECHA_LIMITE'),
		              array ('public', 'FAC_DESCUENTO'),
		              array ('public', 'FAC_OBSERVACIONES'),
		              array ('public', 'FAC_ESTADO'),
		              array ('public', 'FAC_CLAVE_ACCESO')
				);  //instanciamos base de datos
		$this->_tablaDetalleFactura =new SQLConection ('det_detalle_factura');
		$fields = $this->_tablaDetalleFactura->fields =array (
		              array ('private', 'DET_ID', "' '"),
		              array ('public', 'FAC_ID'),
		              array ('public', 'DET_NOMBRE'),
		              array ('public', 'DET_APELLIDO'),
		              array ('public', 'DET_QTY'),
		              array ('public', 'DET_DESCRIPCION'),
		              array ('public', 'DET_TOTAL'),
		              array ('public', 'DET_COMENTARIOS'),
		              array ('public', 'DET_EXTRAS'),
		              array ('public', 'DET_SUBTOTAL'),
		              array ('public', 'DET_PAYPAL')
				);  //instanciamos base de datos
		$this->_tablaPar_Paq =new SQLConection ('par_paq');
		$fields = $this->_tablaPar_Paq->fields =array (
					  array ('private', 'Fecha', "'".date('Y-m-d')."'"),
		              array ('public', 'PAR_ID'),
		              array ('public', 'PAQ_ID')
				);  //instanciamos base de datos
		$this->_tablaPaquetes =new SQLConection ('paq_paquetes');
		$fields = $this->_tablaPaquetes->fields =array (
					  array ('private', 'PAQ_ID', "' '"),
		              array ('public', 'PAQ_NOMBRE')
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
	}
	/**
	 * InsertarParticipante
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla PAR_PARTICIPANTES
	 * @return  string Mensaje de Validacion
	 */
	public function ObtenerParticipante($variable)//devuelve  id del participante
	{
		try{
			$this->_consulta = $this->_tablaParticipantes->getRecords("PAR_EMAIL='$variable' OR PAR_NUMERO_PASAPORTE = '$variable' ",false,1);
				if($this->_consulta)
				{
					 $this->_idParticipante = $this->_consulta[0]['PAR_ID'];

					 return $this->_idParticipante;
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
	 * InsertarPar_Paq
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla PAR_PAQ
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
	public function ObtenerPaquete($idParticipante)
	{
		try{
			$this->_consulta = $this->_tablaPar_Paq->getRecords("PAR_ID='$idParticipante'",false,1);
				if($this->_consulta)
				{
					 $this->_idPaquete = $this->_consulta[0]['PAQ_ID'];

					 	$this->_consulta = $this->_tablaPaquetes->getRecords("PAQ_ID='$this->_idPaquete'",false,1);
							if($this->_consulta)
								{
									$this->_Paquete = $this->_consulta[0]['PAQ_NOMBRE'];

								return $this->_Paquete;
								}
								else
								{
								return "1";
								}
				}
				else
				{
					return "1";
				}
		}catch (Exception $e){
			return 'Se ha generado una Exception al Agregar Nuevo Participante: '.$e;
		}
	}
	public function ConsultarPago($idParticipante)
	{
		try{
			$this->_consulta = $this->_tablaParticipantes->getRecords("PAR_EMAIL='$variable' OR PAR_NUMERO_PASAPORTE = '$variable' ",false,1);
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
	/**
	 * InsertarTransporte
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla TRA_TRANSPORTE
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
	 * InsertarNochesExtras
	 * @param 	array(); Ingresamos Array de Datos de los campos de tabla ext_noches_extras
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
	public function Modulo11($codigoverificador)
	{
		if (is_numeric($codigoverificador)){
		      $digitos = strlen($codigoverificador);
		            // primero separamos los numeros
		        switch ($digitos){
		            case 47:
		                  $num = 0;
		                $num1 = substr ("$codigoverificador", 0, 1);
		                $num2 = substr ("$codigoverificador", 1, 1);
		                $num3 = substr ("$codigoverificador", 2, 1);
		                $num4 = substr ("$codigoverificador", 3, 1);
		                $num5 = substr ("$codigoverificador", 4, 1);
		                $num6 = substr ("$codigoverificador", 5, 1);
		                $num7 = substr ("$codigoverificador", 6, 1);
		                $num8 = substr ("$codigoverificador", 7, 1);
		                $num9 = substr ("$codigoverificador", 8, 1);
		                $num10 = substr ("$codigoverificador", 9, 1);
		                $num11 = substr ("$codigoverificador", 10, 1);
		                $num12 = substr ("$codigoverificador", 11, 1);
		                $num13 = substr ("$codigoverificador", 12, 1);
		                $num14 = substr ("$codigoverificador", 13, 1);
		                $num15 = substr ("$codigoverificador", 14, 1);
		                $num16 = substr ("$codigoverificador", 15, 1);
		                $num17 = substr ("$codigoverificador", 16, 1);
		                $num18 = substr ("$codigoverificador", 17, 1);
		                $num19 = substr ("$codigoverificador", 18, 1);
		                $num20 = substr ("$codigoverificador", 19, 1);
		                $num21 = substr ("$codigoverificador", 20, 1);
		                $num22 = substr ("$codigoverificador", 21, 1);
		                $num23 = substr ("$codigoverificador", 22, 1);
		                $num24 = substr ("$codigoverificador", 23, 1);
		                $num25 = substr ("$codigoverificador", 24, 1);
		                $num26 = substr ("$codigoverificador", 25, 1);
		                $num27 = substr ("$codigoverificador", 26, 1);
		                $num28 = substr ("$codigoverificador", 27, 1);
		                $num29 = substr ("$codigoverificador", 28, 1);
		                $num30 = substr ("$codigoverificador", 29, 1);
		                $num31 = substr ("$codigoverificador", 30, 1);
		                $num32 = substr ("$codigoverificador", 31, 1);
		                $num33 = substr ("$codigoverificador", 32, 1);
		                $num34 = substr ("$codigoverificador", 33, 1);
		                $num35 = substr ("$codigoverificador", 34, 1);
		                $num36 = substr ("$codigoverificador", 35, 1);
		                $num37 = substr ("$codigoverificador", 36, 1);
		                $num38 = substr ("$codigoverificador", 37, 1);
		                $num39 = substr ("$codigoverificador", 38, 1);
		                $num40 = substr ("$codigoverificador", 39, 1);
		                $num41 = substr ("$codigoverificador", 40, 1);
		                $num42 = substr ("$codigoverificador", 41, 1);
		                $num43 = substr ("$codigoverificador", 42, 1);
		                $num44 = substr ("$codigoverificador", 43, 1);
		                $num45 = substr ("$codigoverificador", 44, 1);
		                $num46 = substr ("$codigoverificador", 45, 1);
		                $num47 = substr ("$codigoverificador", 46, 1);
		            break;

		            case 48:
		                $num = substr("$codigoverificador", 0, 1);
		                $num1 = substr ("$codigoverificador", 1, 1);
		                $num2 = substr ("$codigoverificador", 2, 1);
		                $num3 = substr ("$codigoverificador", 3, 1);
		                $num4 = substr ("$codigoverificador", 4, 1);
		                $num5 = substr ("$codigoverificador", 5, 1);
		                $num6 = substr ("$codigoverificador", 6, 1);
		                $num7 = substr ("$codigoverificador", 7, 1);
		                $num8 = substr ("$codigoverificador", 8, 1);
		                $num9 = substr ("$codigoverificador", 9, 1);
		                $num10 = substr ("$codigoverificador", 10, 1);
		                $num11 = substr ("$codigoverificador", 11, 1);
		                $num12 = substr ("$codigoverificador", 12, 1);
		                $num13 = substr ("$codigoverificador", 13, 1);
		                $num14 = substr ("$codigoverificador", 14, 1);
		                $num15 = substr ("$codigoverificador", 15, 1);
		                $num16 = substr ("$codigoverificador", 16, 1);
		                $num17 = substr ("$codigoverificador", 17, 1);
		                $num18 = substr ("$codigoverificador", 18, 1);
		                $num19 = substr ("$codigoverificador", 19, 1);
		                $num20 = substr ("$codigoverificador", 20, 1);
		                $num21 = substr ("$codigoverificador", 21, 1);
		                $num22 = substr ("$codigoverificador", 22, 1);
		                $num23 = substr ("$codigoverificador", 23, 1);
		                $num24 = substr ("$codigoverificador", 24, 1);
		                $num25 = substr ("$codigoverificador", 25, 1);
		                $num26 = substr ("$codigoverificador", 26, 1);
		                $num27 = substr ("$codigoverificador", 27, 1);
		                $num28 = substr ("$codigoverificador", 28, 1);
		                $num29 = substr ("$codigoverificador", 29, 1);
		                $num30 = substr ("$codigoverificador", 30, 1);
		                $num31 = substr ("$codigoverificador", 31, 1);
		                $num32 = substr ("$codigoverificador", 32, 1);
		                $num33 = substr ("$codigoverificador", 33, 1);
		                $num34 = substr ("$codigoverificador", 34, 1);
		                $num35 = substr ("$codigoverificador", 35, 1);
		                $num36 = substr ("$codigoverificador", 36, 1);
		                $num37 = substr ("$codigoverificador", 37, 1);
		                $num38 = substr ("$codigoverificador", 38, 1);
		                $num39 = substr ("$codigoverificador", 39, 1);
		                $num40 = substr ("$codigoverificador", 40, 1);
		                $num41 = substr ("$codigoverificador", 41, 1);
		                $num42 = substr ("$codigoverificador", 42, 1);
		                $num43 = substr ("$codigoverificador", 43, 1);
		                $num44 = substr ("$codigoverificador", 44, 1);
		                $num45 = substr ("$codigoverificador", 45, 1);
		                $num46 = substr ("$codigoverificador", 46, 1);
		                $num47 = substr ("$codigoverificador", 47, 1);
		                $num48 = substr ("$codigoverificador", 48, 1);
		             break;
		        }
		        if ($digitos >=49){
		            echo "El numero que digitaste tiene $digitos numeros, y como maximo el codigoverificador tiene 48";
		        }
		        else {
		                if ($digitos <=47){
		                    echo "El numero que digitaste tiene $digitos numeros, y como minimo el codigoverificador tiene 47";                }
		                else{

		                     //ahora empieza la multiplicacion
		                      $nu = $num*3;
		                      $nu1 = $num1*2;
		                      $nu2 = $num2*7;
		                      $nu3 = $num3*6;
		                      $nu4 = $num4*5;
		                      $nu5 = $num5*4;
		                      $nu6 = $num6*3;
		                      $nu7 = $num7*2;
		                      $nu8 = $num8*7;
		                      $nu9 = $num9*6;
		                      $nu10 = $num10*5;
		                      $nu11 = $num11*4;
		                      $nu12 = $num12*3;
		                      $nu13 = $num13*2;
		                      $nu14 = $num14*7;
		                      $nu15 = $num15*6;
		                      $nu16 = $num16*5;
		                      $nu17 = $num17*4;
		                      $nu18 = $num18*3;
		                      $nu19 = $num19*2;
		                      $nu20 = $num20*7;
		                      $nu21 = $num21*6;
		                      $nu22 = $num22*5;
		                      $nu23 = $num23*4;
		                      $nu24 = $num24*3;
		                      $nu25 = $num25*2;
		                      $nu26 = $num26*7;
		                      $nu27 = $num27*6;
		                      $nu28 = $num28*5;
		                      $nu29 = $num29*4;
		                      $nu30 = $num30*3;
		                      $nu31 = $num31*2;
		                      $nu32 = $num32*7;
		                      $nu33 = $num33*6;
		                      $nu34 = $num34*5;
		                      $nu35 = $num35*4;
		                      $nu36 = $num36*3;
		                      $nu37 = $num37*2;
		                      $nu38 = $num38*7;
		                      $nu39 = $num39*6;
		                      $nu40 = $num40*5;
		                      $nu41 = $num41*4;
		                      $nu42 = $num42*3;
		                      $nu43 = $num43*2;
		                      $nu44 = $num44*7;
		                      $nu45 = $num45*6;
		                      $nu46 = $num46*5;
		                      $nu47 = $num47*4;
		                      $nu48 = $num48*3;

		                        //ahora empieza la suma
		                      $totalsum = $nu + $nu1 + $nu2 + $nu3 + $nu4 + $nu5 + $nu6 + $nu7
		                      + $nu8 + $nu9 + $nu10 + $nu11 + $nu12 + $nu13 + $nu14
		                      + $nu15 + $nu16 + $nu17 + $nu18 + $nu19 + $nu20 + $nu21
		                      + $nu22 + $nu23 + $nu24 + $nu25 + $nu36 + $nu37 + $nu28
		                      + $nu29 + $nu30 + $nu31 + $nu32 + $nu33 + $nu34 + $nu35
		                      + $nu36 + $nu37 + $nu38 + $nu39 + $nu40 + $nu41 + $nu42
		                      + $nu43 + $nu44 + $nu45 + $nu46 + $nu47 + $nu48 ;

		 // echo  $totalsum.'<br>'. $digitos.'<br>';
		                            //ahora la divicion
		                      $totaldiv = $totalsum / 11;

		                        //ahora sacamos el sobrante de la divicion
		                      $totalresu = $totalsum % 11;

		                        //ahora empieza la resta
		                      $totalres = 11 - $totalresu;

		                      //ahora mostramos el digito
		                      switch ($totalres){
		                              case 10:
				                              $digito = "1";
				                              break;

		                              case 11:
				                              $digito = "0";
				                              break;

		                              default:
				                              $digito = $totalres;
				                              break;
		                       }

		                      //  echo "el digito que quieres es <b>\"$digito\"</b><br>";
		                    }
		            }

		}
		else {

		    echo "Pusiste letras";
		}
	}
}
?>