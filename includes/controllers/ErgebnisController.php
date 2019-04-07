<?php

class ErgebnisController extends Controller
{
    protected $viewFileName = "ergebnis"; //this will be the View that gets the data...


    public function run()
    {
        $this->view->title = "Ergebnis";
    }

}