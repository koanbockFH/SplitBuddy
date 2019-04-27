<h2 class="text-center mb-4">Individuelle Gruppen</h2>

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
            <input type="number" class="form-control" id="amountIndivGroup" placeholder="Anzahl der Teilnehmer" required>
            <div class="invalid-feedback">Bitte geben Sie eine Anzahl ein!</div>
        </div>

        <div class="form-row justify-content-center">
            <div class="col-md-12 mb-3" id="add">
                <button class="btn btn-primary sb-add-group" type="submit">Hinzufügen</button>
            </div>
            <div class="col-md-12 mb-3 d-none" id="change">
                <button class="btn btn-primary sb-add-group" type="submit">Ändern </button>
            </div>

        </div>

        <div class="col-md-12 mb-3 d-none">
            <div class="row justify-content-center"><button class="btn btn-primary" id="nextGroup" disabled>zum Ergebnis</button></div>
        </div>
</form>
<div class="col-md-12 mb-3">
    <div class="row justify-content-center"><button class="btn btn-primary" id="nextGroup" disabled>Zum Ergebnis</button></div>
</div>
