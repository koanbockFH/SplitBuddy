<?php

/**
 * Class ProjektRepository - Gives access to DB Results
 */
class ProjektRepository extends BaseRepository
{
    /**
     * Gets Data by ID from DB
     * @param $id : ID of DB Value
     * @return object|null : DB Row
     */
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

    /**
     * Creates or Updates the given Value on the DB
     * @param Projekt $projekt : Projekt to be added/updated
     * @return bool|int|string : result depending on state
     */
    public function createOrUpdate(Projekt $projekt)
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

    /**
     * Deletes Object based on ID from the DB
     * @param $id : Id of the Object
     * @return bool|mysqli_result : result of Query execution
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `GruppenProjekt`
                WHERE `projektID`='" . $this->Database->escapeString($id) . "'";

        return $this->Database->query($sql);
    }
}