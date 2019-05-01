<?php

class GruppenController extends BaseController
{
    protected $viewFileName = "meineGruppen"; //this will be the View that gets the data...
    protected $loginRequired = true;

    public function run()
    {
        $this->view->title = "Meine Gruppen";

        $projektRepo = new ProjektRepository();

        $this->view->projektListe = $projektRepo->getAllByUserId($this->sessionUser->id );


        if(!is_null($this->view->projektListe)&& sizeof($this->view->projektListe) == 0)
        {
            $this->view->projektListe = null;
        }
    }
}