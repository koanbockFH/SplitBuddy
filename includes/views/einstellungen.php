
<?php

echo $this->header;

?>
<style xmlns="http://www.w3.org/1999/html">
    h1 {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 50px;
    }

    .row {
        margin-bottom: 30px;
    }

    .button{
        text-align: center;
        margin-top: 60px;
    }

    .sb-subheading{
        font-weight: bold ;
    }

    #amountGroup{
        width: 60px;
    }


</style>

<form class="needs-validation" novalidate id="sb-basisinformation-form">

    <div class="container">

        <h1>Einstellungen</h1>

        <fieldset class="form-group">
            <div class="row">
                <div class="col-md-3"></div>
                <legend class="col-form-label col-md-3 sb-subheading">Gruppeneinstellung:</legend>
                <div class="col-md-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="amountGroup" name="customRadio" class="custom-control-input" onclick="addZaehler()">
                        <label class="custom-control-label" for="amountGroup">Anzahl der Gesamtgruppen</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="amountParticipants" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="amountParticipants">Anzahl der Teilnehmer</label>
                    </div>


                    <div class="custom-control custom-radio">
                        <input type="radio" id="indvGroup" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="indvGroup">Individuelle Gruppe</label>
                    </div>

                </div>
            </div>
        </fieldset>

        <fieldset class="form-group" id="showAmount" style="display:none">
            <div class="row" >
                <div class="col-md-3"></div>
                <legend class="col-form-label col-md-3 sb-subheading">Anzahl:</legend>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="amountGroup" class="form-control">
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
                        <input type="radio" id="age" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="age">nach Alter</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="gender" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="gender">nach Geschelcht</label>
                    </div>


                    <div class="custom-control custom-radio">
                        <input type="radio" id="noOpt" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="noOpt">keine zusätliche Gruppierung</label>
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

<script>

    function addZaehler() {

        //Get the checkbox
        var checkBoxAmountGroup = document.getElementById("amountGroup");
        var anzahl = document.getElementById("showAmount");

        if(checkBoxAmountGroup.checked == true)
        {
            anzahl.style.display = "block";
        }
        else
        {
            anzahl.style.display = "none";
        }
    }

    function validateAmoun() {


    }
</script>





<?php

echo $this->footer;

?>