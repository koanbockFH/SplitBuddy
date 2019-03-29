<?php

echo $this->header;

?>
    <div class="form-table">
        <h1>Anmelden</h1>
        <form action="/action_page.php">
            <label for="name oder mail">Benutzername oder E-Mail</label>
            <input type="text" id="benutzer" name="benutzer">

            <label for="passwort">Passwort</label>
            <input type="password" id="log-passwort" name="log-passwort">

            <input type="submit" value="Anmelden" class="btn">
        </form>

        <p>Sie haben noch kein Konto? Dann können Sie sich <a href="register">HIER</a> registrieren.</p>

    </div>


<?php

echo $this->footer;

?>