<?php

abstract class SessionCached
{
    public function __construct()
    {
        if ($_SESSION[get_class($this) . 'Data'] != '') {
            $ship = $_SESSION[get_class($this) . "Data"];
            $this->loadFromSessionData($ship);
        }
    }

    /**
     * save our values in the session
     */
    public function __destruct()
    {
        $_SESSION[get_class($this).'Data'] = $this->saveSessionData();
    }


    /**
     * Gets all attributes from this class, serializes it adds slashes to save this string in the session
     * @return string
     */
    protected function saveSessionData()
    {
        $data = serialize($this);
        $data = addslashes($data);
        return $data;
    }

    /**
     * Loads Data of this class/instance with the data from the session which was previously saved
     * @param $serializedData
     */
    protected function loadFromSessionData($serializedData)
    {
        $serializedData = stripslashes($serializedData);
        $deserializedObject = unserialize($serializedData);
        $ro = new reflectionObject($deserializedObject);
        //Map Object
        foreach ($ro->getProperties() as $propObj)
        {
            $this->{$propObj->name} = $deserializedObject->{$propObj->name};
        }
    }
}