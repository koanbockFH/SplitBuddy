<?php

echo $this->header;

?>


    <div class="container">

        <div class="row justify-content-center logo">

            <h1>SPLITBUDDY</h1>

        </div>

    </div>


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xs-8 col-md-12">

                <div class="description">
                    <h3>Gruppenaufteilung</h3>

                    <p>Mind. 4 Teilnehmer</p>
                    <p>Diese Webanwendung ist für jeden der Gruppen einteilen muss.
                        Egal ob Lehrer, Sommercampbetreuer oder unter Freunden,
                        jeder braucht Gruppeneinteilungen.
                        SplitBuddy übernimmt das mühsame Gruppen bilden für dich.
                        Einfach Teilnehmer eingeben, Einstellungen treffen und fertig.
                    </p>

                    <?php if(LOGGED_IN == true): ?>
                        <button class="btn" type="button">Jetzt loslegen</button>
                    <?php endif ?>

                    <?php if(LOGGED_IN == false): ?>
                        <button class="btn" type="button">Jetzt anmelden</button>
                    <?php endif ?>

                </div>



            </div>

        </div>


    </div>









<?php

echo $this->footer;

?>