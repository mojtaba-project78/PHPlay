<?php

	include_once 'HeaderManagement.php';

	class XErrorManagement
	{
		// TODO: get class name
		public static function className()
		{
			return get_class();
		}

		protected $m_runtime = null;
		protected $m_platform = null;
		protected $m_log = null;

		public function __construct( XPlatform &$m_platform, XAppRuntime &$m_runtime, XLog &$m_log )
		{
			$this->m_runtime = $m_runtime;
			$this->m_platform = $m_platform;
			$this->m_log = $m_log;
		}

		public function POST( &$m_array )
		{
			foreach ( $m_array as $paramName => $paramValue )
				if ( !isset($_POST[ $paramName ]) )
					$this->m_log->log(
						array(
							'm_status' => false,
							'm_paramName' => $paramName,
							'm_method' => __FUNCTION__,
							'm_message' => sprintf('not found in { %s } method.', __FUNCTION__)
						)
					);
				else
					$m_array[ $paramName ] = $_POST[ $paramName ];

			foreach ( $m_array as $paramName => $paramValue )
				if ( strcmp($paramValue, 'null') != 0 )
					if ( empty($paramValue) == true )
						$this->m_log->log(
							array(
								'm_status' => false,
								'm_paramName' => $paramName,
								'm_paramValue' => $paramValue,
								'm_method' => __FUNCTION__,
								'm_message' => 'paramValue is not defined.'
							)
						);

			$m_array = array_replace($m_array, $_POST);
		}

		public function GET( &$m_array )
		{
			foreach ( $m_array as $paramName => $paramValue )
				if ( !isset($_GET[ $paramName ]) )
					$this->m_log->log(
						array(
							'm_status' => false,
							'm_paramName' => $paramName,
							'm_method' => __FUNCTION__,
							'm_message' => sprintf('not found in { %s } method.', __FUNCTION__)
						)
					);
				else
					$m_array[ $paramName ] = $_GET[ $paramName ];

			foreach ( $m_array as $paramName => $paramValue )
				if ( strcmp($paramValue, 'null') != 0 )
					if ( empty($paramValue) == true )
						$this->m_log->log(
							array(
								'm_status' => false,
								'm_paramName' => $paramName,
								'm_paramValue' => $paramValue,
								'm_method' => 'GET',
								'm_message' => 'paramValue is not defined.'
							)
						);

			$m_array = array_replace($m_array, $_GET);
		}
	}

?>
