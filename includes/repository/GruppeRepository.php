<?php

/**
 * Class GruppeRepository - Gives access to DB Results
 */
class GruppeRepository extends BaseCRUDRepository
{
    protected $tableName = "Gruppen";
    protected $idColumnName = "gruppenID";
    protected $parentIdColumnName = "projektID";

    /**
     * Creates or Updates the given Value on the DB
     * @param Gruppe $gruppe : Gruppe to be added/updated
     * @return bool|int|string : result depending on state
     */
    public function createOrUpdate(Gruppe $gruppe)
    {
        $sql= "";
        if($gruppe->id == 0)
        {
            $sql = "INSERT INTO `Gruppen`(`gruppenname`,`projektID`) 
                    VALUES('".$this->Database->escapeString($gruppe->gruppenname)."',
                           '".$this->Database->escapeString($gruppe->projektID)."')";
        }
        else{
            $sql = "UPDATE `Gruppen`
                    SET '`gruppenname`=".$this->Database->escapeString($gruppe->gruppenname)."',
                        '`projektID` = ".$this->Database->escapeString($gruppe->projektID)."'
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
}