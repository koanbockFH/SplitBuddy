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
                let teilnehmerChangeButton = $("#teilnehmer-change");
                if(teilnehmerChangeButton.hasClass("d-none"))
                {
                    addTeilnehmer("vorname", "nachname", "geburtstag", "geschlecht", "email");
                }
                else{
                    //attribute data-id is set after pressing Edit-button of each Teilnehmer
                    editTeilnehmer(teilnehmerChangeButton.attr("data-id"),"vorname", "nachname", "geburtstag", "geschlecht", "email");
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

    //create edit Button
    var editbutton = $('<button class="btn btn-secondary btn-info sb-icon-btn"><i class="fas fa-pencil-alt"></i></button>');
    editbutton.click(function(e){
        let row = $(e.currentTarget).parents('tr');
        $("#teilnehmer-change").removeClass("d-none");
        $("#teilnehmer-add").addClass("d-none");

        $("#teilnehmer-change").attr("data-id", row.index());
        loadTeilnehmer(row.index(), vornameId, nachnameId, geburtstagId,geschlechtId, emailId);
    });

    //create loeschen Button
    var deletebutton = $('<button class="btn btn-secondary btn-danger sb-icon-btn"><i class="fas fa-trash"></i></button>');
    deletebutton.click(function(e){
        deleteTeilnehmer($(e.currentTarget).parents('tr').index());
    });

    //Create last Cell of Row and add the Button
    var editCell = $("<td class='sb-icon-btn'></td>");
    var deleteCell = $("<td class='sb-icon-btn'></td>");
    editCell.append(editbutton);
    deleteCell.append(deletebutton);

    //create row
    var row = $('<tr>');
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

    let row = $("#sb-teilnehmer-liste").find('tbody').find('tr').eq(id);

    let cells = row.find("td");
    cells[0].textContent = vornameControl.value;
    cells[1].textContent = nachnameControl.value;

    //Get Data from
    let item = teilnehmerDaten[id];

    item.vorname = vornameControl.value;
    item.nachname = nachnameControl.value;
    item.geburtstag = geburtstagControl.value;
    item.geschlecht = geschlechtControl.value;
    item.email = emailControl.value;

    $("#teilnehmer-add").removeClass("d-none");
    $("#teilnehmer-change").addClass("d-none");
}

function deleteTeilnehmer(id){
    //ask if he wants to delete
    if(!confirm("Löschen?")){
        return;
    }

    let row = $("#sb-teilnehmer-liste").find('tbody').find('tr').eq(id);

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