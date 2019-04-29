function validateRegister (firstnameID, fbfirstnameID, lastnameID, fblastnameID, userID, fbUserID, mailID, fbMailID, pwdID, fbPwdID, pwControlID, fbPwdControlID, submitPasswordID, passwordWrapperID, callbackOnSuccess) {

    //attributes which are set with constructor
    this.regFirstname = document.getElementById(firstnameID);
    this.feedbackFirstname = document.getElementById(fbfirstnameID);
    this.regLastname = document.getElementById(lastnameID);
    this.feedbackLastname = document.getElementById(fblastnameID);
    this.regUser = document.getElementById(userID);
    this.feedbackUser = document.getElementById(fbUserID);
    this.regMail = document.getElementById(mailID);
    this.feedbackMail = document.getElementById(fbMailID);
    this.regPassword = document.getElementById(pwdID);
    this.feedbackPassword = document.getElementById(fbPwdID);
    this.regPasswordControl = document.getElementById(pwControlID);
    this.feedbackPasswordControl = document.getElementById(fbPwdControlID);
    this.submitPassword = document.getElementById(submitPasswordID);
    this.passwordWrapper = document.getElementById(passwordWrapperID);

    //constants
    this.minLength = 8;
    this.maxLength = 254;
    this.maxLengthPwd = 100;

    this.strongClass = "strong";
    this.moderateClass = "moderate";
    this.weakClass = "weak";
    this.errorClass = "error";

    var that = this;
    var initialCheck = false;

    //As a precaution, if this JavaScript isn't loaded in the login page
    if(!this.submitPassword)
    {
        return;
    }

    //event will be fired when submit button is clicked
    this.submitPassword.onclick = function (event)
    {
        event.preventDefault();
        event.stopPropagation();

        that.removeErrorContent();
        that.checkAndSendRequest();
        initialCheck = true;
    };

    //event will be fired when user puts in value
    this.regFirstname.onkeyup = function ()
    {
        if(initialCheck)
        {
            that.removeError(that.regFirstname, that.feedbackFirstname);
            that.checkContentOfEachField(that.regFirstname, that.feedbackFirstname, "Vorname fehlt");
            that.validateUserInformation(that.regFirstname, that.feedbackFirstname);
        }

    };

    //event will be fired when user puts in value
    this.regLastname.onkeyup = function ()
    {
        if(initialCheck)
        {
            that.removeError(that.regLastname, that.feedbackLastname);
            that.checkContentOfEachField(that.regLastname, that.feedbackLastname, "Nachname fehlt");
            that.validateUserInformation(that.regLastname, that.feedbackLastname);
        }
    };

    //event will be fired when user puts in value
    this.regUser.onkeyup = function ()
    {
        if(initialCheck)
        {
            that.removeError(that.regUser, that.feedbackUser);
            that.checkContentOfEachField(that.regUser, that.feedbackUser, "User fehlt");
            that.validateUserInformation(that.regUser, that.feedbackUser);
        }
    };

    //event will be fired when user puts in value
    this.regMail.onkeyup = function ()
    {
        if(initialCheck)
        {
            that.removeError(that.regMail, that.feedbackMail);
            that.checkContentOfEachField(that.regMail, that.feedbackMail, "E-Mail fehlt");
            that.validateMail()
        }
    };

    //event will be fired when user puts in value
    this.regPassword.onkeyup = function ()
    {
        if(initialCheck)
        {
            that.removeError(that.regPassword, that.feedbackPassword);
            that.checkContentOfEachField(that.regPassword, that.feedbackPassword, "Passwort fehlt");
            that.validatePassword(true);

            that.removeError(that.regPasswordControl, that.feedbackPasswordControl);
            that.checkPasswordConfirmation();
        }
        that.checkStrength();
    };

    //event will be fired when user puts in value
    this.regPasswordControl.onkeyup = function (e)
    {
        if(initialCheck || e.keyCode === 13)
        {
            that.removeError(that.regPasswordControl, that.feedbackPasswordControl);
            if(e.keyCode === 13)
            {
                that.checkAndSendRequest();
            }
            else
            {
                that.checkPasswordConfirmation();
                that.checkContentOfEachField(that.regPasswordControl, that.feedbackPasswordControl, "Passwort fehlt");
            }
            initialCheck = true;
        }
    };

    //this method returns true if password and passwordControl are filled
    //if a field is not filled in, there will be an error added to the field
    //if the field is filled in after an failed attempt the error will be removed from the field
    this.checkContentOfEachField = function (element, feedbackElement, text)
    {
        var result = true;

        if(!element.value)
        {
            this.addError(element, feedbackElement, text);
            result = false;
        }
        return result;

    };

    this.checkContent = function ()
    {
        var result = true;

        if (!this.regFirstname.value) {
            this.addError(this.regFirstname, this.feedbackFirstname, "Vorname fehlt");
            result = false;
        }

        if (!this.regLastname.value)
        {
            this.addError(this.regLastname, this.feedbackLastname, "Nachname fehlt");
            result = false;
        }

        if (!this.regUser.value)
        {
            this.addError(this.regUser, this.feedbackUser, "Username fehlt");
            result = false;
        }

        if (!this.regMail.value)
        {
            this.addError(this.regMail, this.feedbackMail, "E-Mail fehlt");
            result = false;
        }

        if(!this.regPassword.value){
            this.addError(this.regPassword, this.feedbackPassword, "Passwort fehlt");
            result = false;
        }

        if(!this.regPasswordControl.value)
        {
            this.addError(this.regPasswordControl, this.feedbackPasswordControl, "Passwort fehlt");
            result = false;
        }
        return result;
    };

    this.removeErrorContent = function ()
    {
        this.removeError(this.regFirstname, this.feedbackFirstname);
        this.removeError(this.regLastname, this.feedbackLastname);
        this.removeError(this.regUser, this.feedbackUser);
        this.removeError(this.regMail, this.feedbackMail);
        this.removeError(this.regPassword, this.feedbackPassword);
        this.removeError(this.regPasswordControl, this.feedbackPasswordControl);
    };

    //this method returns true if all the criteria are met
    //if an criteria is not met there will be an error added to the field
    //if the criteria is met after an failed attempt the error will be removed from the field
    this.validateUserInformation = function (element, feedbackElement)
    {
        var result = true;

        if(this.checkForBlanks(element))
        {
            that.addError(element, feedbackElement, "keine Leerzeichen erlaubt");
            result = false;
        }
        if(!this.checkForMaxLength(this.maxLength))
        {
            that.addError(element, feedbackElement, "max. 254 Zeichen erlaubt");
            result = false;
        }
        if(this.checkForSpecialCharacters(element))
        {
            that.addError(element, feedbackElement, "keine Sonderzeichen erlaubt");
            result = false;
        }
        return result;
    };

    //this method returns true if it is a valid e-mail
    this.validateMail = function ()
    {
        var result = true;

        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.regMail.value))
        {
            that.addError(this.regMail, this.feedbackMail, "Keine korrekte E-Mail Adresse");
            result = false;
        }
        return result;
    };

    //this method returns true if password and passwordControl are equal
    //if not there will be an error added to the field
    //if the criteria is met after an failed attempt the error will be removed from the field
    this.checkPasswordConfirmation = function ()
    {
        var result = true;

        if (!this.checkForConfirmation())
        {
            that.addError(this.regPasswordControl, this.feedbackPasswordControl, "Das Passwort stimmt nicht überein");
            result = false;
        }

        return result;
    };

    //this method returns true if all the password validation criteria are met
    //if an criteria is not met there will be an error added to the field
    //if the criteria is met after an failed attempt the error will be removed from the field
    this.validatePassword = function (setErrorMessage)
    {
        var result = true;

        if (!this.checkForMinLength())
        {
            if(setErrorMessage)that.addError(this.regPassword, this.feedbackPassword, "Das Passwort muss mindestens 8 Zeichen enthalten");
            result = false;
        }

        if (!this.checkForMaxLength(this.maxLengthPwd))
        {
            if(setErrorMessage)that.addError(this.regPassword, this.feedbackPassword, "Das Passwort darf maximal 100 Zeichen enthalten");
            result = false;
        }

        if (!this.checkForInvalidStrings())
        {
            if(setErrorMessage)that.addError(this.regPassword, this.feedbackPassword, "Das Passwort enthält ungültige Zeichenkette (Vorname, Nachname, Username oder Mail)");
            result = false;
        }

        if (this.checkForBlanks(this.regPassword))
        {
            if(setErrorMessage)that.addError(this.regPassword, this.feedbackPassword, "Das Passwort darf keine Leerzeichen beinhalten");
            result = false;
        }

        return result;
    };

    //this method indicates the strength of the password
    this.checkStrength = function ()
    {
        //we can only check if every field with given Id exists
        //one of them would be null if one Id wouldn't exist therefore following statement would fail
        if(this.passwordWrapper && this.regPassword) {

            var hasError = !this.validatePassword(false);
            var hasLowerAndUpperCaseLetter = this.checkForLowerAndUpperCaseLetter();
            var hasSpecialChars = this.checkForSpecialCharacters(this.regPassword);

            this.passwordWrapper.classList.remove(this.errorClass); //error class
            this.passwordWrapper.classList.remove(this.weakClass);
            this.passwordWrapper.classList.remove(this.moderateClass);
            this.passwordWrapper.classList.remove(this.strongClass);

            //the password is strong if the password has lower AND uppercase letters and at least one Special Char
            if (!hasError && hasLowerAndUpperCaseLetter && hasSpecialChars)
            {
                this.passwordWrapper.classList.add(this.strongClass);
            }
            //the password is moderate if the password has lower and uppercase letters OR at least one Special Char
            else if (!hasError && (hasLowerAndUpperCaseLetter || hasSpecialChars))
            {
                this.passwordWrapper.classList.add(this.moderateClass);
            }
            //the password is weak if it has none of the two criteria
            else if(!hasError && !hasSpecialChars && !hasLowerAndUpperCaseLetter)
            {
                this.passwordWrapper.classList.add(this.weakClass);
            }
            //the password has an error if it doesn't pass validation criteria
            else
            {
                this.passwordWrapper.classList.add(this.errorClass);
            }
        }
        else
        {
            //if a field is null (we weren't able to find it)
            console.error("An ID given to PasswordChecker doesn't exist!");
        }
    };

    //this method adds error message to input field
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

    this.check = function ()
    {
        var result = true;

        if(!that.validateUserInformation(that.regFirstname, that.feedbackFirstname))
        {
            result = false;
        }

        if(!that.validateUserInformation(that.regLastname, that.feedbackLastname))
        {
            result = false;
        }

        if(!that.validateUserInformation(that.regUser, that.feedbackUser))
        {
            result = false;
        }

        if(!that.validateMail())
        {
            result = false;
        }

        if(!that.checkContent())
        {
            result = false;
        }

        if(!that.checkPasswordConfirmation())
        {
            result = false;
        }

        if(!that.validatePassword(true))
        {
            result = false;
        };

        return result;
    };

    //this method calls success method if check is true
    this.checkAndSendRequest = function() {
        var result = that.check();
        if(result){
            this.success();
        }
    };

    //this method checks for non empty fields and if so sends a request to backend
    this.success = function ()
    {
        if(callbackOnSuccess && typeof callbackOnSuccess === "function"){
            callbackOnSuccess();
        }
    };

    //This method returns true if a special character is found in password
    this.checkForSpecialCharacters = function (e)
    {
        var reg = /[(){}?!$%&=*+~,.;:<>§_]/;
        return reg.test(e.value);
    };

    //This method returns true if there is at least one lowercase and one uppercase character in password
    this.checkForLowerAndUpperCaseLetter = function ()
    {
        var reg = /(?=.*[a-z])(?=.*[A-Z])/;
        return reg.test(this.regPassword.value);
    };

    //this method returns true if the two passwords are equal
    this.checkForConfirmation = function ()
    {
        return this.regPassword.value === this.regPasswordControl.value;
    };

    //this method returns true if the password is longer as the acquired minimum length
    this.checkForMinLength = function ()
    {
        return this.regPassword.value.length >= this.minLength;
    };

    //this method returns true if the password doesn't exceed the maximum length
    this.checkForMaxLength = function (max)
    {
        return this.regPassword.value.length <= max;
    };

    //this method returns true if there are no Strings equal to firstname, lastname, username and mail
    this.checkForInvalidStrings = function ()
    {
        var result = true;

        if(this.regFirstname.value && this.regLastname.value && this.regUser.value && this.regMail.value)
        {
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
        }
        return result;
    };

    //this method returns true if there is a blank in the password
    this.checkForBlanks = function (e)
    {
        var reg = /[\s]/;
        return reg.test(e.value);
    };
}
