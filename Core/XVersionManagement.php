<?php

	class XVersionManagement
	{
		// TODO: get class name
		public static function className() {
			return get_class();
		}

		// ### typeof logger mode
		CONST LOGGER_FIXED_BUG = 1;
		CONST LOGGER_COMPLATED = 2;
		CONST LOGGER_UPDATED = 3;

		private $_log = array();
		private $_log_version = array();
		private $_version = 0.0;

		//===============================================================================
		private function version_adder($functionName, $m_text)
		{
			$this->_log_version = array();

			array_push($this->_log_version, array(
				'm_function' => $functionName,
				'm_text' => $m_text
			));
		}

		//===============================================================================
		protected function add_single_log($functionName, $m_text)
		{
			$this->_version += 0.1;
			$this->_log_version = array();

			$this->version_adder($functionName, $m_text);

			array_push($this->_log, [
				(string)$this->_version => [
					'm_function' => $functionName,
					'm_text' => $m_text
				]
			]);
		}

		//===============================================================================
		protected function add_multiple_log(array $m_array)
		{
			$this->_version += 0.1;
			$this->_log_version = array();

			for($index = 0; $index < sizeof($m_array); $index++)
			{
				array_push($this->_log_version, [
					'm_function' => $m_array[$index]['m_function'],
					'm_text' => $m_array[$index]['m_text']
				]);
			}

			$this->_log[(string)$this->_version] = $this->_log_version;
		}

		//===============================================================================
		public function get_version() {
			return sprintf('%0.1f', $this->_version);
		}

		//===============================================================================
		public function get_version_log() {
			return array_reverse($this->_log);
		}

		//===============================================================================
		//===============================================================================
		//===============================================================================

		protected function logger($className, $m_type, array $m_functionList, $m_text = "")
		{
			$functions = "( ";
			for($index = 0; $index < sizeof($m_functionList); $index++)
				if($index == sizeof($m_functionList) - 1)
					$functions .= sprintf("%s ", $m_functionList[ $index ]);
				else
					$functions .= sprintf("%s & ", $m_functionList[ $index ]);

			$functions .= ")";

			$log_message = "";
			switch ($m_type)
			{
				case self::LOGGER_FIXED_BUG:
					$log_message = sprintf("%s this functions %s bugs fixed.", $className, $functions);
					if(!empty($m_text))
						$log_message .= sprintf("( %s )", $m_text);
					break;

				case self::LOGGER_COMPLATED:
					$log_message = sprintf("%s this functions %s complated.", $className, $functions);
					if(!empty($m_text))
						$log_message .= sprintf("( %s )", $m_text);
					break;

				case self::LOGGER_UPDATED:
					$log_message = sprintf("%s this functions %s updated.", $className, $functions);
					if(!empty($m_text))
						$log_message .= sprintf("( %s )", $m_text);
					break;
			}

			return $log_message;
		}
	}

?>