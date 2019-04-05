<?php

class RegisterController extends Controller
{
    protected $viewFileName = "register"; //this will be the View that gets the data...


    public function run()
    {
        $this->view->title = "Register";
    }

}