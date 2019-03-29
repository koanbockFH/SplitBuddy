<?php

echo $this->header;

?>

    <div class="registerfeld">
        <h1>Registrieren</h1>

        <form class="form-inline">
            <div class="form-group">
                <label for="vorname">Vorname</label>
                <input type="text" class="form-control" id="vorname" placeholder="Vorname eingeben" name="vorname">
            </div>


            <div class="form-group">
                <label for="nachname">Nachname</label>
                <input type="text" class="form-control" id="nachname" placeholder="nachname eingeben" name="nachname">
            </div>



        </form>






















        <form>


            <div class="form-group">
                <label for="pwd">Passwort</label>
                <input type="password" class="form-control" id="pwd" placeholder="Passwort eingeben" name="pwd">
            </div>

            <div class="form-group">
                <label for="pwd-control">Passwort überprüfe </label>
                <input type="password" class="form-control" id="pwd-control" placeholder="Passwort eingeben" name="pwd">
            </div>

            <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

            <button type="submit" class="btn btn-default">Anmelden</button>
        </form>
    </div>


<?php

echo $this->footer;

?>