<?php

class ProjektService extends BaseService
{
    protected function getRequest($data)
    {
        return; //not Used
    }

    protected function createRequest($data)
    {
        if(sizeOf($data) == 0)
        {
            return;
        }

        $dataObj = json_decode($data);
    }

    protected function saveRequest($data)
    {
        return; //not Used
    }

    protected function deleteRequest($data)
    {
        return; //not Used
    }
}