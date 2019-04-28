<?php

class GruppeRepository extends BaseRepository
{
    public function getIdListByProjectId($id)
    {
        $sql = "SELECT `gruppenID`
                FROM `Gruppen` WHERE `projektID`='" . $this->Database->escapeString($id) . "'";
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
        $sql = "SELECT `gruppenID`,
                        `gruppenname`,
                        `projektID`
                FROM `Gruppen` WHERE `gruppenID`='" . $this->Database->escapeString($id) . "'";
        $result = $this->Database->query($sql);
        if($this->Database->numRows($result) == 0)
        {
            return null; //not found!
        }
        $row = $this->Database->fetchObject($result);
        return $row;
    }

    public function createOrUpdate($gruppe)
    {
        $sql= "";
        if($gruppe->id == 0)
        {
            $sql = "INSERT INTO `Gruppen`(`gruppenname`,`projektID`) 
                    VALUES('".$gruppe->gruppenname."',
                           '".$gruppe->projektID."')";
        }
        else{
            $sql = "UPDATE `Gruppen`
                    SET '`gruppenname`=".$gruppe->gruppenname."',
                        '`projektID` = ".$gruppe->projektID."'
                    WHERE `gruppenID`='" . $this->Database->escapeString($gruppe->id) . "'";
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
        $sql = "DELETE FROM `Gruppen`
                WHERE `gruppenID`='" . $this->Database->escapeString($id) . "'";

        return $this->Database->query($sql);
    }
}