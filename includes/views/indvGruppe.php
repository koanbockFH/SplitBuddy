<h2 class="text-center mb-4">Gruppen</h2>

<div class="table-responsive">
    <table class="table table-striped userList d-none" id="sb-indivGroup-list">
        <thead>
        <tr>
            <th scope="col">Gruppenname</th>
            <th scope="col">Anzahl der Teilnehmer</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>

<form class="needs-validation" novalidate id="indivGroup-form">
    <div class="form-row justify-content-center">
        <div class="col-md-9 mb-3 ">
            <label for="groupName" class="d-none d-lg-block">Gruppenname</label>
            <input type="text" class="form-control" id="groupName" placeholder="Gruppenname" required>
            <div class="invalid-feedback">Bitte geben Sie einen Gruppennamen ein!</div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="amountIndivGroup" class="d-none d-lg-block">Anzahl der Teilnehmer:</label>
            <input type="number" class="form-control" id="amountIndivGroup" placeholder="Anzahl der Teilnehmer"  onkeyup="checkForPositiveNumbers()" onclick="checkForPositiveNumbers()" required>
            <div class="invalid-feedback" id="amountIndivGroupFeedback">Bitte geben Sie eine Anzahl ein!</div>
        </div>
    </div>

    <div class="form-row justify-content-center">
        <div class="col-md-12 mb-3" id="indvGruppe-add">
            <button class="btn btn-primary col-md-8 mb-3 mr-auto ml-auto d-block d-lg-none sb-add-indivGroup" type="submit">Hinzufügen
            </button>
            <button class="btn btn-primary col-md-4 mb-3 mr-auto ml-auto d-none d-lg-block sb-add-indivGroup" type="submit">Hinzufügen
            </button>
        </div>
        <div class="col-md-12 mb-3 d-none" id="indvGruppe-change">
            <button class="btn btn-primary col-md-8 mb-3 mr-auto ml-auto d-block d-lg-none sb-add-indivGroup" type="submit">Ändern
            </button>
            <button class="btn btn-primary col-md-4 mb-3 mr-auto ml-auto d-none d-lg-block sb-add-indivGroup" type="submit">Ändern
            </button>
        </div>
    </div>

</form>

<div class="row justify-content-center">
    <button class="btn btn-primary" id="indivGroup-submit">zum Ergebnis</button>
    <label class="text-muted text-center w-100 mt-1">mind. 2 Gruppen</label>
    <label class="invalid-feedback text-center w-100" id="indivGroupFeedback">Vorraussetzung nicht erfüllt!</label>
</div>
