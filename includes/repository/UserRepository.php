<?php

class UserRepository extends BaseRepository
{
    public function login($username, $password)
    {
        $sql = "SELECT `Id`,`Password` FROM `User` WHERE `Username`='". $this->Database->escapeString($username) . "'";
        $result = $this->Database->query($sql);
        $user = new User();
        if($this->Database->numRows($result) == 0)
        {
            $user->isLoggedIn = false;
            return $user; //username not found!
        }
        //now lets check for the password
        $row = $this->Database->fetchObject($result);
        if(password_verify($password, $row->password))
        {
            $user->id = $row->id;
            $user->isLoggedIn = true;
            $user->username = $username;
            return $user;
        }
        $user->isLoggedIn = false;
        return $user;
    }

    public function register($username, $password)
    {
        $password = password_hash($this->Database->escapeString($password), PASSWORD_BCRYPT);
        $sql = "INSERT INTO `user`(`name`,`password`) VALUES('".$username."','".$password."')";
        $this->Database->query($sql);
    }
}