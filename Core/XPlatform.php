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
						'm_text' => $this->logger(self::className(), self::LOGGER_COMPLATED, [ 'version_adder', 'add_single_log', 'add_multiple_log' ])
					),
					array(
						'm_function' => self::className(),
						'm_text' => $this->logger(self::className(), self::LOGGER_COMPLATED, [ 'get_version', 'get_version_log', 'logger' ])
					),
					array(
						'm_function' => XAppRuntime::className(),
						'm_text' => $this->logger(XAppRuntime::className(), self::LOGGER_COMPLATED, [ 'className' ], "class builded.")
					),

					array(
						'm_function' => XFunctionManagement::className(),
						'm_text' => $this->logger(XFunctionManagement::className(), self::LOGGER_COMPLATED, [ 'XFunctionManagement' ], "debugger mode defined")
					),
					array(
						'm_function' => "index",
						'm_text' => $this->logger("index", self::LOGGER_UPDATED, [ 'index', '__initialization' ], "debugger options defined")
					),
					array(
						'm_function' => XFunctionManagement::className(),
						'm_text' => $this->logger(XFunctionManagement::className(), self::LOGGER_COMPLATED, [ 'XFunctionManagement' ], "class builded.")
					),
				]
			);

			$this->add_multiple_log(
				[
					array(
						'm_function' => XErrorManagement::className(),
						'm_text' => $this->logger(XErrorManagement::className(), self::LOGGER_COMPLATED, [ 'POST', 'GET' ], "class builded.")
					),
					array(
						'm_function' => 'HeaderManagement',
						'm_text' => $this->logger('HeaderManagement', self::LOGGER_UPDATED, [ 'XErrorManagement', 'XFunctionManagement' ], "new class defined.")
					),
					array(
						'm_function' => 'index',
						'm_text' => $this->logger('index', self::LOGGER_UPDATED, [ 'my_example_function_post' ])
					),
					array(
						'm_function' => XFunctionManagement::className(),
						'm_text' => $this->logger(XFunctionManagement::className(), self::LOGGER_UPDATED, [ 'className', '__construct', 'my_example_function', 'my_example_function_post' ], "post & get validation & 'm_status' in functions added.")
					),
					array(
						'm_function' => XLog::className(),
						'm_text' => $this->logger(XLog::className(), self::LOGGER_UPDATED, [ 'log', 'p', 'dump' ], "This function is more personalized")
					),
				]
			);

			$this->add_multiple_log(
				[
					array(
						'm_function' => XDatabaseManagement::className(),
						'm_text' => $this->logger(XDatabaseManagement::className(), self::LOGGER_COMPLATED, [ '__construct', 'fixSingleInput', 'fixArrayInput', 'pagination', 'db' ], "class builded.")
					),
					array(
						'm_function' => 'index',
						'm_text' => $this->logger('index', self::LOGGER_UPDATED, [ '__initialization' ], 'variable m_database added.')
					),
					array(
						'm_function' => 'HeaderManagement',
						'm_text' => $this->logger('HeaderManagement', self::LOGGER_UPDATED, [ 'XDatabaseManagement', 'XFunctionManagement' ], "new class defined & updated.")
					),
					array(
						'm_function' => XFunctionManagement::className(),
						'm_text' => $this->logger(XFunctionManagement::className(), self::LOGGER_UPDATED, [ '__construct', 'my_example_function', 'my_example_function_post' ], "function 'fixArrayInput' added.")
					),
				]
			);

			$this->add_multiple_log(
				[
					array(
						'm_function' => XErrorManagement::className(),
						'm_text' => $this->logger(XErrorManagement::className(), self::LOGGER_UPDATED, [ '__construct', 'POST', 'GET' ], "update log item.")
					),
					array(
						'm_function' => XFunctionManagement::className(),
						'm_text' => $this->logger(XFunctionManagement::className(), self::LOGGER_UPDATED, [ '__construct', 'runToken', 'get_about', 'my_example_function', 'my_example_function_post' ], "update log item.")
					),
					array(
						'm_function' => XLog::className(),
						'm_text' => $this->logger(XLog::className(), self::LOGGER_UPDATED, [ '__construct', 'p', 'dump', 'log' ], "added preValue into json output.")
					),
					array(
						'm_function' => XLog::className(),
						'm_text' => $this->logger(XLog::className(), self::LOGGER_COMPLATED, [ '__invoke' ], "new function added.")
					),
					array(
						'm_function' => XVersionManagement::className(),
						'm_text' => $this->logger(XVersionManagement::className(), self::LOGGER_UPDATED, [ 'add_multiple_log', ], "fixed json array model.")
					),
					array(
						'm_function' => 'HeaderManagement',
						'm_text' => $this->logger('HeaderManagement', self::LOGGER_UPDATED, [ 'XErrorManagement', 'XLog', 'XFunctionManagement' ], "added field XLog to constructors.")
					),
					array(
						'm_function' => 'index',
						'm_text' => $this->logger('index', self::LOGGER_UPDATED, [ 'main' ], "update log item.")
					),
				]
			);
		}
	}

?>