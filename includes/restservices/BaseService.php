<?php

abstract class BaseService
{
    protected $Database = null;
    abstract protected function getRequest($data);
    abstract protected function createRequest($data);
    abstract protected function saveRequest($data);
    abstract protected function deleteRequest($data);

    public function __construct()
    {
        $this->Database = new Database();
    }

    public function __destruct()
    {
        $this->Database = null;
    }

    public function processRequest($method, $data)
    {
        switch($method)
        {
            case 'post':
                $this->createRequest($data);
                break;
            case 'put':
                $this->saveRequest($data);
                break;
            case 'delete':
                $this->deleteRequest($data);
                break;
            case 'get':
            default:
                $this->getRequest($data);
                break;
        }
    }

    public static function returnJSON($result=False, $setMessage='API call failed!', $data=array())
    {
        $jsonResponse = new JSON();
        $jsonResponse->result = $result;
        $jsonResponse->setMessage($setMessage);
        $jsonResponse->setData($data);
        $jsonResponse->send();
    }
}
