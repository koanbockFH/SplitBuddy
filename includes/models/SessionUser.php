<?php

class SessionUser extends SessionCached
{
    public $username = '';
    public $id = '';
    public $isLoggedIn = false;

    /**
     * Checks if the User is logged in - if not redirect him to the login page
     * @return bool
     */
    public function authenticate()
    {
        //checks if the user is logged in - if not - redirect to login!
        if(!$this->isLoggedIn)
        {
            define('LOGGED_IN', false);
            $this->redirectToLogin();
        }
        define('LOGGED_IN', true);
        return true;
    }

    public function redirectToLogin()
    {
        if(API_CALL === true)
        {
            header('Location: ../'.LOGIN_URL);
        }
        else
        {
            header('Location: '.LOGIN_URL);
        }
        header('Status: 303');
        exit();
    }

    public function logout()
    {
        $this->username = null;
        $this->id = null;
        $this->isLoggedIn = false;
        $this->saveSessionData();
        return true;
    }
}