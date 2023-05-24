<?php

	//===============================================================================
	// ### include 'WebWise' headers here...
	include_once 'XLog.php';
	include_once 'XVersionManagement.php';
	include_once 'XPlatform.php';
	include_once 'XAppRuntime.php';
	include_once 'XFunctionManagement.php';
	include_once 'XErrorManagement.php';

	//===============================================================================
	// ### defined global variables here...

	// ### XPlatform
	$m_platform = new XPlatform();
	$m_platform->init_version();

	// ### XAppRuntime
	$m_runtime = new XAppRuntime();
	$m_runtime->start();

	// ### XErrorManagement
	$m_error = new XErrorManagement($m_platform, $m_runtime);

	// ### XFunctionManagement
	$m_function = new XFunctionManagement($m_platform, $m_runtime, $m_error);

	//===============================================================================
	// ### include 'Api' headers here...


?>