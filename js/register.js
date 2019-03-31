function PasswordChecker() { //ich benötige ID von:  PasswortFeld, PasswortFeldUeberprüfung, SubmitButton
    this.minLength = 8;

    //vorname
    //nachname
    //username
    //email
    //password
    //password confirmation

    //fehle


    this.passwortSubmitButton.onclick = function () {
        validate();

        if(passwortFeld.value == "") { //und alle anderen Felder
            //Code: roter Rand + Fehlercode
            return false;
        }

    };

    this.validate = function (){

        if(passwortFeld) //blablaba

            var pwMatches = this.checkForConfirmation();
            var longEnough = this.checkForLength();
            var

    }


    //beiden Passworteingaben überprüfen

    this.checkForConfirmation = function () {
        return passwortFeld.value == PasswortFeldUeberprüfung.value;
    };

    //Mindestlänge überprüfen
    this.checkForLength = function () {
        return this.passwortFeld.value.length >= this.minLength;
    };

    //Sonderzeichen
    this.checkForCharacters = function () {
        var regex = /[!§$_.:,;]/;
        return regex.test(this.passwortFeld.value);
    };

    //Kleinbuchsatben
    this.checkForLowercaseLetter = function () {
        var regex = /[a-z];
        return regex.test(this.passwortFeld.value)
    };

    //Großbuchstaben
    this.checkForUppercaseLetter = function () {
        var regex = /[A-Z];
        return regex.test(this.passwortFeld.value)
    };

    //Darf nicht Vor-Nachname, Username oder E-Mail enthalten
    this.checkForInvalidStrings = function () {
        if (vorname.test(this.passwortFeld.value)){
            return false;
        }
        else if  (nachname.test(this.passwortFeld.value)){
            return false;
        }
        else if (username.test(this.passwortFeld.value)){
            return false;
        }
        else if (email.test(this.passwortFeld.value)){
            return false;
        }
        else return true;
    }

};
