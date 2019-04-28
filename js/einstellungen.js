//adds Inputfield for amount if needed
function toggleAmount()
{
    if($("input[name='RadioGruppenEinstellung']:checked").val() == 2)
    {
        $("#amount-field").addClass("d-none");

        document.getElementById("amount").classList.remove("is-invalid");
        document.getElementById("amount").classList.add("is-valid");
        $("#einstellungen-submit").html("Weiter");
    }
    else{

        $("#amount-field").removeClass("d-none");
        $("#einstellungen-submit").html("Zum Ergebnis");
    }
}

function validateAmount()
{
    var amountId = document.getElementById("amount");
    var feedbackAmountId = document.getElementById("feedbackAmount");

    //this method adds an error if the filled in number is negative
    //and removes the error after a failed attempt when the input is correct
    this.checkForPositiveNumbers = function()
    {
        var x = document.getElementById("amount").value;
        this.removeError(amountId, feedbackAmountId);

        if (x < 1)
        {
            this.addError(amountId, feedbackAmountId, "Bitte geben Sie eine Zahl größer Null ein");
        }
    };

    //this method adds an error if the filled is empty
    //and removes the error after a failed attempt when there is an input
    this.checkContent = function ()
    {
        this.removeError(amountId, feedbackAmountId);

        if(!this.amount.value)
        {
            this.addError(amountId, feedbackAmountId, "Anzahl fehlt");
        }
    };

    //this method adds error message from input field
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
        element.classList.add("is-valid");
        textElement.textContent = null;
    };

    this.checkContent();
    this.checkForPositiveNumbers();
}