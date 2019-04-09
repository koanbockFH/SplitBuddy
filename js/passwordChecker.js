function PasswordChecker(passwordWrapperID, passwordID, fbpasswordID, submitPasswordID, firstNameID, lastNameID, userID, mailID, passwordControlID, fbPasswordControlID) {
    //constants
    this.strongClass = "strong";
    this.moderateClass = "moderate";
    this.weakClass = "weak";

    this.minLength = 8;
    this.maxLength = 100;

    //this attributes are set with the constructor
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

    //event will be fired when the password field is entered
    this.regPassword.onkeyup = function () {
        that.checkStrength();

        //only needed when initalCheck is true (after first failed try) to remove errors
        if(initalCheck) {
            that.checkContent();
        }
    };

    //event will be fired when the passwordControl field is entered
    this.regPasswordControl.onkeyup = function (e) {
        //needed when initalCheck is true to remove errors or when enter key is pressed
        if(initalCheck || e.keyCode === 13)
        {
            if (e.keyCode ===13) {//checkValidation method will be executed if checkContent is true
                if (that.checkContent())
                {
                    that.checkValidation();
                }
            }
            else
            {
                that.checkContent();
            }
        }
    };

    //event will be fired when submit button is clicked
    this.passwordSubmitButton.onclick = function () {

        //checkValidation method will  be executed if checkContent is true
        if(that.checkContent())
        {
            that.checkValidation();
        }
        initalCheck = true;
    };

    //this method returns true if password and passwordControl are entered
    //if a field is not filled in there will be an error added to the field
    //if the field is filled in after an failed attempt the error will be removed from the field
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

    //this method returns true if all password criteria are met
    //if a criteria is not met, there will be an error added to the field
    //if all the criteria will are met after a failed attempt the error will be removed from the field
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

    //this method shows the strength of the password
    this.checkStrength = function () {
        //we can only check if every field with given Id exists
        //one of them would be null if one Id wouldn't exist therefore following statement would fail
        if(this.passwordWrapper && this.regPassword && this.passwordSubmitButton) {

            var hasLowerAndUpperCaseLetter = this.checkForLowerAndUpperCaseLetter();
            var hasSpecialChars = this.checkForSpecialCharacters();

            this.passwordWrapper.classList.remove(this.weakClass );
            this.passwordWrapper.classList.remove(this.moderateClass);
            this.passwordWrapper.classList.remove(this.strongClass );

            //the password is strong if the password has lower AND uppercase letters and at least one Special Char
            if (hasLowerAndUpperCaseLetter && hasSpecialChars)
            {
                this.passwordWrapper.classList.add(this.strongClass);
            }
            //the password is moderate if the password has lower and uppercase letters OR at least one Special Char
            else if (hasLowerAndUpperCaseLetter || hasSpecialChars)
            {
                this.passwordWrapper.classList.add(this.moderateClass);
            }
            //the password is weak if it has none of the two criteria
            else
            {
                this.passwordWrapper.classList.add(this.weakClass);
            }
        }
        else
        {
            //if a field is null (we weren't able to find it)
            console.error("An ID given to PasswordChecker doesn't exist!");
        }
    };


    //This method returns true if a special Character "!§$_.:,;" is found in password
    this.checkForSpecialCharacters = function () {
        var reg = /[!§$_.:,;]/;
        return reg.test(this.regPassword.value);
    };

    //This method returns true if there is at least one lowercase and one uppercase character in password
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
        if(this.regFirstname && this.regLastname && this.regUser && this.regMail) {

            var result = true;
            var array = this.regMail.value.split("@");

            var patt = new RegExp(this.regFirstname.value);
            if (patt.test(this.regPassword.value)) {
                result = false;
            }
            patt = new RegExp(this.regLastname.value);
            if (patt.test(this.regPassword.value)) {
                result = false;
            }
            patt = new RegExp(this.regUser.value);
            if (patt.test(this.regPassword.value)) {
                result = false;
            }
            patt = new RegExp(array[0]);
            if (patt.test(this.regPassword.value)) {
                result = false;
            }
            return result;
        }
        else
        {
            console.log("hallo");
        }

    };

    //this method returns true if there are no blanks in the password
    this.checkForBlanks = function () {
        var reg = /[\s]/;
        return reg.test(this.regPassword);
    }

}





