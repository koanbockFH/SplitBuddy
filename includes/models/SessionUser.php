<?php

class SessionUser
{
    public $username = '';
    public $id = '';
    public $isLoggedIn = false;

    public function __construct()
    {
        if ($_SESSION[get_class($this) . 'Data'] != '') {
            $ship = $_SESSION[get_class($this) . "Data"];
            $this->loadFromSessionData($ship);
        }
    }

    /**
     * save our values in the session
     */
    public function __destruct()
    {
        $_SESSION[get_class($this).'Data'] = $this->saveSessionData();
    }

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

    /**
     * Gets all attributes from this class, serializes it adds slashes to save this string in the session
     * @return string
     */
    protected function saveSessionData()
    {
        $data = serialize($this);
        $data = addslashes($data);
        return $data;
    }

    /**
     * Loads Data of this class/instance with the data from the session which was previously saved
     * @param $serializedData
     */
    protected function loadFromSessionData($serializedData)
    {
        $serializedData = stripslashes($serializedData);
        $deserializedObject = unserialize($serializedData);
        $ro = new reflectionObject($deserializedObject);
        //Map Object
        foreach ($ro->getProperties() as $propObj)
        {
            $this->{$propObj->name} = $deserializedObject->{$propObj->name};
        }
    }
}