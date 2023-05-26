<?php
	define("MAXIMUM_ELEMENTS", 30);
	define("PLATFORM_NAME", "PHPlay");

	//===============================================================================
	// ### include 'PHPlay' headers here...
	include_once 'Core/XLog.php';
	include_once 'Core/XVersionManagement.php';
	include_once 'Core/XPlatform.php';
	include_once 'Core/XAppRuntime.php';
	include_once 'Core/XFunctionManagement.php';
	include_once 'Core/XErrorManagement.php';
	include_once 'Core/XDatabaseManagement.php';

	//===============================================================================
	// ### defined global variables here...

	// ### XAppRuntime
	$m_runtime = new XAppRuntime();
	$m_runtime->start();

	// ### XPlatform
	$m_platform = new XPlatform();
	$m_platform->init_version();

	// ### XLog
	$m_log = new XLog($m_platform, $m_runtime);

	// ### XDatabaseManagement
	$m_database = new XDatabaseManagement($m_platform, $m_runtime);

	// ### XErrorManagement
	$m_error = new XErrorManagement($m_platform, $m_runtime, $m_log);

	// ### XFunctionManagement
	$m_function = new XFunctionManagement($m_platform, $m_runtime, $m_error, $m_database, $m_log);

	//===============================================================================
	// ### include 'Api' headers here...


?>