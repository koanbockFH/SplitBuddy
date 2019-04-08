(function() {
    'use strict';
    window.addEventListener('load', function() {
        //Init Controls
        initializeControls("vorname", "nachname", "geburtstag", "geschlecht", "email");

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === true) {
                    addTeilnehmer();
                }
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

var vornameControl;
var nachnameControl;
var geburtstagControl;
var geschlechtControl;
var emailControl;

var listControl;

var teilnehmerNummer = 1;

function initializeControls(vorname, nachname, geburtstag, geschlecht, email)
{
    vornameControl = document.getElementById(vorname);
    nachnameControl = document.getElementById(nachname);
    //TODO zwischenspeichern - z.B. php call oder iwo anders damit später an PHP gesendet werden kann
    geburtstagControl = document.getElementById(geburtstag);
    geschlechtControl = document.getElementById(geschlecht);
    emailControl = document.getElementById(email);

    listControl = $("#sb-teilnehmer-liste");

    teilnehmerNummer = 1;
};

function addTeilnehmer(){
    //TODO Handy + Desktop design überarbeiten
    //TODO Edit Button umsetzen
    listControl.append('<div class="sb-teilnehmer-item row justify-content-center">\n' +
        '        <div class="col-md-2"><label class="sb-teilnehmer-titel col-sm">Teilnehmer '+ teilnehmerNummer++ +':</label></div>\n' +
        '        <div class="col-md-2"><label class="sb-teilnehmer-vorname col-sm text-right">'+ vornameControl.value +'</label></div>\n' +
        '        <div class="col-md-2"><label class="sb-teilnehmer-nachname col-sm text-right">'+ nachnameControl.value +'</label></div>\n' +
        '        <div class="col-md-2"><button class="btn btn-link sb-no-style-button col-sm text-left"><i class="fas fa-pencil-alt"></i></button></div>\n' +
        '    </div>')

}