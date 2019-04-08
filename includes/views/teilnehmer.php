<div id="sb-teilnehmer-liste" class="container">
</div>

<form class="needs-validation" novalidate>
    <div class="form-row justify-content-center">
        <div class="col-md-4 mb-3 ">
            <label for="vorname" class="d-none d-lg-block">Vorname</label>
            <input type="text" class="form-control" id="vorname" placeholder="Vorname" required>
            <div class="invalid-feedback">Bitte geben Sie ein Vornamen ein!</div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nachname" class="d-none d-lg-block">Nachname</label>
            <input type="text" class="form-control" id="nachname" placeholder="Nachname" required>
            <div class="invalid-feedback">Bitte geben Sie ein Nachnamen ein!</div>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-md-4 mb-3">
            <label for="geburtstag" class="d-none d-lg-block">Geburtstag</label>
            <input type="date" class="form-control" id="geburtstag" required>
            <div class="invalid-feedback">Bitte geben Sie ein Geburtsdatum an!</div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="geschlecht" class="d-none d-lg-block">Geschlecht</label>
            <select id="geschlecht" class="form-control">
                <option>Weiblich</option>
                <option>Männlich</option>
            </select>
            <div class="invalid-feedback">Bitte geben Sie das Geschlecht an!</div>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-md-8 mb-3">
            <label for="email" class="d-none d-lg-block">E-Mail</label>
            <input type="email" class="form-control" id="email" required placeholder="E-Mail">
            <div class="invalid-feedback">Bitte geben Sie eine gültige E-Mail an!</div>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-md-8 mb-3">
            <button class="btn btn-primary col-md-8 mb-3 mr-auto ml-auto d-block d-lg-none" type="submit">Hinzufügen</button>
            <button class="btn btn-primary col-md-4 mb-3 mr-auto ml-auto d-none d-lg-block" type="submit">Hinzufügen</button>
        </div>
    </div>
</form>
