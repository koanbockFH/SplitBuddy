<?php

class GeschlechtRepository extends BaseRepository
{
    public function getById($id)
    {
        $sql = "SELECT `geschlechtID`,
                        `geschlecht`,
                        `kuerzel`
                FROM `Geschlecht` WHERE `geschlechtID`='" . $this->Database->escapeString($id) . "'";
        $result = $this->Database->query($sql);
        if ($this->Database->numRows($result) == 0) {
            return null; //not found!
        }
        $row = $this->Database->fetchObject($result);
        return $row;
    }
}