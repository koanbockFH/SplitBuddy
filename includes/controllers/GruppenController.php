<?php

class GruppenController extends Controller
{
    protected $viewFileName = "gruppen"; //this will be the View that gets the data...


    public function run()
    {
        $this->view->title = "Meine Gruppen";

        if (isset($_GET['id'])) {
            $projektRepo = new ProjektRepository();

            $this->view->projektListe = $projektRepo->getAllByUserId($_GET['id']);

            if(sizeof($this->view->projektListe) == 0)
            {
                $this->view->projektListe = null;
            }
        }
    }
}