<?php

class RegisterController extends Controller
{
	protected $viewFileName = "register"; //this will be the View that gets the data...

	public function run()
	{
		$this->view->title = "Register";

		$this->checkForRegisterPost();
	}

    /**
     * Prüft ob eine neue RegisterAnfrage gesendet wurde und führt diese ggf. aus.
     * @return void, aber JSON wird an Client gesendet (Erfolg/Fehler)
     */
    private function checkForRegisterPost()
    {
        if(!empty($_POST))
        {
            $jsonResponse = new JSON();
            $jsonResponse->result = false;
            $requiredFields = array('regFirstname', 'regLastname', 'regUser', 'regMail', 'regPassword', 'regPasswordControl');
            $error = false;
            //Prüfe ob alle Felder die benötigt werden auch gesetzt wurden
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

                //Versuche Registrierung sofern nicht vorher bereits ein Fehler aufgetaucht ist
                $error = $userRepo->register($_POST['regFirstname'],$_POST['regLastname'],$_POST['regMail'], $_POST['regUser'],$_POST['regPassword'],$_POST['regPasswordControl']);

                //wenn kein Fehler, dann wurde der User erfolgreich erzeugt.
                if(!$error)
                {
                    $jsonResponse->result = true;
                }
            }
            $jsonResponse->send();
        }
    }
}