    <h2 class="text-center mb-4">Informationen</h2>


    <form novalidate id="sb-basisinformation-form">
        <div class="form-row justify-content-center">
            <div class="col-md-8 mb-3">
                <label for="title" class="d-none d-lg-block">Titel*</label>
                <input type="text" class="form-control" id="title" placeholder="Titel" required>
                <div class="invalid-feedback">Bitte geben Sie einen Titel ein </div>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="col-md-8 mb-3">
                <label for="comment"  class="d-none d-lg-block">Anmerkungen</label>
                <textarea class="form-control" id="comment" rows="4" placeholder="Anmerkungen"></textarea>
                <small id="note" class="form-text text-muted">*gekennzeichnete Felder sind erforderlich</small>
            </div>
        </div>
        <div class="button form-row justify-content-center">
            <div class="col-md-6 mb-3">
                <button type="submit" class="btn btn-primary" id="basisinfo-submit">Weiter</button>
            </div>
        </div>
    </form>