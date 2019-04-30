<?php

class LoginController extends BaseController
{
	protected $viewFileName = "login"; //this will be the View that gets the data...

	public function run()
	{
		$this->view->title = "Login";

		$this->checkForLoginPost();
	}

    /**
     * Prüft ob eine neue LoginAnfrage gesendet wurde und führt diese ggf. aus.
     * @return void, aber JSON wird an Client gesendet (Erfolg/Fehler)
     */
    private function checkForLoginPost()
    {
        if(!empty($_POST) && isset($_POST['username']) && isset($_POST['password']))
        {
            //probably a login attempt!
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username != "" && $password != "")
            {
                $jsonResponse = new JSON();
                if($this->sessionUser->login($username, $password))
                {
                    $jsonResponse->result = true;
                }
                else{
                    $jsonResponse->result = false;
                }
                $jsonResponse->send();
            }
        }
    }
}