<?php
use Model\Db\Row\Adapter;

class View{
	protected $_basePath=null;
	protected $_file = null;
	protected $_extensions = array('html','php','phtml');
	
	function __construct($basePath=null,$renderScript=null){
		
		if($basePath != null){
			$this->setBasePath($basePath);
		}
		
		if($renderScript != null){
			$this->_script($renderScript);
		}
	}
	function setBasePath($path){
		$this->_basePath = $path;
		return $this;
	}
	
	function getBasePath(){
		return $this->_basePath;
	}
	
	function render($renderScript=null,$output = true){
		// find the script file name using the parent private method
		if($renderScript != null){
			$this->_script($renderScript);
		}
		
		if (empty($this->_file) || !is_readable($this->_file)) {
			
			throw new \Exception("No view file found.");	
		}
	
		//echo $this->_file;die();
		
		
		
		unset($name); // remove $name from local scope
		
		ob_start();
		$this->_run($this->_file);
		
		$content =  ob_get_clean(); 
		
		if($output){
			echo $content;
		}else{
			return $content;
		}
		
		
	}
	
	
	/**
	 * Finds a view script from the available directories.
	 *
	 * @param string $name The base name of the script.
	 * @return void
	 */
	protected function _script($name)
	{
		
	
		if ($this->_basePath==null) {		
			throw new \Exception('no view script directory set; unable to determine location for view script');			 
		}
		
	
	
		
		if (is_readable($this->_basePath .'/'. $name)) {
			return $this->_file =  $this->_basePath  .'/'. $name;
		}
		
		foreach($this->_extensions as $extension){
			if (is_readable($this->_basePath .'/'. $name.'.'.$extension)) {
				return $this->_file =  $this->_basePath .'/'. $name.'.'.$extension;
			}
		}
		
	
		
		$message = "script '$name' not found in path ("	. $this->_basePath	. ")";
		throw new \Exception($message);	
	}
	
	/**
	 * Includes the view script in a scope with only public $this variables.
	 *
	 * @param string The view script to execute.
	 */
	protected function _run()
	{
		
		include func_get_arg(0);
		
	}
	
	public function helper($name){
		$className = 'Helper\\' . $name;
		if(class_exists($className)){
			return new $className();
		}
		
		return false;
		
	}
}