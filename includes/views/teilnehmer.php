<div id="sb-teilnehmer-liste container-fluid" >
    <!-- template -->
    <div class="sb-teilnehmer-item row d-none">
        <label class="sb-teilnehmer-titel col-sm">Teilnehmer 1:</label>
        <label class="sb-teilnehmer-vorname col-sm text-right">Vorname</label>
        <label class="sb-teilnehmer-nachname col-sm text-right">Nachname</label>
        <button class="btn btn-link sb-no-style-button col-sm text-left"><i class="fas fa-pencil-alt"></i></button>
    </div>
</div>

<div class="container-fluid">
    <form class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="vorname">Vorname</label>
                <input type="text" class="form-control" id="vorname" placeholder="Vorname" required>
                <div class="invalid-feedback">Bitte geben Sie ein Vornamen ein!</div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="nachname">Nachname</label>
                <input type="text" class="form-control" id="nachname" placeholder="Nachname" required>
                <div class="invalid-feedback">Bitte geben Sie ein Nachnamen ein!</div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="geburtstag">Geburtstag</label>
                <input type="date" class="form-control" id="geburtstag" required>
                <div class="invalid-feedback">Bitte geben Sie ein Geburtsdatum an!</div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="geschlecht">Geschlecht</label>
                <select id="geschlecht" class="form-control">
                    <option>Weiblich</option>
                    <option>Männlich</option>
                </select>
                <div class="invalid-feedback">Bitte geben Sie das Geschlecht an!</div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" required>
                <div class="invalid-feedback">Bitte geben Sie eine gültige E-Mail an!</div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Hinzufügen</button>
    </form>
</div>
