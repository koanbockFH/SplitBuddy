<?php

class LogoutController extends Controller
{
    protected $viewFileName = "logout"; //this will be the View that gets the data...

    public function run()
    {
        $this->view->title = 'Logout';
        $this->sessionUser->logout();
        $this->sessionUser = null;
    }
}