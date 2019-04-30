<?php

/**
 * Class Geschlecht
 */
class Geschlecht
{
    public $id;
    public $geschlecht;
    public $kuerzel;

    /**
     * Sets Values of Instance to the given Data found in Database by the given ID
     * @param $id : of value in DB
     */
    public function get($id)
    {
        $repo = new GeschlechtRepository();

        $data = $repo->getById($id);

        $this->id = $data->geschlechtID;
        $this->geschlecht = $data->geschlecht;
        $this->kuerzel = $data->kuerzel;
    }
}