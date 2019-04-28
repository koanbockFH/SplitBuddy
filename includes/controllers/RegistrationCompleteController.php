<?php

class RegistrationCompleteController extends Controller
{
	protected $viewFileName = "registrationComplete";

	public function run()
	{
		$this->view->title = "Registrierung Erfolgreich";
	}

}