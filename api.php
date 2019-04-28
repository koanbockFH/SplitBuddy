<?php

define('API_CALL', true);
require_once(__DIR__.'/includes/initialize.php');

$user = new SessionUser();
$user->authenticate();

class ApiController
{
    public function run()
    {
        global $restfulservices;

        $request_method = strtolower($_SERVER['REQUEST_METHOD']);
        $requesturi = $_SERVER["REQUEST_URI"];

        $parts = explode("/api/", $requesturi);

        $rightpart = $parts[1];

        if ($rightpart == "")			// obviously we are just called with /api/ - that is not enough!
        {
            $jsonResponse = new JSON();
            $jsonResponse->result = false;
            $jsonResponse->setMessage('No Service specified! You need to specify a service when you call the API!');
            $jsonResponse->send();
        }
        else							// there is something specified - check if it is valid!
        {
            $serviceParts = explode('/', $rightpart);
            $serviceName = $serviceParts[0];
            unset($serviceParts[0]);

            switch ($request_method)
            {
                // gets are easy...
                case 'get':
                    $data = $_GET;
                    if (empty($data)) $data = array();
                    break;

                // so are posts
                case 'post':
                    $data = $_POST;
                    break;

                // here's the tricky bit...
                case 'put':
                    // basically, we read a string from PHP's special input location,
                    // and then parse it out into an array via parse_str... per the PHP docs:
                    // Parses str  as if it were the query string passed via a URL and sets
                    // variables in the current scope.
                    parse_str(file_get_contents('php://input'), $put_vars);
                    $data = $put_vars;
                    $data = ($data) ? $data : $_GET;
                    break;

                case 'delete':
                    parse_str(file_get_contents('php://input'), $put_vars);
                    $data = $put_vars;
                    $data = ($data) ? $data : $_GET;
                    break;
            }

            $dataForApi = $data;

            if (!empty($restfulservices))
            {
                foreach ($restfulservices as $callback)
                {
                    if (strtolower($callback[0]) == $serviceName)
                    {
                        $restServiceToCall = new $serviceName();
                        $restServiceToCall->{$callback[1]}($request_method, $dataForApi);
                    }
                }
            }
            else
            {
                $jsonResponse = new \JSON();
                $jsonResponse->result = false;
                $jsonResponse->setMessage('No Services defined! Ensure that there are services registered!');
                $jsonResponse->send();
            }

            $jsonResponse = new \JSON();
            $jsonResponse->result = false;
            $jsonResponse->setMessage('Default Response - no Service Registered found that fits the api call!');
            $jsonResponse->send();
        }

    }

}


$api = new ApiController();
$api->run();