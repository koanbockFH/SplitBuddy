<?php

class UserRepository extends BaseRepository
{
    public function login($username, $password)
    {
        $sql = "SELECT `userID`,`passwort` FROM `User` WHERE `username`='". $this->Database->escapeString($username) . "'";
        $result = $this->Database->query($sql);
        $user = new SessionUser();
        if($this->Database->numRows($result) == 0)
        {
            $user->isLoggedIn = false;
            return $user; //username not found!
        }
        //now lets check for the password
        $row = $this->Database->fetchObject($result);
        if(password_verify($password, $row->passwort))
        {
            $user->id = $row->userID;
            $user->isLoggedIn = true;
            $user->username = $username;
            return $user;
        }
        $user->isLoggedIn = false;
        return $user;
    }

    public function register($vorname, $nachname, $mail, $username, $password, $passwordControl)
    {
        $error = false;
        $error = $this->checkPassword($password, $passwordControl, $error);
        $error = $this->checkUsername($username, $error);

        if($error == false)
        {
            $error = !$this->createUser($vorname, $nachname, $mail, $username, $password);
        }
        return $error;
    }

    public function existsWithUsername($username)
    {
        //check if user exists...
        $sql = "SELECT COUNT(`userID`) AS num FROM `User` WHERE `username`='".$this->Database->escapeString($username)."'";
        $result = $this->Database->query($sql);
        $row = $this->Database->fetchObject($result);
        if($row->num == 0)
        {
            return false;
        }
        return true;
    }

    private function createUser($vorname, $nachname, $mail, $username, $password)
    {
        $password = password_hash($this->Database->escapeString($password), PASSWORD_BCRYPT);

        $sql = "INSERT INTO `User`(`vname`,`nname`,`mail`,`username` ,`passwort`) 
                VALUES('".$vorname."',
                       '".$nachname."',
                       '".$mail."',
                       '".$username."',
                       '".$password."')";

        return $this->Database->query($sql);
    }

    private function checkPassword($password, $passwordControl, $error)
    {
        //TODO Add Sonderzeichen Check usw.
        if(strlen($password) < 8) //check if password is long enough
        {
            $error = true;
        }
        else if($password != $passwordControl) //check if password matches password repetition
        {
            $error = true;
        }
        return $error;
    }

    private function checkUsername($username, $error)
    {
        if($this->existsWithUsername($username) == true)
        {
            $error = true;
        }
        return $error;
    }
}