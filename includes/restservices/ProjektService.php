<?php

class ProjektService extends BaseService
{
    protected function getRequest($data)
    {
        return; //not Used
    }

    protected function saveRequest($data)
    {
        return; //not Used
    }

    protected function deleteRequest($data)
    {
        return; //not Used
    }

    protected function createRequest($data)
    {
        if (!isset($data['data'])) {
            return;
        }

        //Hole Daten von Post
        $jsonObj = json_decode($data['data']);

        $projekt = new Projekt();
        $projekt->loadFromJSON($jsonObj);
        $teilnehmerListe = array();

        foreach ($jsonObj->teilnehmer as $tJsonObj) {
            $t = new Teilnehmer();
            $t->loadFromJSON($tJsonObj);
            array_push($teilnehmerListe, $t);
        }




        // Sortierung
        $sortedArray = $this->sortTeilnehmer($teilnehmerListe, $projekt);

        //Alle Daten vorbereitet, nun muss die Aufteilung gemacht werden

        $this->calculateGruppen($teilnehmerListe, $projekt);



        //Speichere Daten in DB
        $projekt->createOrUpdate();

        $this->returnJSON(true, "Successful", array("id" => $projekt->id));
    }

    private function calculateGruppen($teilnehmerListe, Projekt $projekt)
    {
        //Anzahl der Gruppen
        if ($projekt->gruppenAufteilungType == 0) {
            $this->divideByGroupCount($teilnehmerListe, $projekt->anzahl, $projekt);
        }
        else if ($projekt->gruppenAufteilungType == 1) {
            $this->divideByGroupCount($teilnehmerListe, $projekt->anzahl, $projekt, false);
        } //TODO Anzahl Teilnehmer und indiv. Gruppen hinzufügen & deren respektive Methode wie "DivideByGroupCount"
        else {
            $this->divideIndividualGroup($teilnehmerListe, $projekt);
        }
    }

    function sortTeilnehmer($teilnehmerListe, $projekt){


        if ($projekt->sortierType == 0){
            // Sortierung: Datum (Älteste zuerst)
            usort($teilnehmerListe, function($a, $b){
                return strtotime($b->geburtsdatum) - strtotime($a->geburtsdatum);
            });
        }

        else if($projekt->sortierType == 1) {
            // Sortierung: Geschlecht (Männlich zuerst)
            usort($teilnehmerListe, function($a, $b){
                return $a->geschlechtID > $b->geschlechtID;
            });
        };

        return $teilnehmerListe;
    }

    /**
     * @param Teilnehmer $teilnehmer <- if we have this - we have a reference to Project...
     * @param $anzahl
     * @param Projekt $projekt <- why?
     * @param divideByGroups boolean (true: divide by Groups false: put anzahl Teilnehmer into Groups)
     */
    public function divideByGroupCount($teilnehmerListe, $anzahl, Projekt $projekt)
    {
        //wenn keine sortierung zuvor ist funktioniert dieser Code
        if ($projekt->sortierType == 2){

            //sortierung / vorher oder nachher?...
            if ($projekt->gruppenAufteilungType == 0) {
                //diesen code anpassen

                $counter = 0;
                $groups = array();


                foreach ($teilnehmerListe as $teilnehmer) {

                    $groupnumber = $counter % intval($anzahl);

                    //var_dump($groupnumnber);

                    $groups[$groupnumber][] = $teilnehmer;

                    $counter++;
                }

            } else if ($projekt->gruppenAufteilungType == 1) {

                $counter = 0;

                $groupnumnber = 0;

                foreach ($teilnehmerListe as $teilnehmer) {

                    if ($teilnehmer % intval($anzahl) == 0) {
                        $groupnumnber++;
                    }



                    $groups[$groupnumnber][] = $teilnehmer;

                    $counter++;
                }

                //var_dump($groups);

            }


            foreach ($groups as $group) {
                $newGroup = new Gruppe();

                foreach ($group as $teilnehmer) {

                    $newGroup->addTeilnehmer($teilnehmer);
                }

                $newGroup->sortTeilnehmer($teilnehmerListe, $projekt);
                $projekt->addGruppe($newGroup);
            }

            return $projekt;
        }

        //wenn eine sortierung ist muss der Code verändert werden
        else {

                if ($projekt->gruppenAufteilungType == 0)
                {
                    //diesen code anpassen



                }

            }









        }








        //GruppenAufteilung hier machen BEGINN
        /*$one = new Gruppe();
        $two = new Gruppe();

        $one->addTeilnehmer($teilnehmer[0]);
        $one->addTeilnehmer($teilnehmer[1]);
        $two->addTeilnehmer($teilnehmer[2]);
        $two->addTeilnehmer($teilnehmer[3]);

        //ENDE

        //Hier die erzeugten Gruppen Hinzufügen
        $projekt->addGruppe($one);
        $projekt->addGruppe($two);*/




    private function divideIndividualGroup($teilnehmerListe, Projekt $projekt)
    {


        //für jede gruppe --> foreach --> foreach teilnehmer die hinzugefügt werden -->

        //oder zuerst Teilnehmer nnehmen und in gruppe stecken --> foreach

        //gruppen müssen nicht erstellt werden --> diese gibt es schon un djede gruppe hat
        //hat eine fixe teilnehmeranzahl


        $ueberlaufGruppe = new Gruppe();
        foreach ($teilnehmerListe as $teilnehmer) {
            $nochPlatz = false;
            foreach ($projekt->gruppen as $gruppe) {
                if ($nochPlatz == false && sizeof($gruppe->teilnehmer) != $gruppe->anzahl) {
                    $gruppe->addTeilnehmer($teilnehmer);
                    $nochPlatz = true;
                }
            }
            if($nochPlatz == false){
                $ueberlaufGruppe->addTeilnehmer($teilnehmer);
            }

        }
        if(sizeof($ueberlaufGruppe->teilnehmer)>0)
        {
            $projekt->addGruppe($ueberlaufGruppe);
        }

        return $projekt;



}
}



