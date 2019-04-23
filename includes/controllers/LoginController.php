<?php

class LoginController extends Controller
{
	protected $viewFileName = "login"; //this will be the View that gets the data...


	public function run()
	{
		$this->view->title = "Login";
	}

}