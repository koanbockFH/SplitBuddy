<?php

class Route
{
	public function __construct()
	{
		$this->runControllerByUrl();
	}

	public function runControllerByUrl()
	{
		global $route;

		$requestUri = $_SERVER['REQUEST_URI']; //get the current URL

		$parts = explode('?', $requestUri); //remove the ? i.e. login.php?anotherVariable=Value

		$requestUri = $parts[0]; //be only interested in the first part - which is the url without ?

		$urlPath = URL_PATH;

		if($urlPath == '/')
		{
			$urlPath = '';
		}

		foreach($route as $key => $routeOption)
		{
			if($requestUri == $urlPath.$key)
			{
				$controller = new $routeOption['controller']($routeOption['uniqueName']);
				exit;
			}
		}

        define('LOGGED_IN', false);
		//if we are here - there was no Route found - throw 404 and show 404 view!
		$view = new View('404');
		http_response_code(404);
		$view->output();
	}
}