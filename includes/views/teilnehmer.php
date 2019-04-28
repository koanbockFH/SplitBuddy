<h2 class="text-center mb-4">Teilnehmer</h2>

<div class=" table-responsive" >
    <table class="table table-striped userList d-none" id="sb-teilnehmer-liste">
        <thead>
        <tr>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<form novalidate id="teilnehmer-form">
    <div class="form-row justify-content-center">
        <div class="col-md-6 mb-3 ">
            <label for="vorname" class="d-none d-lg-block">Vorname</label>
            <input type="text" class="form-control" id="vorname" placeholder="Vorname" required>
            <div class="invalid-feedback">Bitte geben Sie einen Vornamen ein!</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="nachname" class="d-none d-lg-block">Nachname</label>
            <input type="text" class="form-control" id="nachname" placeholder="Nachname" required>
            <div class="invalid-feedback">Bitte geben Sie einen Nachnamen ein!</div>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-md-6 mb-3">
            <label for="geburtstag" class="d-none d-lg-block">Geburtstag</label>
            <input type="date" class="form-control" id="geburtstag" required>
            <div class="invalid-feedback">Bitte geben Sie ein Geburtsdatum an!</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="geschlecht" class="d-none d-lg-block">Geschlecht</label>
            <select id="geschlecht" class="form-control">
                <option value="1">Weiblich</option>
                <option value="2">Männlich</option>
            </select>
            <div class="invalid-feedback">Bitte geben Sie das Geschlecht an!</div>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-md-12 mb-3">
            <label for="email" class="d-none d-lg-block">E-Mail</label>
            <input type="email" class="form-control" id="email" required placeholder="E-Mail">
            <div class="invalid-feedback">Bitte geben Sie eine gültige E-Mail an!</div>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="col-md-12 mb-3" id="teilnehmer-add">
            <button class="btn btn-primary col-md-8 mb-3 mr-auto ml-auto d-block d-lg-none sb-add-teilnehmer" type="submit">Hinzufügen
            </button>
            <button class="btn btn-primary col-md-4 mb-3 mr-auto ml-auto d-none d-lg-block sb-add-teilnehmer" type="submit">Hinzufügen
            </button>
        </div>
        <div class="col-md-12 mb-3 d-none" id="teilnehmer-change">
            <button class="btn btn-primary col-md-8 mb-3 mr-auto ml-auto d-block d-lg-none sb-add-teilnehmer" type="submit">Ändern
            </button>
            <button class="btn btn-primary col-md-4 mb-3 mr-auto ml-auto d-none d-lg-block sb-add-teilnehmer" type="submit">Ändern
            </button>
        </div>
    </div>
</form>

<div class="row justify-content-center">
    <button class="btn btn-primary" id="teilnehmer-submit">Weiter</button>
    <label class="text-muted text-center w-100 mt-1">mind. 4 Teilnehmer</label>
    <label class="invalid-feedback text-center w-100" id="teilnehmerFeedback">Vorraussetzung nicht erfüllt!</label>
</div>
