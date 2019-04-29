<?php

/**
 * Class TeilnehmerRepository - Gives access to DB Results
 */
class TeilnehmerRepository extends BaseRepository
{
    /**
     * Gets all Ids of requested Item by using the given ParentID
     * @param $id : Parent ID
     * @return array|null : array of Ids
     */
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

    /**
     * Gets Data by ID from DB
     * @param $id : ID of DB Value
     * @return object|null : DB Row
     */
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

    /**
     * Deletes Object based on ID from the DB
     * @param $id : Id of the Object
     * @return bool|mysqli_result : result of Query execution
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `Teilnehmer`
                WHERE `teilnehmerID`='" . $this->Database->escapeString($id) . "'";

        return $this->Database->query($sql);
    }
}