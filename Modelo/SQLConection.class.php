<?php


/** Clase abstracta para el manejo de datos en tablas
* @author: Original de Leonardo Molina; lama_amx AT hotmail DOT com
* @author: Adaptación y mejoras por Edwin Benalcázar E.
* @version 3.0 2008-12-17
*/
class SQLConection {
	/** Nombre de la tabla */
	public $table;
	/** definicion de campos de la tabla
	** @code: $instance->fields =array (	array (fieldName, class, defaultValue), ...	);
	fieldName: nombre del campo en la tabla
	class: tipo de campo (public, private, system)
	*/
	public $fields;
	/** Si es verdadero los métodos de esta clase devuelven un recurso MySQL; si no, una matriz asociativa */
	private $returnSQLResult =false;
	/**
	** $table Nombre de la tabla que se manejará por esta instancia
	*/
	public function __construct ($table){
		$this->table =$table;
		$this->fields =array ();
		}

////////		Public Methods

	/** Devuelve los registros de la tabla
	* @param $where_str: Cadena=''. Condición para filtrar resultados.
	* @param $order_str: Cadena=''. Campo sobre el que se ordenarán los registros.
	* @param $count: Entero =false . Número de registros a devolver. Si es false, toda la tabla
	* @param $start: Entero =0. Indica a partir de qué registros se devuelven datos, por default 0.
	*/
	public function getRecords ($where_str=false, $order_str=false, $count=false, $start=0){
		$where =$where_str ? "WHERE $where_str" : "";
		$order =$order_str ? "ORDER BY $order_str" : "";
		$limit = $count ? "LIMIT $start, $count" : "";
		$campos =$this->getAllFields ();
		$query ="SELECT $campos FROM {$this->table} $where $order $limit";
		//echo $query;
		//echo $this->sql ($query);
		return $this->returnSQLResult ? mysql_query ($query) : $this->sql ($query);
		}
	/** Devuelve un registro de la tabla
	* @param $id: Entero. Id del registro a devolver.
	*/
	public function getRecord ($id){
		//echo $id;
		return $this->getRecords ("ID=$id", false, 1);
		}
	public function insertRecord ($data){
		$campos =$this->getTableFields ();
		$sysData =$this->getDefaultValues ();
		$data =implode ("', '", $data);
		$query ="INSERT INTO {$this->table} ($campos) VALUES ($sysData, '$data')";
		//echo $query;
		mysql_query ($query);
		return $this->validateOperation ();
		}
	public function updateRecord ($id, $data, $campoid){
		$campos =$this->getEditableFields (true);
		$datos =array ();
		foreach ($campos as $ind => $campo){
			$current_data =$data[$ind];
			array_push ($datos, "$campo='$current_data'");
			}
		$datos = implode (", ", $datos);
		$query = "UPDATE {$this->table} SET $datos WHERE $campoid ='$id'";
		//echo $query;
		mysql_query ($query);
		return $this->validateOperation ();
		}
	public function deleteRecord ($id,$campoid){
		mysql_query ("DELETE FROM {$this->table} WHERE $campoid='$id'");
		return $this->validateOperation ();
		}

////////		Private Methods

	private function getFieldsByType ($type=''){
		$return =array ();
		$types =explode ('|', $type);
		foreach ($this->fields as $field){
			$includeField =false;
			foreach ($types as $t){
				if ($field[0] == $t){
					array_push ($return, $field);
					}
				}
			}
		return $return;
		}
	private function getNameFields ($type){
		$return =array ();
		$fields =$this->getFieldsByType ($type);
		foreach ($fields as $field){
			array_push ($return, $field[1]);
			}

			//var_dump($return); 
		return $return;
		}
	private function getEditableFields ($asArray=false){
		$return =$this->getNameFields ('public');
		return $asArray ? $return : implode (', ', $return);
		}
	private function getTableFields ($asArray=false){
		$return1 =$this->getNameFields ('private');
		$return2 =$this->getNameFields ('public');
		$return = array_merge($return1, $return2);
		return $asArray ? $return : implode (', ', $return);
		}
	private function getAllFields ($asArray=false){
		$return =$this->getNameFields ('public|private|system');
		return $asArray ? $return : implode (', ', $return);
		}
	private function getDefaultValues ($asArray=false){
		$return =array ();
		$fields =$this->getFieldsByType ('private');
		foreach ($fields as $field){
			array_push ($return, $field[2]);
			}
		return $asArray ? $return : implode (', ', $return);
		}
	private function validateOperation (){
		echo mysql_error();
		return mysql_error()=='' ? true : false;
		}
	private function sql ($consulta){
       //echo $consulta;
		$consQ =mysql_query ($consulta);
		$resultado =array ();
		if ($consQ){
			while ($consF =mysql_fetch_assoc ($consQ))
				array_push ($resultado, $consF);
			}
		return $resultado;
		}
}
?>
