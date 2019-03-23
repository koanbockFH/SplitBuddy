<?php

abstract class Controller
{
	protected $viewFileName = ""; //this will be the Template that gets the data...
	public $pageName = "";
	protected $view = null;

	abstract function run();

	public function __construct($pageName)
	{
		$this->pageName = $pageName;

		$this->view = new View($this->viewFileName, $pageName);

		$this->run();
		$this->output();
	}

	private function output()
	{
		$this->view->output();
	}

}