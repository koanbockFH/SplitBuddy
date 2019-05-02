//Save all Groups to be sent to the webService
let indivGroupList = [];

//initialize form on document ready
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let form = document.getElementById('indivGroup-form');
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === true) {
                let groupChangeButton = $("#indvGruppe-change")
                if($("#indvGruppe-change").hasClass("d-none"))
                {
                    addGroup("groupName", "amountIndivGroup");
                }
                else{
                    //attribute data-id is set after pressing Edit-button of each Teilnehmer
                    editGroup(groupChangeButton.attr("data-id"), "groupName", "amountIndivGroup");
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

//this method adds an error if the filled in number is negative
function checkForPositiveNumbers()
{
    var amountId = document.getElementById("amountIndivGroup");
    var feedbackAmountId = document.getElementById("amountIndivGroupFeedback");

    var x = amountId.value;

    //removes error after a failed attempt when the input is correct
    amountId.classList.remove("is-invalid");
    amountId.classList.add("is-valid");
    feedbackAmountId.textContent = null;

    if (x < 1)
    {
        amountId.classList.add("is-invalid");
        amountId.classList.remove("is-valid");
        feedbackAmountId.textContent = "Bitte geben Sie eine Zahl größer Null ein";
    }
}

function addGroup(gruppennameId, anzahlId) {
    let groupNameControl = document.getElementById(gruppennameId);
    let amountControl = document.getElementById(anzahlId);

    //table will be visible when a Group is entered
    let listControl = $("#sb-indivGroup-list");
    listControl.removeClass('d-none');

    //create edit button
    var editbutton = $('<button class="btn btn-secondary btn-info col-sm sb-icon-btn"><i class="fas fa-pencil-alt"></i></button>');

    //this event will be fired when the editbutton is clicked
    //it allows the user to change the values of his input
    editbutton.click(function (e) {
        let row = $(e.currentTarget).parents('tr');
        $("#indvGruppe-change").removeClass("d-none");
        $("#indvGruppe-add").addClass("d-none");

        $("#indvGruppe-change").attr("data-id", row.index());
        loadGroup(row.index(), gruppennameId, anzahlId);
    });

    //create delete button
    var deletebutton = $('<button class="btn btn-secondary btn-danger col-sm sb-icon-btn"><i class="fas fa-trash"></i></button>');

    //this event will be fired when the delete button is clicked
    //it allows the user to delete an entered group again
    deletebutton.click(function (e) {
        deleteGroup($(e.currentTarget).parents('tr').index());
    });

    //Create last cells of row and add buttons
    var editCell = $("<td class='sb-icon-btn'></td>");
    var deleteCell = $("<td class='sb-icon-btn'></td>");
    editCell.append(editbutton);
    deleteCell.append(deletebutton);

    //create row
    var row = $('<tr>');
    row.append($('<td>' + groupNameControl.value + '</td>'))
        .append($('<td>' + amountControl.value + '</td>'))
        .append($(editCell))
        .append($(deleteCell));

    //adds row to the table
    listControl.append(row);

    //saves values in list
    indivGroupList.push({
        groupName: groupNameControl.value,
        amount: amountControl.value,
    });
}

//this method loads the data of the group which the user wants to edit
function loadGroup(id, groupNameId, amountId) {
    let groupNameControl = document.getElementById(groupNameId);
    let amountControl = document.getElementById(amountId);

    //get data from the list
    let item = indivGroupList[id];

    groupNameControl.value = item.groupName;
    amountControl.value = item.amount;
}

function editGroup(id, groupNameId, amountId) {
    let groupNameControl = document.getElementById(groupNameId);
    let amountControl = document.getElementById(amountId);

    let row = $('#sb-indivGroup-list').find('tbody').find('tr').eq(id);

    //The find() method returns descendant elements of the selected element
    let cells = row.find("td");

    //the content of the cells will be changed to the new entered values
    cells[0].textContent = groupNameControl.value;
    cells[1].textContent = amountControl.value;

   //get data from the list
    let item = indivGroupList[id];

    item.groupName = groupNameControl.value;
    item.amount = amountControl.value;

    //changes the visibility of the buttons
    $("#indvGruppe-add").removeClass("d-none");
    $("#indvGruppe-change").addClass("d-none");
}

function deleteGroup(id){
    //asks for confirmation if the group should be deleted
    if(!confirm("Löschen?")){
        return;
    }

    //The find() method returns descendant elements of the selected element
    let row = $("#sb-indivGroup-list").find('tbody').find('tr').eq(id);

    row.remove();
    indivGroupList.splice(id,1);

    //if there are no values in the list the table won't be visible anymore
    if(indivGroupList.length === 0)
    {
        $("#sb-indivGroup-list").addClass("d-none");
    }
}

//At least 2 groups have to be entered
function validateGroup()
{
    let result = false;
    if(indivGroupList.length >=2)
    {
        $("#indivGroupFeedback").removeClass('d-block');
        result = true;
    }
    else{
        $("#indivGroupFeedback").addClass('d-block');
    }
    return result;
}