//Save all Teilnehmer, to be sent to the webService
let teilnehmerDaten = [];

//initialize form on document ready
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let form = document.getElementById('teilnehmer-form');
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === true) {
                if($("#change").hasClass("d-none"))
                {
                    addTeilnehmer("vorname", "nachname", "geburtstag", "geschlecht", "email");
                }
                else{
                    editTeilnehmer($("#change").attr("data-id"),"vorname", "nachname", "geburtstag", "geschlecht", "email");
                }
                form.reset();
                form.classList.remove('was-validated');
            } else {
                form.classList.add('was-validated');
            }
            event.preventDefault();
            event.stopPropagation();
        }, false);
    }, false);
})();

function addTeilnehmer(vornameId, nachnameId, geburtstagId, geschlechtId, emailId) {
    let vornameControl = document.getElementById(vornameId);
    let nachnameControl = document.getElementById(nachnameId);
    let geburtstagControl = document.getElementById(geburtstagId);
    let geschlechtControl = document.getElementById(geschlechtId);
    let emailControl = document.getElementById(emailId);

    let listControl = $("#sb-teilnehmer-liste");
    listControl.removeClass('d-none');

    let currentId = teilnehmerDaten.length;

    //create edit Button
    var editbutton = $('<button class="btn btn-secondary btn-info sb-icon-btn" data-id="'+ currentId +'"><i class="fas fa-pencil-alt"></i></button>');
    editbutton.click(function(){
        $("#change").removeClass("d-none");
        $("#add").addClass("d-none");

        $("#change").attr("data-id", this.dataset.id);
        loadTeilnehmer(this.dataset.id, vornameId, nachnameId, geburtstagId,geschlechtId, emailId);
    });

    //create loeschen Button
    var deletebutton = $('<button class="btn btn-secondary btn-danger sb-icon-btn" data-id="'+ currentId +'"><i class="fas fa-trash"></i></button>');
    deletebutton.click(function(){
        deleteTeilnehmer(this.dataset.id);
    });

    //Create last Cell of Row and add the Button
    var editCell = $("<td class='sb-icon-btn'></td>");
    var deleteCell = $("<td class='sb-icon-btn'></td>");
    editCell.append(editbutton);
    deleteCell.append(deletebutton);

    //create row
    var row = $('<tr data-id="'+ currentId +'">');
    row.append($('<td>' + vornameControl.value + '</td>'))
        .append($('<td>' + nachnameControl.value + '</td>'))
        .append($(editCell))
        .append($(deleteCell));

    listControl.append(row);

    teilnehmerDaten.push({
        vorname: vornameControl.value,
        nachname: nachnameControl.value,
        geburtstag: geburtstagControl.value,
        geschlecht: geschlechtControl.value,
        email: emailControl.value,
    });
}

function loadTeilnehmer(id, vornameId, nachnameId, geburtstagId, geschlechtId, emailId) {
    let vornameControl = document.getElementById(vornameId);
    let nachnameControl = document.getElementById(nachnameId);
    let geburtstagControl = document.getElementById(geburtstagId);
    let geschlechtControl = document.getElementById(geschlechtId);
    let emailControl = document.getElementById(emailId);

    //Get Data from
    let item = teilnehmerDaten[id];

    vornameControl.value = item.vorname;
    nachnameControl.value = item.nachname;
    geburtstagControl.value = item.geburtstag;
    geschlechtControl.value = item.geschlecht;
    emailControl.value = item.email;
}

function editTeilnehmer(id, vornameId, nachnameId, geburtstagId, geschlechtId, emailId) {
    let vornameControl = document.getElementById(vornameId);
    let nachnameControl = document.getElementById(nachnameId);
    let geburtstagControl = document.getElementById(geburtstagId);
    let geschlechtControl = document.getElementById(geschlechtId);
    let emailControl = document.getElementById(emailId);

    let row = $('tr[data-id='+ id +']');

    let cells = row.find("td");
    cells[0].textContent = vornameControl.value;
    cells[1].textContent = nachnameControl.value;

    teilnehmerDaten.splice(id,1);

    teilnehmerDaten.push({
        vorname: vornameControl.value,
        nachname: nachnameControl.value,
        geburtstag: geburtstagControl.value,
        geschlecht: geschlechtControl.value,
        email: emailControl.value,
    });

    $("#add").removeClass("d-none");
    $("#change").addClass("d-none");
}

function deleteTeilnehmer(id){
    //ask if he wants to delete
    if(!confirm("Löschen?")){
        return;
    }

    let row = $('tr[data-id='+ id +']');

    row.remove();
    teilnehmerDaten.splice(id,1);

    if(teilnehmerDaten.length === 0)
    {
        $("#sb-teilnehmer-liste").addClass("d-none");
    }
}

function validateTeilnehmer()
{
    let result = false;
    if(teilnehmerDaten.length >= 4)
    {
        $("#teilnehmerFeedback").removeClass('d-block');
        result = true;
    }
    else{
        $("#teilnehmerFeedback").addClass('d-block');
    }
    return result;
}