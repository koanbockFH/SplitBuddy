<?php

class LoginController extends Controller
{
	protected $viewFileName = "login"; //this will be the View that gets the data...

    //Überschreibt die Base Variable, damit ist ein User nicht zwingend notwendig um die Seite zu sehen
    protected $loginRequired = false;

	public function run()
	{
		$this->view->title = "Login";
	}

}