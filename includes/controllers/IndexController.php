<?php

class IndexController extends Controller
{
	protected $viewFileName = "index";

	public function run()
	{
		$this->view->title = "Übersicht";
	}

}