<?php

class IndexController extends Controller
{
	protected $viewFileName = "index";

	//Überschreibt die Base Variable, damit ist ein User nicht zwingend notwendig um die Seite zu sehen
    protected $loginRequired = false;

	public function run()
	{
		$this->view->title = "Übersicht";
	}

}