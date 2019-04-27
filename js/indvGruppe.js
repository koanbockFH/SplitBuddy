let indivGroupList = [];

(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let form = document.getElementById('indivGroup-form');
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === true) {
                if($("#change").hasClass("d-none"))
                {
                    addGroup("groupName", "amountIndivGroup");
                }
                else{
                    editGroup($("#change").attr("data-id"),"groupName", "amountIndivGroup");
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

function addGroup(gruppennameId, anzahlId) {
    let groupNameControl = document.getElementById(gruppennameId);
    let amountControl = document.getElementById(anzahlId);

    let listControl = $("#sb-indivGroup-list");
    listControl.removeClass('d-none');

    let currentId = indivGroupList.length;

    //create editbutton
    var editbutton = $('<button class="btn btn-secondary btn-info col-sm sb-indivGroup-list" data-id="'+ currentId +'"><i class="fas fa-pencil-alt"></i></button>');
    editbutton.click(function(){
        $("#change").removeClass("d-none");
        $("#add").addClass("d-none");

        $("#change").attr("data-id", this.dataset.id);
        loadGroup(this.dataset.id, gruppennameId, anzahlId);
    });
    var deletebutton = $('<button class="btn btn-secondary btn-danger col-sm sb-indivGroup-btn" data-id="'+ currentId +'"><i class="fas fa-trash"></i></button>');
    deletebutton.click(function(){
        deleteGroup(this.dataset.id);
    });

    //Create last Cell of Row and add the Button
    var editCell = $("<td class='sb-indivGroup-btn'></td>");
    var deleteCell = $("<td class='sb-indivGroup-btn'></td>");
    editCell.append(editbutton);
    deleteCell.append(deletebutton);

    //create row
    var row = $('<tr data-id="'+ currentId +'">');
    row.append($('<td>' + groupNameControl.value + '</td>'))
        .append($('<td>' + amountControl.value + '</td>'))
        .append($(editCell))
        .append($(deleteCell));

    listControl.append(row);

    indivGroupList.push({
        groupName: groupNameControl.value,
        amount: amountControl.value,
    });

    if(indivGroupList.length >= 2)
    {
        $('#nextGroup').attr('disabled', false);
    }
    else
    {
        $('#nextGroup').attr('disabled', true);
    }

}

function loadGroup(id, groupNameId, amountId) {
    let groupNameControl = document.getElementById(groupNameId);
    let amountControl = document.getElementById(amountId);

    //Get Data from
    let item = indivGroupList[id];

    groupNameControl.value = item.groupName;
    amountControl.value = item.amount;
}

function editGroup(id, groupNameId, amountId){
    let groupNameControl = document.getElementById(groupNameId);
    let amountControl = document.getElementById(amountId);

    let row = $('tr[data-id='+ id +']');

    let cells = row.find("td");
    cells[0].textContent = groupNameControl.value;
    cells[1].textContent = amountControl.value;

    indivGroupList.splice(id,1);

    indivGroupList.push({
        groupName: groupNameControl.value,
        amount: amountControl.value,
    });

    $("#add").removeClass("d-none");
    $("#change").addClass("d-none");
}

function deleteGroup(id){
    //ask if he wants to delete
    if(!confirm("Löschen?")){
        return;
    }

    let row = $('tr[data-id='+ id +']');

    row.remove();
    indivGroupList.splice(id,1);

    if(indivGroupList.length === 0)
    {
        $("#sb-indivGroup-list").addClass("d-none");
    }

    if(teilnehmerDaten.length >= 2)
    {
        $('#nextGroup').attr('disabled', false);
    }

    else
    {
        $('#nextGroup').attr('disabled', true);
    }

}

    