<?php
	include_once 'HeaderManagement.php';

	if(!isset($_SERVER['PATH_INFO']))
		$m_function->setToken('a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d');
	else
		$m_function->setToken(ltrim($_SERVER['PATH_INFO'], '/'));

	$m_function->__initialization(
		function() use( $m_function, $m_platform, $m_runtime, $m_database )
		{
			$m_function->_functions['a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d'] = 'get_about';
			$m_function->_functions['04089a41989c1b760dffaed2674eb4205997057bc387c1e38977e00a532c2243'] = 'my_example_function';
			$m_function->_functions['64b45d9c76e0d352b6dd29105cbf9c2fe278f92af4e811b87fd8f0df23d17c88'] = 'my_example_function_post';
		}
	);

	// TODO: debuging options
	$m_function->runningDebuger(true);
	$m_function->__debugging(
		function () use ( $m_function, $m_platform, $m_runtime, $m_log) {

			$m_log(
				array(
					'm_status' => true,
					'm_debugging' => true,
					'm_message' => 'Hello World!'
				)
			);

			die();
		}
	);

	$m_function->runToken();
?>