<?php

class AddProjectController extends Controller
{
	protected $viewFileName = "addProject"; //this will be the View that gets the data...
    protected $loginRequired = true;

	public function run()
	{
		$this->view->title = "Anlage";
	}

}