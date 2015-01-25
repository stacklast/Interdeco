<?php 
/**
 *	@package Interdeco
 *	@subpackage Modelo
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file : Cls.DAO.Usuarios.php
 *	#DAO  : DATA ACCES OBJECT => Objeto de Acceso a Datos Indirecto
 *	#Clase: ClsDAO_Usuario
 */
require ('/../Conf.class.php');/*Incluimos el fichero de la clase Conf*/
require ('/../Db.class.php');/*Incluimos el fichero de la clase Db*/
require ('/../SQLConection.class.php');/*Incluimos el fichero de la clase SQLConection*/
class ClsDAO_Usuarios
{
	/**
	 * $tablaUsuarios variable de instancia para mantenimiento de la tabla
	 * @var objeto
	 */
	private  $_tablaUsuarios;//Objeto
	private  $_nombre;//String
	private  $_apellido;//String
	private  $_resultado;// bool true false
	private  $_consulta; //array();
	private  $_pass;//string 
	private  $_mail;//string
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
		$this->_tablaUsuarios =new SQLConection ('usu_usuario');
		$fields = $this->_tablaUsuarios->fields =array (
		              array ('private', 'USU_ID', "' '"),
		              array ('public', 'EMP_ID'),
		              array ('public', 'USU_ALIAS'),
		              array ('public', 'USU_PASSWORD'),
		              array ('public', 'USU_EMAIL'),
		              array ('public', 'USU_FECHA_REGISTRO',"'".date('yyyy/mm/dd hh:mm:ss')."'")
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
			 $this->_resultado = $this->_tablaUsuarios->insertRecord($arrayDatos);
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
			 $this->_resultado = $this->_tablaUsuarios->updateRecord($id,$arrayDatos,'USU_ID');
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
			 $this->_resultado = $this->_tablaUsuarios->deleteRecord($id,'USU_ID');
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
	/**
	 * ValidarUsuario
	 * @param String $email   
	 * @param Strinf $password Encriptado con MD5SALT
	 */
	public function ValidarUsuario($email,$password,$recordar){
		try{
			 $this->_consulta = $this->_tablaUsuarios->getRecords("USU_EMAIL='$email' OR USU_PASSWORD = '$password' ",false,1);
			//var_dump($this->_consulta);
			if($this->_consulta)
				{
					 $this->_pass     = $this->_consulta[0]['USU_PASSWORD'];
					 $this->_mail     = $this->_consulta[0]['USU_EMAIL'];
					 /**
					 * $bd variable que instancia la conexion a BD
					 * @var objeto
					 */
					 $bd=Db::getInstance();	
					 $id =  $this->_consulta[0]['EMP_ID'];
					 /*Creamos una query sencilla*/
					 $sql="SELECT EMP_NOMBRE, EMP_APELLIDO FROM emp_empleados WHERE EMP_ID = $id";

						/*Ejecutamos la query*/
						$stmt=$bd->ejecutar($sql);

						/*Realizamos un bucle para ir obteniendo los resultados*/
						while ($x=$bd->obtener_fila($stmt,0)){
						  // echo $x['USU_NOMBRE'].'<br />';
							$nombre = $x['EMP_NOMBRE'];
							$apellido= $x['EMP_APELLIDO'];
						}
					 $this->_nombre   = $nombre;
					 $this->_apellido = $apellido;
					//si el password y el email coinciden con la BD
					if($this->_pass==$password && $email == $this->_mail){
						session_start();
						$_SESSION['usuario']  = $this->_nombre.' '.$this->_apellido;
						$_SESSION['password'] = $this->_pass ;
						//echo $recordar;
						if($recordar == "recordarme")
						{
						setcookie ('usuario', $this->_nombre.' '.$this->_apellido,  time()+(60*60*24*365));
						setcookie ('password', $this->_pass,  time()+(60*60*24*365));
						}
						$variable = $this->_nombre.' '.$this->_apellido;
					}
					else{
						// si solo la contraseña es correcta
						if($password == $this->_pass){
							$variable = '1';
						}
						// si solo el correo es correcto
						else if($email == $this->_mail){
							$variable = '2';
						}
						// si ninguno es correcto
						else{
							$variable = '3';
						}
					}
					return $variable; // valor impreso para respuesta AJAX	
			}else{
				echo mysql_error();
				$variable = '3';
				return $variable; // valor impreso para respuesta AJAX	
			}
			
		}catch (Exception $e){
			echo 'Se ha generado una Exception al Validar Usuario: '.$e;
			return 'Se ha generado una Exception al Validar Usuario: '.$e;
		}
	}
	public function VerificaRegistroExistenteUsuario($email,$alias)
	{
		echo $this->_consulta = $this->_tablaUsuarios->getRecords("USU_EMAIL='$email' OR USU_ALIAS = '$alias' ",false,1);
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