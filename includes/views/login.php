
<?php

echo $this->header;

?>


<div class="loginfeld">
    <h1>Anmelden</h1>

    <form>
        <div class="form-group">
            <label for="email">Benutzername oder E-Mail</label>
            <input class="form-control" id="email" placeholder="E-Mail oder Benutzername eingeben" name="email oder benutzer">
        </div>

        <div class="form-group">
            <label for="pwd">Passwort</label>
            <input type="password" class="form-control" id="pwd" placeholder="Passwort eingeben" name="pwd">
        </div>

        <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

        <button type="submit" class="btn btn-default">Anmelden</button>
    </form>
</div>




<?php

echo $this->footer;

?>