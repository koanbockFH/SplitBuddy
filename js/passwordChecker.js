function PasswordChecker(passwordWrapperID, passwordID, fbpasswordID, submitPasswordID, firstNameID, lastNameID, userID, mailID, passwordControlID, fbPasswordControlID) {
    //constants
    this.strongClass = "strong";
    this.moderateClass = "moderate";
    this.weakClass = "weak";

    this.minLength = 8;
    this.maxLength = 100;

    //this attributes are set with our constructor

    this.passwordWrapper = document.getElementById(passwordWrapperID);
    this.regPassword = document.getElementById(passwordID);
    this.feedbackPassword = document.getElementById(fbpasswordID);
    this.passwordSubmitButton = document.getElementById(submitPasswordID);
    this.regFirstname = document.getElementById(firstNameID);
    this.regLastname = document.getElementById(lastNameID);
    this.regUser = document.getElementById(userID);
    this.regMail = document.getElementById(mailID);
    this.regPasswordControl = document.getElementById(passwordControlID);
    this.feedbackPasswordControl = document.getElementById(fbPasswordControlID);


    var that = this;
    var initalCheck = false;

    //if we are in the password field and enter text - JavaScript Method "onkeyup" or "onkeup" - again in our case the field this.passwordField
    this.regPassword.onkeyup = function () {
        that.checkStrength();
        that.checkContent();
        initalCheck = true;
    };

    this.regPasswordControl.onkeyup = function () {
        if(initialCheck || e.keyCode === 13) //additionally needed when enter key is pressed
        {
            if(that.checkContent())
            {
                that.checkValidation();
            }
        }
    };

    //if we try to click the submit button - JavaScript Method "onclick" - in our case this.passwordSubmitButton
    this.passwordSubmitButton.onclick = function () {
        if(that.checkContent())
        {
            that.checkValidation();
        }
        initalCheck = true;
    };

    this.checkContent = function () {
        var result = true;
        if(!this.regPassword.value){
            this.addError(this.regPassword, this.feedbackPassword, "Passwort fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.regPassword, this.feedbackPassword);
        }

        if(!this.regPasswordControl.value)
        {
            this.addError(this.regPasswordControl, this.feedbackPasswordControl, "Passwort fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.regPasswordControl, this.feedbackPasswordControl)
        }
        return result;

    };


    this.checkValidation = function () {
        var result = true;


        that.removeError(this.regPassword, this.feedbackPassword);

        if (!this.checkForMinLength())
        {
            that.addError(this.regPassword, this.feedbackPassword, "Das Passwort ist zu kurz");
            result = false;
        }

        if (!this.checkForMaxLength())
        {
            that.addError(this.regPassword, this.feedbackPassword, "Das Passwort ist zu lange");
            result = false;
        }

        if (!this.checkForInvalidStrings())
        {
            that.addError(this.regPassword, this.feedbackPassword, "Das Passwort enthält ungültige Zeichenkette (Vorname, Nachname, Username oder Mail)");
            result = false;
        }

        if (!this.checkForBlanks())
        {
            that.addError(this.regPassword, this.feedbackPassword, "Das Passwort darf keine Leerzeichen beinhalten");
            result = false;
        }

        if (!this.checkForConfirmation())
        {
            that.addError(this.regPasswordControl, this.feedbackPasswordControl, "Das Passwort stimmt nicht überein");
            result = false;
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

    this.checkStrength = function () {
        if(this.passwordWrapper && this.regPassword && this.passwordSubmitButton) {

            var hasLowerAndUpperCaseLetter = this.checkForLowerAndUpperCaseLetter();
            var hasSpecialChars = this.checkForSpecialCharacters();

            this.passwordWrapper.classList.remove(this.weakClass );
            this.passwordWrapper.classList.remove(this.moderateClass);
            this.passwordWrapper.classList.remove(this.strongClass );

            if (hasLowerAndUpperCaseLetter && hasSpecialChars)
            {
                this.passwordWrapper.classList.add(this.strongClass);
            }
            else if (hasLowerAndUpperCaseLetter || hasSpecialChars)
            {
                this.passwordWrapper.classList.add(this.moderateClass);
            }
            else
            {
                this.passwordWrapper.classList.add(this.weakClass);
            }
        }
        else
        {
            console.error("A ID given to PasswordChecker doesn't exist!");
        }
    };

    //This method returns true if a special Character "!§$_.:,;" is found in this.password - otherwise false
    this.checkForSpecialCharacters = function () {
        var reg = /[!§$_.:,;]/;
        return reg.test(this.regPassword.value);
    };

    //This method returns true if there is at least one lowercase and one uppercase character.
    this.checkForLowerAndUpperCaseLetter = function () {
        var reg = /(?=.*[a-z])(?=.*[A-Z])/;
        return reg.test(this.regPassword.value);
    };

    //this method returns true if the two passwords are equal
    this.checkForConfirmation = function () {
        return this.regPassword.value === this.regPasswordControl.value;
    };

    //this method returns true if the password is longer as the acquired minimum length
    this.checkForMinLength = function () {
        return this.regPassword.value.length >= this.minLength;
    };

    //this method returns true if the password doesn't exceed the maximum length
    this.checkForMaxLength = function () {
        return this.regPassword.value.length <= this.maxLength;
    };

    //this method returns true if there are no Strings equal to firstname, lastname, username and mail
    this.checkForInvalidStrings = function () {

        var result = true;
        var array = this.regMail.value.split("@");

        var patt = new RegExp(this.regFirstname.value);
        if(patt.test(this.regPassword.value))
        {
            result = false;
        }
        patt = new RegExp(this.regLastname.value);
        if(patt.test(this.regPassword.value))
        {
            result = false;
        }
        patt = new RegExp(this.regUser.value);
        if(patt.test(this.regPassword.value))
        {
            result = false;
        }
        patt = new RegExp(array[0]);
        if (patt.test(this.regPassword.value))
        {
            result = false;
        }
        return result;
    };

    //this method returns true if there are no blanks in the password
    this.checkForBlanks = function () {
        var reg = /[\s]/;
        return !reg.test(this.regPassword);
    }

}





