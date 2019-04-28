<?php

class Teilnehmer
{
    public $id;
    public $vorname;
    public $nachname;
    public $geburtsdatum;
    public $mail;
    public $geschlecht;

    public $projektID;
    public $gruppenID;
    public $geschlechtID;

    public function get($id)
    {
        $repo = new TeilnehmerRepository();

        $data = $repo->getById($id);

        $this->id = $data->teilnehmerID;
        $this->vorname = $data->vname;
        $this->nachname = $data->nname;
        $this->geburtsdatum = $data->gebdate;
        $this->projektID = $data->projektID;
        $this->gruppenID = $data->gruppenID;
        $this->geschlechtID = $data->geschlechtID;

        $this->geschlecht = new Geschlecht();
        $this->geschlecht->get($data->geschlechtID);
    }

    public function createOrUpdate()
    {
        $repo = new TeilnehmerRepository();
        return $repo->createOrUpdate($this);
    }

    public function delete()
    {
        $repo = new TeilnehmerRepository();
        return $repo->delete($this->id);
    }
}