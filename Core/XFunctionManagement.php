<?php
	include_once 'HeaderManagement.php';

	class XFunctionManagement extends XVersionManagement
	{
		// TODO: get class name
		public static function className() {
			return get_class();
		}

		private $m_debuging = false;
		private $_token = "";
		public $_functions = array();

		protected $m_platform = null;
		protected $m_runtime = null;
		protected $m_error = null;
		protected $m_database = null;

		//===============================================================================
		public function __construct( XPlatform &$m_platform, XAppRuntime &$m_runtime, XErrorManagement $m_error, XDatabaseManagement &$m_database )
		{
			$this->m_platform = $m_platform;
			$this->m_runtime = $m_runtime;
			$this->m_error = $m_error;
			$this->m_database = $m_database;
		}

		//===============================================================================
		public function runningDebuger( $m_debuger )
		{
			$this->m_debuging = $m_debuger;
		}

		//===============================================================================
		public function setToken( $m_token )
		{
			$this->_token = $m_token;
		}

		public function getToken()
		{
			return $this->_token;
		}

		//===============================================================================
		public function __debugging( $__debuging_function )
		{
			if ( $this->m_debuging )
				$__debuging_function();
		}

		public function __initialization( $__function )
		{
			$__function();
		}

		//===============================================================================
		public function runToken()
		{
			if ( !array_key_exists($this->getToken(), $this->_functions) )
				XLog::log(
					array(
						'm_status' => false,
						'm_version' => $this->m_platform->get_version(),
						'm_runtime' => $this->m_runtime->get(),
						'm_message' => 'token not exist',
						'm_function' => 'NaN',
						'm_token' => $this->getToken()
					)
				);

			if(!array_search( $this->_functions[$this->getToken()], get_class_methods($this)))
				XLog::log(
					array(
						'm_status' => false,
						'm_version' => $this->m_platform->get_version(),
						'm_runtime' => $this->m_runtime->get(),
						'm_message' => 'function not exist',
						'm_function' => $this->_functions[$this->getToken()],
						'm_token' => $this->getToken()
					)
				);

			call_user_func(
				array(XFunctionManagement::className(),
					$this->_functions[$this->getToken()])
			);
		}

		//===============================================================================
		//===============================================================================
		//===============================================================================
		// ### all function defined here...

		public function get_about()
		{
			XLog::log(
				array(
					'm_status' => true,
					'm_runtime' => $this->m_runtime->get(),
					'm_version' => $this->m_platform->get_version(),
					'm_functionName' => $this->_functions[$this->getToken()],
					'm_token' => $this->getToken(),
					'm_version_log' => $this->m_platform->get_version_log()
				)
			);
		}

		//===============================================================================
		public function my_example_function()
		{
			//TODO: array of input
			$m_array = array(
				'm_arg1' => '',
				'm_arg2' => ''
			);

			//TODO: sqlinection blocked here..
			$this->m_database->fixArrayInput($m_array);

			//TODO: validation get data
			$this->m_error->GET($m_array);

			XLog::log(
				array(
					'm_status' => true,
					'm_runtime' => $this->m_runtime->get(),
					'm_version' => $this->m_platform->get_version(),
					'm_functionName' => $this->_functions[$this->getToken()],
					'm_token' => $this->getToken(),
					'm_array' => $m_array
				)
			);
		}

		//===============================================================================
		public function my_example_function_post()
		{
			//TODO: array of input
			$m_array = array(
				'm_arg1' => '',
				'm_arg2' => ''
			);

			//TODO: sqlinection blocked here..
			$this->m_database->fixArrayInput($m_array);

			//TODO: validation post data
			$this->m_error->POST($m_array);

			XLog::log(
				array(
					'm_status' => true,
					'm_runtime' => $this->m_runtime->get(),
					'm_version' => $this->m_platform->get_version(),
					'm_functionName' => $this->_functions[$this->getToken()],
					'm_token' => $this->getToken(),
					'm_array' => $m_array
				)
			);
		}
	}

?>
