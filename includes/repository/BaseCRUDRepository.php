<?php

abstract class BaseCRUDRepository extends BaseRepository
{
    protected $tableName;
    protected $idColumnName;
    protected $parentIdColumnName;

    /**
     * Gets all Ids of requested Item by using the given ParentID
     * @param $id : Parent ID
     * @return array|null : array of Ids
     */
    public function getIdListByParentId($id)
    {
        $sql = "SELECT `" . $this->Database->escapeString($this->idColumnName) . "`
                FROM `" . $this->Database->escapeString($this->tableName) .
            "` WHERE `" . $this->Database->escapeString($this->parentIdColumnName) . "` ='" . $this->Database->escapeString($id) . "'";
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
        $sql = "SELECT *
                FROM `" . $this->Database->escapeString($this->tableName) .
            "` WHERE `" . $this->Database->escapeString($this->idColumnName) . "`='" . $this->Database->escapeString($id) . "'";
        $result = $this->Database->query($sql);
        if ($this->Database->numRows($result) == 0) {
            return null; //not found!
        }
        $row = $this->Database->fetchObject($result);
        return $row;
    }

    /**
     * Deletes Object based on ID from the DB
     * @param $id : Id of the Object
     * @return bool|mysqli_result : result of Query execution
     */
    public function delete($id)
    {
        $sql = "DELETE 
                FROM `" . $this->Database->escapeString($this->tableName) .
            "` WHERE `" . $this->Database->escapeString($this->idColumnName) . "`='" . $this->Database->escapeString($id) . "'";

        return $this->Database->query($sql);
    }
}