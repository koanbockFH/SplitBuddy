<?php



class JSON
{
    private $arrData = array();
    private $result = false;
    private $message = '';

    public function __construct()
    {

    }


    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if($name == 'result')
        {
            $this->result = ($value);
        }
        else if($name != 'message')
        {
            $this->arrData[$name] = $value;
        }
    }


    /**
     * set an associative array as data
     * @param $assocArrayWithData
     */
    public function setData($assocArrayWithData)
    {
        foreach($assocArrayWithData as $key => $value)
        {
            $this->arrData[$key] = $value;
        }
    }



    public function setMessage($string)
    {
        $this->message = $string;
    }



    public function getData()
    {
        $dataToReturn = array();
        $dataToReturn['result'] = $this->result;

        if ($this->message != '') $dataToReturn['message'] = $this->message;

        if (!empty($this->arrData))
        {
            foreach($this->arrData as $key => $value)
            {
                $dataToReturn['data'][$key] = $value;
            }
        }

        return (object) $dataToReturn;
    }



    public function send($valuesToSend=false, $exit=true)
    {
        // set the status
        header('HTTP/1.1 200 OK');
        // set the content type
        header('Content-type: application/json');
        // set X-UA-Compatible for IE9
        header('X-UA-Compatible: IE=edge, chrome=1');

        if ($valuesToSend) echo json_encode($valuesToSend);
        else echo json_encode($this->getData());

        if ($exit) exit;
    }

}
