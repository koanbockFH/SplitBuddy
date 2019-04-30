<?php

echo $this->header;

?>
<div class="container mb-5 mt-5">
    <div class="sb-whiteBackground">
        <h1 class="display-1">Ergebnis</h1>
    <?php if(is_null($this->projekt)):?>
        <div class="text-center">Da ist etwas schief gelaufen</div>
    <?php else: $counter = 0;?>
        <?php foreach($this->projekt->gruppen as $gruppe) { ?>
            <?php if($counter++ % 2 == 0): ?>
            <div class="row gruppen-row">
            <?php endif ?>
            <div class="col-5 gruppe">
                <h3 id="group"><?php echo $gruppe->gruppenname ?></h3>
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

1u 1su 2wg
2g 3wu 4sg
3u 5su 6wg
4g 7wu 8sg

<?php
echo $this->footer;

?>
