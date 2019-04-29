<?php

class LogoutController extends BaseController
{
    protected $viewFileName = "logout"; //this will be the View that gets the data...

    public function run()
    {
        $this->view->title = 'Logout';

        //Melde User ab
        $this->sessionUser->logout();
        $this->sessionUser = null;
    }
}