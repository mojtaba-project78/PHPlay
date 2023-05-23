<?php

	//===============================================================================
	// ### include 'WebWise' headers here...
	include_once 'XLog.php';
	include_once 'XVersionManagement.php';
	include_once 'XPlatform.php';
	include_once 'XAppRuntime.php';
	include_once 'XFunctionManagement.php';

	//===============================================================================
	// ### defined global variables here...

	// ### XPlatform
	$m_platform = new XPlatform();
	$m_platform->init_version();

	// ### XAppRuntime
	$m_runtime = new XAppRuntime();
	$m_runtime->start();

	// ### XFunctionManagement
	$m_function = new XFunctionManagement($m_platform, $m_runtime);

	//===============================================================================
	// ### include 'Api' headers here...
?>