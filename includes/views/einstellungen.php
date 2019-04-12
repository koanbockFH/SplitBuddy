<?php

echo $this->header;

?>


    <div>

        <h1>Einstellungen</h1>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="amountGroup" id="amountGroup" value="option1">
            <label class="form-check-label" for="amountGroup">Anzahl der Gesamtgruppen</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="amountParticipants" id="amountParticipants" value="option2">
            <label class="form-check-label" for="amountParticipants">Anzahl der Teilnehmber</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="indvGroup" id="indvGroup" value="option3">
            <label class="form-check-label" for="indvGroup">Individuelle Gruppen</label>
        </div>

        <h2>Sortierkriterien</h2>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="age" id="age" value="option1">
            <label class="form-check-label" for="amountGroup">nach Alter</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender" value="option2">
            <label class="form-check-label" for="gender">nach Geschlcht</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="noOpt" id="noOpt" value="option3">
            <label class="form-check-label" for="noOpt">keine zusätliche Gruppierung</label>
        </div>

        <h2>Zusatzeinstellung</h2>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Blacklisting</label>
        </div>

        <button type="submit" class="btn btn-primary">weiter</button>




    </div>





<?php

echo $this->footer;

?>