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
            return false; //will never be called
        }
        define('LOGGED_IN', true);
        return true;
    }

    /**
     * Sendet Session zum Login wenn eine Seite angesteuert wird die Authentifizierten User benötigt
     */
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

    /**
     * Meldet User ab
     * @return bool
     */
    public function logout()
    {
        $this->username = null;
        $this->id = null;
        $this->isLoggedIn = false;
        $this->saveSessionData();
        return true;
    }

    /**
     * @param $username : wert der übergeben wurde
     * @param $password : passwort das übergeben wurde
     * @return bool : erfolgreicher oder fehlerhafter LoginVersuch
     */
    public function login($username, $password)
    {
        $userRepo = new UserRepository();

        $result = $userRepo->getUser($username, $password);
        if($result == null)
        {
            $this->isLoggedIn = false;
            return false;
        }
        else{
            //setze Id um ggf. bei einer Profilseite, den vollständigen User zu suchen
            $this->id = $result->userID;
            $this->isLoggedIn = true;
            $this->username = $username;
            return true;
        }
    }
}