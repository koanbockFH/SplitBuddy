<?php

class Geschlecht
{
    public $id;
    public $geschlecht;
    public $kuerzel;

    public function get($id)
    {
        $repo = new GeschlechtRepository();

        $data = $repo->getById($id);

        $this->id = $data->geschlechtID;
        $this->geschlecht = $data->geschlecht;
        $this->kuerzel = $data->kuerzel;
    }
}