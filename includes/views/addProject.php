<?php

echo $this->header;

?>
    <div class="container mb-5 mt-5">
    <div class="sb-whiteBackground">
            <h1 class="display-1" id="projectHeader">Neues Projekt</h1>
            <div class="collapse" id="basisinfo-passive">
                <h2 class="d-inline-block mb-0">Informationen</h2>
                <button class="btn btn-secondary btn-info sb-icon-btn float-right" id="basisinfo-edit"><i
                            class="fas fa-pencil-alt"></i></button>
                <div class="invalid-feedback sb-card-error">Bitte vervollständigen Sie Ihre Daten!</div>
            </div>
            <div class="collapse show" id="basisinfo-active">
                <?php echo $this->readPartialView('basisinformation'); ?>
            </div>
            <hr>
            <div class="collapse show" id="teilnehmer-passive">
                <h2 class="d-inline-block mb-0">Teilnehmer</h2>
                <button class="btn btn-secondary btn-info sb-icon-btn float-right" id="teilnehmer-edit"><i
                            class="fas fa-pencil-alt"></i></button>
                <div class="invalid-feedback sb-card-error">Bitte vervollständigen Sie Ihre Daten!</div>
            </div>
            <div class="collapse" id="teilnehmer-active">
                <?php echo $this->readPartialView('teilnehmer'); ?>
            </div>

            <div class="collapse show" id="einstellungen-passive">
                <hr>
                <h2 class="d-inline-block mb-0">Einstellungen</h2>
                <button class="btn btn-secondary btn-info sb-icon-btn float-right" id="einstellungen-edit"><i
                            class="fas fa-pencil-alt"></i></button>
                <div class="invalid-feedback sb-card-error">Bitte vervollständigen Sie Ihre Daten!</div>
            </div>
            <div class="collapse" id="einstellungen-active">
                <hr>
                <?php echo $this->readPartialView('einstellungen'); ?>
            </div>

            <div class="collapse d-none" id="indvGruppe-passive">
                <hr>
                <h2 class="d-inline-block mb-0">Gruppen</h2>
                <button class="btn btn-secondary btn-info sb-icon-btn float-right" id="indvGruppe-edit"><i
                            class="fas fa-pencil-alt"></i></button>
                <div class="invalid-feedback sb-card-error">Bitte vervollständigen Sie Ihre Daten!</div>
            </div>
            <div class="collapse" id="indvGruppe-active">
                <hr>
                <?php echo $this->readPartialView('indvGruppe'); ?>
            </div>
        </div>
    </div>
<?php

echo $this->footer;

?>