<?php

class IndexController extends Controller
{
	protected $viewFileName = "index"; //this will be the View that gets the data...


	public function run()
	{
		$this->view->title = "Übersicht";
	}

}