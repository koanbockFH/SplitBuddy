<?php

/**
 * Class GruppeRepository - Gives access to DB Results
 */
class GruppeRepository extends BaseRepository
{
    /**
     * Gets all Ids of requested Item by using the given ParentID
     * @param $id : Parent ID
     * @return array|null : array of Ids
     */
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

    /**
     * Gets Data by ID from DB
     * @param $id : ID of DB Value
     * @return object|null : DB Row
     */
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

    /**
     * Deletes Object based on ID from the DB
     * @param $id : Id of the Object
     * @return bool|mysqli_result : result of Query execution
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `Gruppen`
                WHERE `gruppenID`='" . $this->Database->escapeString($id) . "'";

        return $this->Database->query($sql);
    }
}