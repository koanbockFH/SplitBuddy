<?php

//ini_set("log_errors", 1);
//ini_set("error_log", "/tmp/php-error.log");

error_reporting(E_ALL & ~E_NOTICE);

define('VIEW_DIRECTORY', __DIR__.'/views/');


session_start();//we need to do this - in order to determine if a user is logged in or not
//we learned already, that cookies are not good to store sensitive information because it can be changed by the user
//the session_start will look if there is a session cookie - if there is no cookie it creates one and sets a sessionId


require_once(__DIR__ . '/dbconfig.php'); //this needs to be first
require_once(__DIR__ . '/routes.php');
require_once(__DIR__ . '/restservices.php');
require_once(__DIR__ . '/config.php');


if(!function_exists('classAutoLoader'))
{
	function classAutoLoader($fileName)
	{
		if(file_exists(__DIR__.'/classes/'.$fileName.'.php'))
		{
			require_once(__DIR__.'/classes/'.$fileName.'.php');
		}
		else if(file_exists(__DIR__.'/models/'.$fileName.'.php'))
		{
			require_once(__DIR__.'/models/'.$fileName.'.php');
		}
        else if(file_exists(__DIR__.'/repository/'.$fileName.'.php'))
        {
            require_once(__DIR__.'/repository/'.$fileName.'.php');
        }
		else if(file_exists(__DIR__.'/controllers/'.$fileName.'.php'))
		{
			require_once(__DIR__.'/controllers/'.$fileName.'.php');
		}
		else if(file_exists(__DIR__.'/restservices/'.$fileName.'.php'))
		{
			require_once(__DIR__.'/restservices/'.$fileName.'.php');
		}
		else
		{
			throw new Exception("Unable to load $fileName.");
		}
	}
}

spl_autoload_register('classAutoLoader');


