//adds Inputfield for amount if needed

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            }, false);
        });
    }, false);
})();

function addZaehler(x)
{

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