<?php

echo $this->header;

?>

<div class="sb-einstellungen">
    <h1>Einstellungen</h1>
    <div id="settings">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="amountGroup" id="amountGroup" value="option1">
            <label class="form-check-label" for="amountGroup">Anzahl der Gesamtgruppen</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="amountParticipants" id="amountParticipants" value="option2">
            <label class="form-check-label" for="amountParticipants">Anzahl der Teilnehmer pro Gruppe</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="amountParticipants" id="amountParticipants" value="option3">
            <label class="form-check-label" for="amountParticipants">Individuelle Gruppen</label>
        </div>

        <div>
            <select class="custom-select my-1 mr-sm-2" id="anzahlGruppen">
                <option selected>Anzahl</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
            </select>
        </div>

    </div>

    <h2>Sortierkriterien</h2>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="age" id="age" value="option1">
        <label class="form-check-label" for="age">Alter</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="geschlecht" id="geschlecht" value="option2">
        <label class="form-check-label" for="geschlecht">Geschlecht</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="noOption" id="noOption" value="option3">
        <label class="form-check-label" for="noOption">keine zusätzliche Gruppierung</label>
    </div>

    <h2>Zusatzkriterien</h2>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="blacklisting" value="option1">
        <label class="form-check-label" for="blacklisting">Blacklisting</label>
    </div>

    <button type="submit" class="btn btn-primary" value="Absenden">Weiter</button>






</div>


<?php

echo $this->footer;

?>