<?php

	session_start();
	ob_start();
	date_default_timezone_set('ETC/GMT-8');

	$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
	define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
	define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));
	define('URL','http://' . $_SERVER['HTTP_HOST'].URL_ROOT);
	require_once 'config/define.php';
	require_once 'core/app.php';
	require_once 'core/controller.php';
	require_once 'core/model.php';
	require_once 'core/functions.php';
	require_once 'core/PHPMailer/Exception.php';
	require_once 'core/PHPMailer/PHPMailer.php';
	require_once 'core/PHPMailer/SMTP.php';
	require_once 'core/tcpdf/tcpdf.php';
	
	

