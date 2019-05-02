<h2 class="text-center mb-6 sb-h2-open">Einstellungen</h2>

<form novalidate id="sb-einstellungen-form">
        <fieldset class="form-group">
            <div class="row row-einstellungen">
                <div class="col-md-3" ></div>
                <legend class="col-form-label col-md-3 sb-subheading">Gruppeneinstellung:</legend>
                <div class="col-md-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioAmountGroup" name="RadioGruppenEinstellung" class="custom-control-input" value="0" checked onchange="toggleAmount()">
                        <label class="custom-control-label label-not-bold" for="RadioAmountGroup">Anzahl der Gesamtgruppen</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioAmountParticipants" name="RadioGruppenEinstellung" class="custom-control-input" value="1" onchange="toggleAmount()">
                        <label class="custom-control-label label-not-bold" for="RadioAmountParticipants">Anzahl der Gruppenteilnehmer</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioAmountIndvGroup" name="RadioGruppenEinstellung" class="custom-control-input" value="2" onchange="toggleAmount()">
                        <label class="custom-control-label label-not-bold" for="RadioAmountIndvGroup">Individuelle Gruppen</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group" id="amount-field">
            <div class="row row-einstellungen" >
                <div class="col-md-3"></div>
                <legend class="col-form-label col-md-3 sb-subheading">Anzahl:</legend>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" id="amount" class="form-control" onclick="validateAmount()" onkeyup="validateAmount()" value="0">
                        <div id="feedbackAmount" class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <div class="row row-einstellungen">
                <div class="col-md-3"></div>
                <legend class="col-form-label col-md-3 pt-0 sb-subheading">Sortierkriterien:</legend>
                <div class="col-md-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioAge" name="RadioSortierKriterien" class="custom-control-input" value="0" >
                        <label class="custom-control-label label-not-bold" for="RadioAge">nach Alter</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioGender" name="RadioSortierKriterien" class="custom-control-input" value="1" >
                        <label class="custom-control-label label-not-bold" for="RadioGender">nach Geschelcht</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="RadioNoOpt" name="RadioSortierKriterien" class="custom-control-input" checked value="2" >
                        <label class="custom-control-label label-not-bold" for="RadioNoOpt">keine zusätzliche Gruppierung</label>
                    </div>
                </div>
            </div>
        </fieldset>


    <div class="button row justify-content-center">
        <div class="col-md-6 mb-3">
            <button type="submit" class="btn btn-primary" id="einstellungen-submit">Zum Ergebnis</button>
        </div>
    </div>
</form>