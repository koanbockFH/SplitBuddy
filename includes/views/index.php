<?php

echo $this->header;

?>

    <div class="background-container  d-md-block">

    </div>

    <div class="container">
        <div class="row justify-content-center">

            <img src="../images/schrift.png" width="100%">

        </div>

    </div>


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-10 col-md-8">

                <div class="description">
                    <h3>Gruppenaufteilung</h3>

                    <p>Mind. 4 Teilnehmer</p>
                    <p>Diese Webanwendung ist für jeden der Gruppen einteilen muss.
                        Egal ob Lehrer, Sommercampbetreuer oder unter Freunden,
                        jeder braucht Gruppeneinteilungen.
                        SplitBuddy übernimmt das mühsame Gruppen bilden für dich.
                        Einfach Teilnehmer eingeben, Einstellungen treffen und fertig.
                    </p>

                    <?php if($this->loggedIn = true): ?>
                        <button class="btn" type="button">Jetzt loslegen</button>
                    <?php endif ?>

                    <?php if($this->loggedIn = false): ?>
                        <button class="btn" type="button">Jetzt anmelden</button>
                    <?php endif ?>

                </div>


            </div>

        </div>

        <div class="row justify-content-center">



        </div>
    </div>









<?php

echo $this->footer;

?>