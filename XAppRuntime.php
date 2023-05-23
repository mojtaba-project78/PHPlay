<?php

	class XAppRuntime
	{
		// TODO: get class name for better handling
		public static function className() {
			return get_class();
		}

		public function start()
		{
			$this->s_timeStart = microtime(true);
		}

		public function get()
		{
			$this->ts = microtime(true);
			$tElapsedSecs = $this->ts - $this->s_timeStart;
			$this->s_elescaped = str_pad(number_format($tElapsedSecs, 3), 10, " ", STR_PAD_LEFT);
			return str_replace(' ', '', $this->s_elescaped);
		}

		private $ts;
		private $s_elescaped;
		private $s_timeStart;
	}

?>