
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
        margin-bottom: 20px;
    }

    .button{
        text-align: center;
        margin-top: 60px;
    }

    .sb-subheading{
        font-weight: bold ;
    }

    #amount{
        width: 60px;
    }

    .amountField{
        display:none
    }



</style>

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
                        <input type="number" id="amount" class="form-control" onblur="validateAmount()">
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

<script>

    function addZaehler(x) {

        if(x==0)
        {
            document.getElementById("showAmount").style.display = "block";
        }
        else
        {
            document.getElementById("showAmount").style.display = "none";
        }
        return;
    }

    function validateAmount() {

        var amountId = document.getElementById("amount");
        var feedbackAmountId = document.getElementById("feedbackAmount");
        var that = this;

        this.checkForNumbers = function()
        {
            var x = document.getElementById("amount").value;
            var result = true;

            this.removeError(amountId, feedbackAmountId);

            if (isNaN(x) || x < 1 || x > 10)
            {
                this.addError(amountId, feedbackAmountId, "Bitte geben Sie eine Zahl ein");
                result = false;
            }

            return result;

        };

        this.checkContent = function ()
        {
            var result = true;
            this.removeError(amountId, feedbackAmountId);

            if(!this.amount.value)
            {
                this.addError(amountId, feedbackAmountId, "Anzahl fehlt");
                result = false;
            }

            return result;
        };

        this.addError = function (element, textElement, text)
        {
            element.classList.add("is-invalid");
            element.classList.remove("is-valid");
            textElement.textContent = text;
        };

        //this method removes error message from input field
        this.removeError = function (element, textElement)
        {
            element.classList.remove("is-invalid");
            //if(initialCheck === true)
            {
                element.classList.add("is-valid");
            }
            textElement.textContent = null;
        };

        that.checkContent();
        that.checkForNumbers();
    }


</script>





<?php

echo $this->footer;

?>