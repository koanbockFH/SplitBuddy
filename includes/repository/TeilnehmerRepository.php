<?php

class TeilnehmerRepository extends BaseRepository
{
    public function getIdListByGruppenId($id)
    {
        $sql = "SELECT `teilnehmerID`
                FROM `Teilnehmer` WHERE `gruppenID`='" . $this->Database->escapeString($id) . "'";
        $result = $this->Database->query($sql);
        if($this->Database->numRows($result) == 0)
        {
            return null; //not found!
        }
        $array = array();
        while($row = $this->Database->fetchObject($result))
        {
            array_push($array, $row);
        }
        return $array;
    }

    public function getById($id)
    {
        $sql = "SELECT `teilnehmerID`,
                        `vname`,
                        `nname`,
                        `gebdate`,
                        `mail`,
                        `geschlechtID`,
                        `gruppenID`,
                        `projektID`
                FROM `Teilnehmer` WHERE `teilnehmerID`='" . $this->Database->escapeString($id) . "'";
        $result = $this->Database->query($sql);
        if($this->Database->numRows($result) == 0)
        {
            return null; //not found!
        }
        $row = $this->Database->fetchObject($result);
        return $row;
    }

    public function createOrUpdate($teilnehmer)
    {
        $sql= "";
        if($teilnehmer->id == 0)
        {
            $sql = "INSERT INTO `Teilnehmer`(`vname`,`nname`,`gebdate`,`mail`,`geschlechtID`,`gruppenID`,`projektID`) 
                    VALUES('".$teilnehmer->vorname."',
                           '".$teilnehmer->nachname."',
                           '".$teilnehmer->geburtsdatum."',
                           '".$teilnehmer->mail."',
                           '".$teilnehmer->geschlechtID."',
                           '".$teilnehmer->gruppenID."',
                           '".$teilnehmer->projektID."')";
        }
        else{
            $sql = "UPDATE `Teilnehmer`
                    SET '`vname`=".$teilnehmer->vorname."',
                        '`nname` = ".$teilnehmer->nachname."',
                        '`gebdate` = ".$teilnehmer->geburtsdatum."',
                        '`mail` = ".$teilnehmer->mail."',
                        '`geschlechtID` = ".$teilnehmer->geschlechtID."',
                        '`gruppenID` = ".$teilnehmer->gruppenID."',
                        '`projektID` = ".$teilnehmer->projektID."'
                    WHERE `teilnehmerID`='" . $this->Database->escapeString($teilnehmer->id) . "'";
        }

        $result = $this->Database->query($sql);

        if($result)
        {
            return $this->Database->insertId();
        }
        else
        {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `Teilnehmer`
                WHERE `teilnehmerID`='" . $this->Database->escapeString($id) . "'";

        return $this->Database->query($sql);
    }
}