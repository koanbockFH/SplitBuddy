<?php

echo $this->header;

?>


    <div class="container">
        <!-- loginfelder -->
        <div class="row">
            <div class="col-sm-2">

            </div>

            <div class="col-sm-8">
                <div class="loginForm">
                    <h1>Anmelden</h1>

                    <div>
                        <label for="user">Benutzername oder E-Mail</label>
                        <input type="text" class="form-control" id="user"  name="user">
                        <label id="userFeedback" class="feedback"></label>
                    </div>

                    <div>
                        <label for="password">Passwort</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <label id="passwordFeedback" class="feedback"></label>
                    </div>

                    <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

                    <button type="submit" class="btn" id="submitPassword" value="Absenden">Anmelden</button>
                </div>
            </div>


            <div class="col-sm-2">

            </div>
        </div>
    </div>







<?php

echo $this->footer;

?>