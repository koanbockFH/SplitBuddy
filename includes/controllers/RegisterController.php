<?php

class RegisterController extends Controller
{
	protected $viewFileName = "register"; //this will be the View that gets the data...

	public function run()
	{
		$this->view->title = "Register";

		$this->checkForRegisterPost();
	}

    public function redirectToIndex()
    {
        header('Location: '.INDEX_URL);
        header('Status: 303');
        exit();
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