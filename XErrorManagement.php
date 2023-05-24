<?php

	include_once 'HeaderManagement.php';

	class XErrorManagement
	{
		// TODO: get class name
		public static function className() {
			return get_class();
		}

		private $m_runtime = null;
		private $m_platform = null;

		public function __construct( XPlatform &$m_platform, XAppRuntime &$m_runtime )
		{
			$this->m_runtime = $m_runtime;
			$this->m_platform = $m_platform;
		}

		public function POST( &$m_array )
		{
			foreach ( $m_array as $paramName => $paramValue )
				if(!isset($_POST[$paramName]))
					XLog::log(
						array(
							'm_status' => false,
							'm_runtime' => $this->m_runtime->get(),
							'm_version' => $this->m_platform->get_version(),
							'm_paramName' => $paramName,
							'm_method' => __FUNCTION__,
							'm_message' => sprintf('not found in { %s } method.', __FUNCTION__)
						)
					);
				else
					$m_array[$paramName] = $_POST[$paramName];

			foreach ( $m_array as $paramName => $paramValue )
				if ( strcmp($paramValue, 'null') != 0 )
					if ( empty($paramValue) == true )
						XLog::log(
							array(
								'm_status' => false,
								'm_runtime' => $this->m_runtime->get(),
								'm_version' => $this->m_platform->get_version(),
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
					XLog::log(
						array(
							'm_status' => false,
							'm_runtime' => $this->m_runtime->get(),
							'm_version' => $this->m_platform->get_version(),
							'm_paramName' => $paramName,
							'm_method' => __FUNCTION__,
							'm_message' => sprintf('not found in { %s } method.', __FUNCTION__)
						)
					);
				else
					$m_array[ $paramName ] = $_GET[$paramName];

			foreach ( $m_array as $paramName => $paramValue )
				if ( strcmp($paramValue, 'null') != 0 )
					if ( empty($paramValue) == true )
						XLog::log(
							array(
								'm_status' => false,
								'm_runtime' => $this->m_runtime->get(),
								'm_version' => $this->m_platform->get_version(),
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
