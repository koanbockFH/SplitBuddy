<?php

/**
 * Class TeilnehmerRepository - Gives access to DB Results
 */
class TeilnehmerRepository extends BaseCRUDRepository
{
    protected $tableName = "Teilnehmer";
    protected $idColumnName = "teilnehmerID";
    protected $parentIdColumnName = "gruppenID";

    /**
     * Creates or Updates the given Value on the DB
     * @param Teilnehmer $teilnehmer : Teilnehmer to be added/updated
     * @return bool|int|string : result depending on state
     */
    public function createOrUpdate(Teilnehmer $teilnehmer)
    {
        $sql= "";
        if($teilnehmer->id == 0)
        {
            $sql = "INSERT INTO `Teilnehmer`(`vname`,`nname`,`gebdate`,`mail`,`geschlechtID`,`gruppenID`,`projektID`) 
                    VALUES('".$this->Database->escapeString($teilnehmer->vorname)."',
                           '".$this->Database->escapeString($teilnehmer->nachname)."',
                           '".$this->Database->escapeString($teilnehmer->geburtsdatum)."',
                           '".$this->Database->escapeString($teilnehmer->mail)."',
                           '".$this->Database->escapeString($teilnehmer->geschlechtID)."',
                           '".$this->Database->escapeString($teilnehmer->gruppenID)."',
                           '".$this->Database->escapeString($teilnehmer->projektID)."')";
        }
        else{
            $sql = "UPDATE `Teilnehmer`
                    SET '`vname`=".$this->Database->escapeString($teilnehmer->vorname)."',
                        '`nname` = ".$this->Database->escapeString($teilnehmer->nachname)."',
                        '`gebdate` = ".$this->Database->escapeString($teilnehmer->geburtsdatum)."',
                        '`mail` = ".$this->Database->escapeString($teilnehmer->mail)."',
                        '`geschlechtID` = ".$this->Database->escapeString($teilnehmer->geschlechtID)."',
                        '`gruppenID` = ".$this->Database->escapeString($teilnehmer->gruppenID)."',
                        '`projektID` = ".$this->Database->escapeString($teilnehmer->projektID)."'
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
}