<?php

class UserRepository extends BaseRepository
{
    /**
     * User anhand von Username/Passwort holen
     * @param $username : wert der übergeben wurde
     * @param $password : passwort das übergeben wurde
     * @return object|null : Datenbankzeile mit Werten des Users oder null sofern nicht gefunden
     */
    public function getUser($username, $password)
    {
        $sql = "SELECT `userID`,`passwort` FROM `User` WHERE `username`='". $this->Database->escapeString($username) . "'";
        $result = $this->Database->query($sql);
        if($this->Database->numRows($result) == 0)
        {
            return null; //username not found!
        }
        //now lets check for the password
        $row = $this->Database->fetchObject($result);
        if(password_verify($password, $row->passwort))
        {
            return $row;
        }
        return null;
    }

    /**
     * Registriere neuen User
     * @param $vorname : wert
     * @param $nachname : wert
     * @param $mail : wert
     * @param $username : wert
     * @param $password : wert
     * @param $passwordControl : wert
     * @return bool : gibt an ob User erfolgreich erstellt werden konnte
     */
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

    /**
     * prüfe ob User bereits existiert
     * @param $username : wert
     * @return bool : existiert user
     */
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

    /**
     * Erzeuge User
     * @param $vorname : wert
     * @param $nachname : wert
     * @param $mail : wert
     * @param $username : wert
     * @param $password :wert
     * @return bool|mysqli_result : gebe Resultat der SQL Query zurück
     */
    private function createUser($vorname, $nachname, $mail, $username, $password)
    {
        //sichere Passwort als Hash statt klartext
        $password = password_hash($this->Database->escapeString($password), PASSWORD_BCRYPT);

        $sql = "INSERT INTO `User`(`vname`,`nname`,`mail`,`username` ,`passwort`) 
                VALUES('".$vorname."',
                       '".$nachname."',
                       '".$mail."',
                       '".$username."',
                       '".$password."')";

        return $this->Database->query($sql);
    }

    /**
     * Prüfe Passwort auf Einschränkungen
     * @param $password : wert
     * @param $passwordControl :wert
     * @param $error :wert
     * @return bool : Fehler oder alter Wert, sofern kein Fehler
     */
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

    /**
     * Prüfe Username auf Einschränkungen
     * @param $username : wert
     * @param $error : wert
     * @return bool : Fehler oder alter Wert, sofern kein Fehler
     */
    private function checkUsername($username, $error)
    {
        if($this->existsWithUsername($username) == true)
        {
            $error = true;
        }
        return $error;
    }
}