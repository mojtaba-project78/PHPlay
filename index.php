<?php
	include_once 'HeaderManagement.php';

	if(!isset($_SERVER['PATH_INFO']))
		$m_function->setToken('a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d');
	else
		$m_function->setToken(ltrim($_SERVER['PATH_INFO'], '/'));

	$m_function->__initialization(
		function() use( $m_function, $m_platform, $m_runtime )
		{
			$m_function->_functions['a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d'] = 'get_about';
			$m_function->_functions['04089a41989c1b760dffaed2674eb4205997057bc387c1e38977e00a532c2243'] = 'my_example_function';
		}
	);

	// TODO: debuging options
	$m_function->runningDebuger(false);
	$m_function->__debugging(
		function () use ( $m_function, $m_platform, $m_runtime ) {

			$m_function->runToken();

			die();
		}
	);

	$m_function->runToken();
?>