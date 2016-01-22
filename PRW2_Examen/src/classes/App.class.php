<?php
namespace src\classes;

use src\classes\Core\Db\ConnectPDO;

class App
{
	private static $config = array();
	private static $database;
	
	//Singleton
	private static $_instance = null;
	public static function init($config) {
		if(is_null(self::$_instance)){
			$c = __CLASS__;
			//$c = get_called_class(); 
			self::$_instance = new $c($config);
		}
		return self::$_instance;
	}

	public function controller(){
		//Empêche à l'utilisateur d'entrer n'importe quoi dans l'url
		$control = new Controller(array_map('htmlentities', $_GET), array_map('htmlentities', $_POST));
	}

	protected function __construct($config)
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
		if(count($config) != 4){
			throw new \Exception("Le nombre d'arguments n'est pas valable!");
		}
		self::$config = $config;
		$this->controller();
		//$this->db();
	}

	static function autoload($className)
	{
		$file = str_replace('\\', '/', $className) . '.class.php';
		if (file_exists($file))
			require_once $file;
		else
			throw new \Exception("Fichier " . $file . " introuvable");
	}

	public static function db()
	{
		if(empty(self::$config)){
			throw new \Exception("Veuillez exécuter App::init() auparavant!");
		}
		elseif(self::$database === null){
			self::$database = new ConnectPDO(self::$config);
		}
		return self::$database;
	}
}

?>