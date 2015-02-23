<?php
namespace Model\Db\Row;

use Model\Db\Adapter;
use ArrayAccess;
use Countable;
use Model\Db\Table\TableAbstract;

class Row implements ArrayAccess, Countable, RowInterface{

	protected $_idFieldName = 'id';
	protected $_table = null;
	protected $_tableClass = null;


	/**
	 * @var array
	 */
	protected $data = array();


	public function __construct(array $config = array()){

		$this->assignData($config);
			
	}

	public function assignData(array $config = array()){
		if (isset($config['table']) && $config['table'] instanceof TableAbstract) {
			$this->_table = $config['table'];
			$this->_tableClass = get_class($this->_table);
		} elseif ($this->_tableClass !== null) {
			$this->_table = new $this->_tableClass();
		}

		if (isset($config['data'])) {
			if (!is_array($config['data'])) {
				throw new Exception('Data must be an array');
				$this->_table = $config['table'];
				$this->_tableClass = get_class($this->_table);
			}elseif($this->_tableClass!==null){
				$this->_table = new $this->_tableClass();
			}

			if(isset($config['data'])){
				if(!is_array($config['data'])){
					throw new Exception('Data must be an array');
				}
				$this->data = $config['data'];
			}
		}
	}
	public function getTable(){
		return $this->_table;
	}


	public function getId(){
		return $this->data[$this->_idFieldName];
	}

	public function setId($id){
		$this->data[$this->_idFieldName] = $id;
		return $this;
	}

	function rowExistsInDatabase(){
		return $this->getId()?true:false;
	}

	function setData($data){
		$this->data = $data;
		return $this;
	}
	/**
	 * Save
	 *
	 * @return int
	 */
	public function save()
	{

		$data = $this->data;

		if ($this->rowExistsInDatabase()) {

			// UPDATE
			$this->getTable()->update($data,array($this->_idFieldName=>$this->getId()));

		} else {
			// INSERT
			$id = $this->getTable()->insert($data);
			$this->setId($id);

		}

		return $this;

	}

	/**
	 * Delete
	 *
	 * @return int
	 */
	public function delete()
	{

		$affectedRows = $this->getTable()->delete(array($this->_idFieldName=>$this->getId()));

		if ($affectedRows == 1) {
			// detach from database
			$this->data = array();
		}

		return $affectedRows;
	}

	/**
	 * Offset Exists
	 *
	 * @param  string $offset
	 * @return bool
	 */
	public function offsetExists($offset)
	{
		return array_key_exists($offset, $this->data);
	}

	/**
	 * Offset get
	 *
	 * @param  string $offset
	 * @return mixed
	 */
	public function offsetGet($offset)
	{
		return $this->data[$offset];
	}

	/**
	 * Offset set
	 *
	 * @param  string $offset
	 * @param  mixed $value
	 * @return RowGateway
	 */
	public function offsetSet($offset, $value)
	{
		$this->data[$offset] = $value;
		return $this;
	}

	/**
	 * Offset unset
	 *
	 * @param  string $offset
	 * @return AbstractRowGateway
	 */
	public function offsetUnset($offset)
	{
		$this->data[$offset] = null;
		return $this;
	}

	/**
	 * @return int
	 */
	public function count()
	{
		return count($this->data);
	}

	/**
	 * To array
	 *
	 * @return array
	 */
	public function toArray()
	{
		return $this->data;
	}

	/**
	 * __get
	 *
	 * @param  string $name
	 * @throws Exception\InvalidArgumentException
	 * @return mixed
	 */
	public function __get($name)
	{
		//var_dump($name);
		if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
		} else {
			throw new \Exception('Not a valid column in this row: ' . $name);
		}
	}

	/**
	 * __set
	 *
	 * @param  string $name
	 * @param  mixed $value
	 * @return void
	 */
	public function __set($name, $value)
	{
		$this->offsetSet($name, $value);
	}

	/**
	 * __isset
	 *
	 * @param  string $name
	 * @return bool
	 */
	public function __isset($name)
	{
		return $this->offsetExists($name);
	}

	/**
	 * __unset
	 *
	 * @param  string $name
	 * @return void
	 */
	public function __unset($name)
	{
		$this->offsetUnset($name);
	}



}