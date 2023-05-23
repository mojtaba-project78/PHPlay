<?php

	include_once 'XVersionManagement.php';

	class XPlatform extends XVersionManagement
	{
		// TODO: get class name
		public static function className() {
			return get_class();
		}

		//===============================================================================
		public function init_version()
		{
			$this->add_multiple_log(
				[
					array(
						'm_function' => self::className(),
						'm_text' => $this->logger(self::className(), self::LOGGER_COMPLATED, ['version_adder', 'add_single_log', 'add_multiple_log'])
					),
					array(
						'm_function' => self::className(),
						'm_text' => $this->logger(self::className(), self::LOGGER_COMPLATED, ['get_version', 'get_version_log', 'logger'])
					),
					array(
						'm_function' => XAppRuntime::className(),
						'm_text' => $this->logger(XAppRuntime::className(), self::LOGGER_COMPLATED, ['className'])
					),

					array(
						'm_function' => XFunctionManagement::className(),
						'm_text' => $this->logger(XFunctionManagement::className(), self::LOGGER_COMPLATED, ['XFunctionManagement'], "debugger mode defined")
					),
					array(
						'm_function' => "index",
						'm_text' => $this->logger("index", self::LOGGER_UPDATED, ['index', '__initialization'], "debugger options defined")
					),
					array(
						'm_function' => XFunctionManagement::className(),
						'm_text' => $this->logger(XFunctionManagement::className(), self::LOGGER_COMPLATED, ['XFunctionManagement'])
					),
				]
			);
		}
	}

?>