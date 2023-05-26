<?php

	include_once 'XPlatform.php';

	class XLog
	{
		protected $m_platform = null;
		public function __construct(XPlatform &$m_platform, XAppRuntime &$m_runtime)
		{
			$this->m_platform = $m_platform;
			$this->m_runtime = $m_runtime;
		}

		// TODO: get class name
		public static function className() {
			return get_class();
		}

		public function __invoke($array, $json = true, $m_die = true)
		{
			$this->log($array, $json, $m_die);
		}

		public function log($array, $json = true, $m_die = true) {
			if($json)
				header("Content-Type: application/json");

			$array['m_platform'] = PLATFORM_NAME;
			$array['m_platform_uri'] = sprintf("%s v%s", PLATFORM_NAME, $this->m_platform->get_version());
			$array['m_version'] = $this->m_platform->get_version();
			$array['m_runtime'] = $this->m_runtime->get();

			echo json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

			if($m_die)
				die();
		}

		public function p($array, $json = true, $m_die = true) {
			if($json)
				header("Content-Type: application/json");

			print("<br>".print_r($array)."</br>");

			if($m_die)
				die();
		}

		public function dump($array, $m_die = true) {
			var_dump($array);

			if($m_die)
				die();
		}
	}

?>