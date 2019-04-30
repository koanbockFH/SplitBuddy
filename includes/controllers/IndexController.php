<?php

class IndexController extends BaseController
{
	protected $viewFileName = "index";

	public function run()
	{
		$this->view->title = "Übersicht";
	}

}