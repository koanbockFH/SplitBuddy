<?php

echo $this->header;

?>

    <div class="container">
        <?php echo $this->readPartialView('basisinformation'); ?>
        <?php echo $this->readPartialView('teilnehmer'); ?>
        <?php echo $this->readPartialView('einstellungen'); ?>
    </div>

<?php

echo $this->footer;

?>