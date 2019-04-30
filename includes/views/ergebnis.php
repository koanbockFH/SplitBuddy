<?php

echo $this->header;

?>
<div class="container mb-5 mt-5">
    <div class="sb-whiteBackground">
        <h1 class="display-1">Ergebnis</h1>
    <?php if(is_null($this->projekt)):?>
        <div class="text-center ">Da ist etwas schief gelaufen</div>
    <?php else: $counter = 0;?>
        <?php $gruppenZaehler=1; ?>

        <?php foreach($this->projekt->gruppen as $gruppe) { ?>
            <?php if($counter++ % 2 == 0): ?>
            <div class="row justify-content-center">
            <?php endif ?>
            <div class="col-lg-5 gruppe">
                <h3 id="group">Gruppe <?php echo $gruppenZaehler++?></h3>
                <?php foreach($gruppe->teilnehmer as $teilnehmer) { ?>
                    <span><?php echo $teilnehmer->vorname ?></span>
                    <span><?php echo $teilnehmer->nachname ?></span><br>
                <?php } ?>
            </div>
            <?php if($counter % 2 == 0): ?>
                </div>
            <?php endif ?>
        <?php } ?>
    <?php endif ?>
    </div>
</div>


<?php
echo $this->footer;

?>
