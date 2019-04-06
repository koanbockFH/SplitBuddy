<?php

abstract class Controller
{
	protected $viewFileName = ""; //this will be the Template that gets the data...
	public $pageName = "";
	protected $view = null;
	protected $sessionUser = null;
	protected $loginRequired = true;

	abstract function run();

	public function __construct($pageName)
	{
		$this->pageName = $pageName;

        $this->sessionUser = new SessionUser();
        if($this->loginRequired)
        {
            $this->sessionUser->authenticate();
        }
        else
        {
            define('LOGGED_IN', false);
        }

		$this->view = new View($this->viewFileName, $pageName);

		$this->run();
		$this->output();
	}

	private function output()
	{
		$this->view->output();
	}

}