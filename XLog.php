<?php

	class XLog
	{
		// TODO: get class name
		public static function className() {
			return get_class();
		}

		public static function log($array, $json = true) {
			if($json)
				header("Content-Type: application/json");

			echo json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
			die();
		}

		public static function p($array, $json = true) {
			if($json)
				header("Content-Type: application/json");

			print("<br>".print_r($array)."</br>");
			die();
		}

		public static function dump($array) {
			var_dump($array);
			die();
		}
	}

?>