<?php

class RegistrationCompleteController extends BaseController
{
	protected $viewFileName = "registrationComplete";

	public function run()
	{
		$this->view->title = "Registrierung Erfolgreich";
	}

}