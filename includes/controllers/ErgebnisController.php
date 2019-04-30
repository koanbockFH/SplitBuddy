<?php

class ErgebnisController extends BaseController
{
    protected $viewFileName = "ergebnis"; //this will be the View that gets the data...
    protected $loginRequired = true;

    public function run()
    {
        $this->view->title = "Ergebnis";

        if (isset($_GET['id'])) {
            $this->view->projekt = new Projekt();
            $this->view->projekt->get($_GET['id']);

            //projekt not found
            if(is_null($this->view->projekt->titel))
            {
                $this->view->projekt = null;
            }
            //Nope not yours
            if($this->view->projekt->userID != $this->sessionUser->id)
            {
                $this->view->projekt = null;
            }
        }
    }
}