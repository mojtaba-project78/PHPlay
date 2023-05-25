<?php

	include_once 'HeaderManagement.php';

	// TODO: here we define database auth
	trait __database_connection
	{
		protected $hostname = "localhost";
		protected $database = "databaseName";
		protected $username = "root";
		protected $password = "";
	}

	// TODO: here we should define all table we have
	trait TB_ADMIN
	{
		public static $TB = 'admin_tb';
		public static $INDEX = 'm_index';
		public static $USERNAME = 'm_username';
		public static $PASSWORD = 'm_password';
		public static $KEY = 'm_key';
	}

	class XDatabaseManagement
	{
		// TODO: using traits here..
		use __database_connection;

		private $_db;
		private $is_connected;
		private $_db2;

		private $m_platform = null;
		private $m_runtime = null;

		//===============================================================================
		// TODO: get class name
		public static function className(){
			return get_class();
		}

		//===============================================================================
		public function __construct( XPlatform &$m_platform = null, XAppRuntime &$m_runtime )
		{
			$this->m_platform = $m_platform;
			$this->m_runtime = $m_runtime;

			try {
				$this->_db = new PDO(sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", $this->hostname, $this->database), $this->username, $this->password);
				$this->_db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$this->is_connected = true;

				// TODO: using for section SQLInjection
				$this->_db2 = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
			} catch ( PDOException $pdo ) {
				$this->is_connected = false;
				XLog::log(
					array(
						"version" => $this->m_platform->get_version(),
						'm_runtime' => $this->m_runtime->get(),
						"status" => false,
						"data" => sprintf("cannot connect to database [ %s ], %s", $this->database, $pdo->getMessage())
					)
				);
			}
		}

		//===============================================================================
		public function fixSingleInput( $query )
		{
			return htmlspecialchars(mysqli_escape_string($this->_db2, $query));
		}

		//===============================================================================
		public function fixArrayInput( array $mArray )
		{
			foreach ( $mArray as $paramName => $paramValue ) {
				$mArray[ $paramName ] = $this->fixSingleInput($paramValue);
			}
			return $mArray;
		}

		//===============================================================================
		public function pagination($query, $page = 1) {

			$res = $this->db()->prepare($query);
			$res->execute();
			$total_data = $res->rowCount();

			$itemInPage = MAXIMUM_ELEMENTS;

			if ( $total_data > 0 )
				$total_pages = ceil($total_data / $itemInPage);
			else
				$total_pages = 1;

			$to = $total_data - ($page * $itemInPage);
			$from = $to + $itemInPage;

			if ( $to < 1 )
				$to = 0;

			if ( $to == 0 )
				$itemInPage = $from;

			$query = sprintf("%s limit %u OFFSET %u", $query, $itemInPage, $to);

			$data = $this->db()->query(
				$query
			)->fetchAll(PDO::FETCH_ASSOC);

			$data = array_reverse($data);

			return array(
				"m_total_page" => $total_pages,
				"m_page" => (int)$page,
				'm_query' => $query,
				'm_data' => $data
			);
		}

		//===============================================================================
		public function db() {
			return $this->_db;
		}
	}

?>