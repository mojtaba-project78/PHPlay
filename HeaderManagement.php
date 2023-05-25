<?php
	define("MAXIMUM_ELEMENTS", 30);

	//===============================================================================
	// ### include 'PHPlay' headers here...
	include_once 'XLog.php';
	include_once 'XVersionManagement.php';
	include_once 'XPlatform.php';
	include_once 'XAppRuntime.php';
	include_once 'XFunctionManagement.php';
	include_once 'XErrorManagement.php';
	include_once 'XDatabaseManagement.php';

	//===============================================================================
	// ### defined global variables here...

	// ### XPlatform
	$m_platform = new XPlatform();
	$m_platform->init_version();

	// ### XAppRuntime
	$m_runtime = new XAppRuntime();
	$m_runtime->start();

	// ### XDatabaseManagement
	$m_database = new XDatabaseManagement($m_platform, $m_runtime);

	// ### XErrorManagement
	$m_error = new XErrorManagement($m_platform, $m_runtime);

	// ### XFunctionManagement
	$m_function = new XFunctionManagement($m_platform, $m_runtime, $m_error, $m_database);

	//===============================================================================
	// ### include 'Api' headers here...


?>