<?php

class RegisterController extends Controller
{
	protected $viewFileName = "register"; //this will be the View that gets the data...

    //Überschreibt die Base Variable, damit ist ein User nicht zwingend notwendig um die Seite zu sehen
    protected $loginRequired = false;

	public function run()
	{
		$this->view->title = "Register";

		$this->checkForRegisterPost();
	}

    private function checkForRegisterPost()
    {
        if(!empty($_POST))
        {
            $jsonResponse = new JSON();
            $jsonResponse->result = false;
            $requiredFields = array('regFirstname', 'regLastname', 'regUser', 'regMail', 'regPassword', 'regPasswordControl');
            $error = false;
            foreach($requiredFields as $fieldName)
            {
                if(!isset($_POST[$fieldName]) || $_POST[$fieldName] == '')
                {
                    $error = true;
                }
            }

            if(!$error)
            {
                $userRepo = new UserRepository();

                $error = $userRepo->register($_POST['regFirstname'],$_POST['regLastname'],$_POST['regMail'], $_POST['regUser'],$_POST['regPassword'],$_POST['regPasswordControl']);

                if(!$error)
                {
                    $jsonResponse->result = true;
                    $jsonResponse->setMessage("Benutzer wurde erfolgreich hinzugefügt!");
                }
            }
            $jsonResponse->send();
        }
    }
}