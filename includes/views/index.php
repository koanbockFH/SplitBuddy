<?php

echo $this->header;

?>






    <div class="container">

    <div class="row center">

        <div class="col-xs-6 col-lg-12">

            <div>
                <div class="logo">
                    <i class="fas fa-2x fa-robot align-top d-lg-inline-block"></i>
                    <h1 class="align-baseline ml-1 d-inline">SplitBuddy</h1>
                </div>
            </div>

        </div>


    </div>

        <div class="row">

            <div class="col-xs-6 col-lg-12">



                <div class="description">
                    <h3>Gruppenaufteilung</h3>

                    <p>Mind. 4 Teilnehmer</p>
                    <p>Egal ob Lehrer, Sommercampbetreuer oder unter Freunden,
                        jeder braucht Gruppeneinteilungen.
                        SplitBuddy übernimmt das mühsame Gruppen bilden für dich.
                        Einfach Teilnehmer eingeben, Einstellungen treffen und fertig.
                    </p>

                    <?php if(LOGGED_IN == true): ?>
                       <a href="addProject"><button class="btn" type="button">Jetzt loslegen</button></a>
                    <?php endif ?>

                    <?php if(LOGGED_IN == false): ?>
                       <a href="login"><button class="btn" type="button">Jetzt anmelden</button></a>
                    <?php endif ?>

                </div>



            </div>

        </div>


    </div>









<?php

echo $this->footer;

?>
