
<?php

echo $this->header;

?>

<form id="sb-basisinformation-form">

    <div class="container">

        <h1>Einstellungen</h1>

        <fieldset class="form-group">
            <div class="row">
                <div class="col-md-3"></div>
                <legend class="col-form-label col-md-3 sb-subheading">Gruppeneinstellung:</legend>
                <div class="col-md-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioAmountGroup" name="customRadio" class="custom-control-input" onclick="addZaehler(0)" >
                        <label class="custom-control-label" for="RadioAmountGroup">Anzahl der Gesamtgruppen</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioAmountParticipants" name="customRadio" class="custom-control-input" onclick="addZaehler(0)">
                        <label class="custom-control-label" for="RadioAmountParticipants">Anzahl der Teilnehmer</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioIndvGroup" name="customRadio" class="custom-control-input" onclick="addZaehler(1)" checked>
                        <label class="custom-control-label" for="RadioIndvGroup">Individuelle Gruppe</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group amountField" id="showAmount">
            <div class="row" >
                <div class="col-md-3"></div>
                <legend class="col-form-label col-md-3 sb-subheading">Anzahl:</legend>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" id="amount" class="form-control" onclick="validateAmount()" onkeyup="validateAmount()">
                        <label id="feedbackAmount" class="feedback"></label>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <div class="row">
                <div class="col-md-3"></div>
                <legend class="col-form-label col-md-3 pt-0 sb-subheading">Sortierkriterien:</legend>
                <div class="col-md-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioAge" name="customRadio1" class="custom-control-input">
                        <label class="custom-control-label" for="RadioAge">nach Alter</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioGender" name="customRadio1" class="custom-control-input">
                        <label class="custom-control-label" for="RadioGender">nach Geschelcht</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioNoOpt" name="customRadio1" class="custom-control-input" checked>
                        <label class="custom-control-label" for="RadioNoOpt">keine zusätliche Gruppierung</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-3 sb-subheading">Zusatzeinstellung:</div>
            <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="blacklisting">
                    <label class="custom-control-label" for="blacklisting">Blacklisting</label>
                </div>
            </div>
        </div>

        <div class="button row justify-content-center">
            <div class="col-md-6 mb-3">
                <button type="submit" class="btn btn-primary" id="submitButton">weiter</button>
            </div>
        </div>
    </div>
</form>



<?php

echo $this->footer;

?>