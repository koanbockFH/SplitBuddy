<?php

class ErgebnisController extends Controller
{
    protected $viewFileName = "ergebnis"; //this will be the View that gets the data...
    protected $loginRequired = true;

    public function run()
    {
        $this->view->title = "Ergebnis";

        if (isset($_GET['id'])) {
            $this->view->projekt = new Projekt();
            $this->view->projekt->get($_GET['id']);
            if(is_null($this->view->projekt->titel))
            {
                $this->view->projekt = null;
            }
        }
    }
}