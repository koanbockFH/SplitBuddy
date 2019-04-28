<?php

class ProjektRepository extends BaseRepository
{
    public function getById($id)
    {
        $sql = "SELECT `projektID`,
                        `titel`,
                        `anmerkung`,
                        `anzahl`,
                        `typ`,
                        `sortierkriterium`,
                        `userID`
                FROM `GruppenProjekt` WHERE `projektID`='" . $this->Database->escapeString($id) . "'";
        $result = $this->Database->query($sql);
        if($this->Database->numRows($result) == 0)
        {
            return null; //not found!
        }
        $row = $this->Database->fetchObject($result);
        return $row;
    }

    public function createOrUpdate($projekt)
    {
        $sql= "";
        if($projekt->id == 0)
        {
            $sql = "INSERT INTO `GruppenProjekt`(`titel`,`anmerkung`,`anzahl`,`typ`,`sortierkriterium`,`userID`) 
                    VALUES('".$projekt->titel."',
                           '".$projekt->anmerkung."',
                           '".$projekt->anzahl."',
                           '".$projekt->gruppenAufteilungType."',
                           '".$projekt->sortierType."',
                           '".$projekt->userID."')";
        }
        else{
            $sql = "UPDATE `GruppenProjekt`
                    SET '`titel`=".$projekt->titel."',
                        '`anmerkung` = ".$projekt->anmerkung."',
                        '`anzahl` = ".$projekt->anzahl."',
                        '`typ` = ".$projekt->gruppenAufteilungType."',
                        '`sortierkriterium` = ".$projekt->sortierType."',
                        '`userID` = ".$projekt->userID."'
                    WHERE `projektID`='" . $this->Database->escapeString($projekt->id) . "'";
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
        $sql = "DELETE FROM `GruppenProjekt`
                WHERE `projektID`='" . $this->Database->escapeString($id) . "'";

        return $this->Database->query($sql);
    }
}