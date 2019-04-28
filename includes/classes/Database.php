<?php
/**
 * Class Database
 * This Class uses the mysqli procedural functions to establish, close a connection to the database or to perform any
 * queries and fetch the results
 */
class Database
{
    private $conn = null; //Attribute which represents the Database Connection Resource
    /**
     * Database constructor.
     * Once the Object is created - a database connection is established
     */
    function __construct()
    {
        //the constructor requires, that a DB_HOST, DB_NAME, DB_USER and DB_PASS was previously defined.
        $host			= DB_HOST;
        $dbname			= DB_NAME;
        $user			= DB_USER;
        $pass			= DB_PASS;
        //establish the connection to the databse
        $conn = mysqli_connect($host, $user, $pass);
        if(!$conn) //if we failed to establish the connection - output error and stop executing php
        {
            error_log( "Connection to the database failed!" );
            die("Connection to the database failed!");
        }
        $this->conn = $conn; //save the connection resource in our object - maybe we need it later
        //select the database
        $db_sel = mysqli_select_db($this->conn, $dbname);
        if(!$db_sel) //throw error if database couldn't be selected and stop executing php
        {
            error_log( "Can't select database with name " .  $dbname . " !");
            die("Can't select database with name " .  $dbname . " !");
        }
        //this is to ensure, that mysql operates with characterset utf-8
        $this->query("SET NAMES 'utf8'");
    }
    /**
     * since a destructer is called when the object is removed - we can be sure, that the connection to the database will be closed
     */
    function __destruct()
    {
        //close the connection - the @ in front of the function call suppresses any error that might be thrown - i.e. invalid connection - if the connection is invalid
        //it would mean that it was closed or never established - therefore we don't care about the connection anymore
        //this is the reason why we don't want any errors to appear
        @mysqli_close($this->conn);
    }
    /**
     * Performs an SQL Statement and returns the resultset - if the resultset is not false - if the resultset is false - the error will be returned
     * @param $sql String (SQL Statement)
     * @return bool|mysqli_result (Resultset or an error and stop execution)
     */
    public function query($sql)
    {
        $result = mysqli_query($this->conn, $sql);
        if ($result == false)
        {
            echo "<b>Fatal Error!</b> MySQL-Error (".mysqli_errno($this->conn)."): ".mysqli_error($this->conn);
            echo "<br><br>Query:<br>\n";
            echo $sql."\n<br>";
            die();
        }
        return $result;
    }
    /**
     * Fetches one Row of the Resultset as Object (if there is still a row)
     * @param $result
     * @return null|object
     */
    public function fetchObject($result)
    {
        return mysqli_fetch_object($result);
    }
    /**
     * Fetches one Row of the Resultset as Array (if there is still a row)
     * @param $result
     * @return array|null
     */
    public function fetchArray($result)
    {
        return mysqli_fetch_array($result);
    }
    /**
     * Fetches one Row of the Resultset as associative Array (if there is still a row)
     * @param $result
     * @return array|null
     */
    public function fetchAssoc($result)
    {
        return mysqli_fetch_assoc($result);
    }
    /**
     * Fetches the first result
     * @param $result
     * @return bool
     */
    public function fetchSingleResult($result)
    {
        if (!mysql_num_rows($result)) return false;
        else return mysqli_data_seek($result,0);
    }
    /**
     * Escapes a String so that an SQL Injection can be prevented
     * @param $string
     * @return string
     */
    public function escapeString($string)
    {
        return mysqli_real_escape_string($this->conn, $string);
    }
    /**
     * Returns the number of results in the resultset
     * @param $result
     * @return int
     */
    public function numRows($result)
    {
        if($result == false)
            return 0;
        return mysqli_num_rows($result);
    }
    /**
     * Returns the last id that was given after an insert with "auto_increment"
     * @return int|string
     */
    public function insertId()
    {
        return mysqli_insert_id($this->conn);
    }
    /**
     * Returns the current Connection Ressource
     * @return mysqli
     */
    public function getConn()
    {
        return $this->conn;
    }
}