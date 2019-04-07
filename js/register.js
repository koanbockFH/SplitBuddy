/*function validateRegister (firstnameID, fbfirstnameID, lastnameID, fblastnameID, userID, fbUserID, mailID, fbMailID, submitPasswordID) {

    //attributes which are set with constructor
    this.regFirstname = document.getElementById(firstnameID);
    this.feedbackFirstname = document.getElementById(fbfirstnameID);
    this.regLastname = document.getElementById(lastnameID);
    this.feedbackLastname = document.getElementById(fblastnameID);
    this.regUser = document.getElementById(userID);
    this.feedbackUser = document.getElementById(fbUserID);
    this.regMail = document.getElementById(mailID);
    this.feedbackMail = document.getElementById(fbMailID);
    this.submitPassword = document.getElementById(submitPasswordID);

    if (!this.submitPassword) {
        return;
    }

    //Constants
    this.maxLength = 254;

    var that = this;
    var initalCheck = false;

    this.submitPassword.onclick = function () {
        that.checkAndSendRequest();
        initalCheck = true;
    };

    this.regFirstname.onkeyup = function () {
        this.confirmCheck();
    };

    this.regLastname.onkeyup = function () {
        this.confirmCheck();
    };

    this.regUser.onkeyup = function () {
        this.confirmCheck();
    };

    this.regMail.onkeyup = function () {
        this.confirmCheck();
    };

    this.regPassword.onkeyup = function () {
        this.confirmCheck();
    };

    this.regPasswordControl.onkeyup = function (e) {
        if (initalCheck || e.keyCode === 13) {
            if (e.keyCode === 13) {
                that.checkAndSendRequest();
            } else {
                that.check();
            }
            initalCheck = true;
        }
    };

    this.confirmCheck = function () {
        if (initalCheck) {
            that.check();
        }
    };

    this.check = function () {
        var result = true;
        if (!this.regFirstname.value) {
            this.addError(this.regFirstname, this.feedbackFirstname, "Vorname fehlt");
            result = false;
        } else {
            this.removeError(this.regFirstname, this.feedbackFirstname);
        }
        if (!this.regLastname.value) {
            this.addError(this.regLastname, this.feedbackLastname, "Nachname fehlt");
            result = false;
        } else {
            this.removeError(this.regLastname, this.feedbackLastname);
        }
        if (!this.regUser.value) {
            this.addError(this.regUser, this.feedbackUser, "Username fehlt");
            result = false;
        } else {
            this.removeError(this.regUser, this.feedbackUser);
        }
        if (!this.regMail.value) {
            this.addError(this.regMail, this.feedbackMail, "E-Mail fehlt");
            result = false;
        } else {
            this.removeError(this.regMail, this.feedbackMail);
        }
        
        return result;
    };

    this.addError = function (element, textElement, text) {
        element.classList.add("sb-failed-validation");
        textElement.textContent = text;
    };

    this.removeError = function (element, textElement) {
        element.classList.remove("sb-failed-validation");
        textElement.textContent = null;
    };

    this.checkAndSendRequest = function () {
        var result = that.check;
        if (result) {
            this.success();
        }
    };

    this.success = function () {
        console.info("Erfolgreich Validiert und eingeloggt")
    };

    this.checkForBlanks = function () {
        var reg = /[\s]/;
        return reg.test(this.regPassword);
    }

    this.checkForMaxLength = function () {
        return this.regPassword.value.length <= this.maxLength;
    };

    this.checkForSpecialCharacters = function () {
        var reg = /[!§$_.:,;]/;
        return reg.test(this.regPassword.value);
    };

    this.checksCorrectMail = function () {
        var reg = /[@]/;
        return reg.test(this.regMail)
    }




}
*/