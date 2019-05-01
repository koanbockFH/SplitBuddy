<?php

/**
 * Class ProjektRepository - Gives access to DB Results
 */
class ProjektRepository extends BaseCRUDRepository
{
    protected $tableName = "GruppenProjekt";
    protected $idColumnName = "projektID";

    public function getAllByUserId($id)
    {
        $sql = "SELECT `projektID`
                FROM `GruppenProjekt` WHERE `userID`='" . $this->Database->escapeString($id) . "'";
        $result = $this->Database->query($sql);
        if($this->Database->numRows($result) == 0)
        {
            return null; //not found!
        }

        $projektIds = array();
        while($row = $this->Database->fetchObject($result))
        {
            array_push($projektIds, $row);
        }

        $projekte = array();
        foreach($projektIds as $id)
        {
            $p = new Projekt();
            $p->get($id->projektID);
            array_push($projekte, $p);
        }
        return $projekte;
    }

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
                    VALUES('".$this->Database->escapeString($projekt->titel)."',
                           '".$this->Database->escapeString($projekt->anmerkung)."',
                           '".$this->Database->escapeString($projekt->anzahl)."',
                           '".$this->Database->escapeString($projekt->gruppenAufteilungType)."',
                           '".$this->Database->escapeString($projekt->sortierType)."',
                           '".$this->Database->escapeString($projekt->userID)."')";
        }
        else{
            $sql = "UPDATE `GruppenProjekt`
                    SET '`titel`=".$this->Database->escapeString($projekt->titel)."',
                        '`anmerkung` = ".$this->Database->escapeString($projekt->anmerkung)."',
                        '`anzahl` = ".$this->Database->escapeString($projekt->anzahl)."',
                        '`typ` = ".$this->Database->escapeString($projekt->gruppenAufteilungType)."',
                        '`sortierkriterium` = ".$this->Database->escapeString($projekt->sortierType)."',
                        '`userID` = ".$this->Database->escapeString($projekt->userID)."'
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
}