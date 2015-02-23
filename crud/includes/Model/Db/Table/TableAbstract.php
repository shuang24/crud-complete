<?php
namespace Model\Db\Table;

use Model\Db\Adapter;
use Model\Db\Row;
use \PDO;
use Model\Db\Row\RowInterface;

abstract class TableAbstract implements TableInterface{

	/*
	 * Db adapter
	 */
	protected $_adapter;

	/**
	 * The table name.
	 *
	 * @var string
	 */
	protected $_name = null;

	/**
	 * Classname for rowset
	 *
	 * @var string
	 */
	protected $_rowClass = "Row";
	protected $_rowClassObject;

	public function __construct($rowClassObject=null,$dbAdapter=null)
	{
		if($dbAdapter){
			$this->_adapter = $dbAdapter;
		}else{
			$this->_adapter =  Adapter::getAdapter();
		}
		if($rowClassObject){
			$this->_rowClassObject = $rowClassObject;
		}
	}

	/**
	 * Get table name
	 *
	 * @return string
	 */
	public function getTable()
	{
		return $this->_name;
	}

	/**
	 * Get adapter
	 *
	 * @return AdapterInterface
	 */
	public function getAdapter()
	{
		return $this->_adapter;
	}

	private function _buildWhere($where=null){

		$whereValues = array();

		if(is_array($where)){
			$whereKeys = array();


			foreach($where as $key=>$value){
				$whereKeys[] = $key . "=?";
				$whereValues[] = $value;
			}

			$where = " WHERE ".implode(" AND ", $whereKeys);

		} elseif (is_string($where) && $where != ""){
			$where = " WHERE ".$where;

		}

		return array($where,$whereValues);
	}

	public function select($where=null,$limit = null,$sort=null){
		$sql = "SELECT * FROM ".$this->_name;

		list($where,$whereValues) = $this->_buildWhere($where);

		$sql .= $where;



		if($limit != null){
			$sql .= " LIMIT ".$limit;
		}

		if($sort != null ){
			$sql .=" ORDER BY ".$sort;
		}

		//echo $sql;

		$stmt = $this->_adapter->prepare($sql);

		$stmt->execute($whereValues);
		return $stmt;
	}

	public function fetchAll($where=null,$limit = null,$sort=null){
		$stmt = $this->select($where,$limit,$sort);
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$rowSets = array();

		foreach ($rows as $row){

			$data = array(
	            'table'   => $this,
	            'data'     => $row,
			);

			$rowObj =  $this->getRowOject($data);

			$rowSets[] = $rowObj;
		}

		if(count($rowSets)==0){
			return false;
		}

		return $rowSets;
	}

	protected function getRowOject($data){
		if($this->_rowClassObject){
			$rowOject = clone $this->_rowClassObject;
		}else{
			$rowOject = new $this->_rowClass();
		}
		
		//(get_class($rowOject));
		
		if($rowOject instanceof RowInterface){
			$rowOject->assignData($data);
		}else{
			throw new \Exception("Wrong row class provided");
		}
		
		return $rowOject;
	}
	public function fetchRow($where=null,$sort=null){
		$stmt = $this->select($where,1,$sort);

		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(count($rows)==0){
			return false;
		}
		$row = $rows[0];
		$data = array(
            'table'   => $this,
            'data'     => $row,
		);



		$rowObj = $this->getRowOject($data);


		return $rowObj;
	}

	function getById($id,$field = "id"){
		return $this->fetchRow(array($field=>$id));
	}


	public function insert($set){
		$sql = "INSERT INTO ".$this->_name;
		foreach($set as $key=>$value){
			$cols[] ="`". $key . "`";
			$valuePlaceholders [] = "?";
			$values[] = $value;
		}

		$sql .= "(".implode(",", $cols).") VALUES (".implode(", ", $valuePlaceholders)." )";



		$stmt = $this->_adapter->prepare($sql);

		$stmt->execute($values);

		return $this->_adapter->lastInsertId();

	}

	public function update($set, $where = null){

		if(isset($set['id'])){
			unset($set['id']);
		}

		$sql = "UPDATE	 ".$this->_name ." SET ";
		foreach($set as $key=>$value){
			$cols[] ="`". $key . "` = ?";
			$values[] = $value;
		}

		$sql .= implode(", ", $cols);

		list($where,$whereValues) = $this->_buildWhere($where);
		$sql .= $where;

		if(!empty($whereValues)){
			foreach ($whereValues as $value){
				$values[] = $value;
			}
				
		}

		$stmt = $this->_adapter->prepare($sql);
		$stmt->execute($values);

		$affected_rows = $stmt->rowCount();
	}
	public function delete($where){
		$sql = "DELETE FROM	 ".$this->_name;
		list($where,$whereValues) = $this->_buildWhere($where);
		$sql .= $where;

		$stmt = $this->_adapter->prepare($sql);

		$stmt->execute($whereValues);

		return $affected_rows = $stmt->rowCount();
	}
}