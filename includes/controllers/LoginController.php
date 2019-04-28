<?php

class LoginController extends Controller
{
	protected $viewFileName = "login"; //this will be the View that gets the data...

	public function run()
	{
		$this->view->title = "Login";

		$this->checkForLoginPost();
	}

    public function redirectToIndex()
    {
        header('Location: '.INDEX_URL);
        header('Status: 303');
        exit();
    }

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
                $userRepo = new UserRepository();
                $this->sessionUser = $userRepo->login($username, $password);
                if($this->sessionUser->isLoggedIn)
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