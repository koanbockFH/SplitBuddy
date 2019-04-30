<?php

/**
 * Class ProjektRepository - Gives access to DB Results
 */
class ProjektRepository extends BaseCRUDRepository
{
    protected $tableName = "GruppenProjekt";
    protected $idColumnName = "projektID";

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