function validate (userId, passwordId, submitPasswordId, userFeedbackId, passwordFeedbackId){

    //attributes which are set with constructor
    this.user = document.getElementById(userId);
    this.password = document.getElementById(passwordId);
    this.submitPassword = document.getElementById(submitPasswordId);
    this.userFeedback = document.getElementById(userFeedbackId);
    this.passwordFeedback = document.getElementById(passwordFeedbackId);

    if(!this.submitPassword)
    {
        return;
    }

    var that = this;
    var initialCheck = false;

    //event will be fired when submit button is clicked
    this.submitPassword.onclick = function () {
        that.checkAndSendRequest();
        initialCheck = true; //boolean changes to true after first click on submit button
    };

    //event will be fired when user field is entered
    //only needed after first failed login
    this.user.onkeyup = function () {
        if(initialCheck)
        {
            that.check();
        }
    };

    //event will be fired when user field is entered
    //only needed after first failed login or pressed enter key
    this.password.onkeyup = function (e) {
        if(initialCheck || e.keyCode === 13) //Enter
        {
            if(e.keyCode === 13)
            {
                that.checkAndSendRequest();
            }
            else
            {
                that.check();
            }
            initialCheck = true;
        }
    };

    //this method returns true if user and password fields are not empty
    this.check = function ()
    {
        var result = true;
        if (!this.user.value) {
            this.addError(this.user, this.userFeedback, "Benutzername oder E-Mail fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.user, this.userFeedback);
        }

        if  (!this.password.value) {
            this.addError(this.password, this.passwordFeedback, "Passwort fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.password, this.passwordFeedback);
        }
        return result;
    };

    //this method adds error message to input field
    this.addError = function (element, textElement, text) {
        element.classList.add("sb-failed-validation");
        textElement.textContent = text;
    };

    //this method removes error message from input field
    this.removeError = function (element, textElement) {
        element.classList.remove("sb-failed-validation");
        textElement.textContent = null;
    };

    //this method checks for non empty fields and if so sends a request to backend
    this.checkAndSendRequest = function () {

        var result = that.check();
        if(result){
            this.success();
        }
    };

    this.success = function() {
        console.info("Erfolgreich Validiert und eingeloggt")
    }
}