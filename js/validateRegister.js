function validateRegister (firstnameID, fbfirstnameID, lastnameID, fblastnameID, userID, fbUserID, mailID, fbMailID, submitPasswordID) {

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

    //Constants
    this.maxLength = 254;

    //As a precaution, if this JavaScript isn't loaded in the register page
    if(!this.submitPassword)
    {
        return;
    }

    var that = this;
    var initialCheck = false;

    this.submitPassword.onclick = function () {
        if(that.checkContent())
        {
            that.success();
        };
        initialCheck = true;
    };

    this.regFirstname.onkeyup = function () {
        if(initialCheck)
        {
            that.checkContent();
        }
    };

    this.regLastname.onkeyup = function () {
        if(initialCheck)
        {
            that.checkContent();
        }
    };

    this.regUser.onkeyup = function () {
        if(initialCheck)
        {
            that.checkContent();
        }
    };

    this.regMail.onkeyup = function () {
        if(initialCheck)
        {
            that.check();
        }
    };

    this.regMail.onblur = function () {
        that.checkValidationMail();
    };


    this.checkContent = function ()
    {
        var result = true;

        if (!this.regFirstname.value) {
            this.addError(this.regFirstname, this.feedbackFirstname, "Vorname fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.regFirstname, this.feedbackFirstname);
        }

        if (!this.regLastname.value)
        {
            this.addError(this.regLastname, this.feedbackLastname, "Nachname fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.regLastname, this.feedbackLastname);
        }

        if (!this.regUser.value)
        {
            this.addError(this.regUser, this.feedbackUser, "Username fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.regUser, this.feedbackUser);
        }

        if (!this.regMail.value)
        {
            this.addError(this.regMail, this.feedbackMail, "E-Mail fehlt");
            result = false;
        }
        else
        {
            this.removeError(this.regMail, this.feedbackMail);
        }
        
        return result;
    };

    this.checkValidation = function (element, feedbackElement) {
        var result = true;

        that.removeError(element, feedbackElement);

        if(!this.checkForBlanks())
        {
            that.addError(element, feedbackElement, "keine Leerzeichen erlaubt");
            result = false;
        }
        if(!this.checkForMaxLength())
        {
            that.addError(element, feedbackElement, "max. 254 Zeichen erlaubt");
            result = false;
        }
        if(!this.checkForSpecialCharacters())
        {
            that.addError(element, feedbackElement, "keine Sonderzeichen erlaubt");
            result = false;
        }

        return result;

    };

    this.checkValidationMail = function ()
    {
      var result = true;
      that.removeError(this.regMail, this.feedbackMail)

      if(!this.checksCorrectMail())
      {
          that.addError(this.regMail, this.feedbackMail, "Keine korrekte E-Mail Adresse")
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