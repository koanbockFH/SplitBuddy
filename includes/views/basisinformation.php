    <h1>Basisinformationen</h1>


    <form class="needs-validation" novalidate id="sb-basisinformation-form">

        <div class="container">

            <div class="form-row justify-content-center">
                <div class="col-md-6 mb-3">
                    <label for="title" class="d-none d-lg-block">Titel*</label>
                    <input type="text" class="form-control" id="title" placeholder="Titel" required>
                    <div class="invalid-feedback">Bitte geben Sie einen Titel ein </div>
                </div>
            </div>

            <div class="form-row justify-content-center">
                <div class="col-md-6 mb-3">
                    <label for="comment"  class="d-none d-lg-block">Anmerkungen</label>
                    <textarea class="form-control" id="comment" rows="4" placeholder="Anmerkungen"></textarea>
                    <small id="note" class="form-text text-muted">*gekennzeichnete Felder sind erforderlich</small>
                </div>
            </div>

            <div class="form-row justify-content-center">
                <div class="col-md-6 mb-3">
                    <h3>Voraussetzungen:</h3>
                </div>
            </div>

            <div class="form-row justify-content-center">
                <div class="col-md-6 mb-3">
                    <p>Um erfolgreich Gruppen bilden zu können, muss es mindestens vier Teilnehmer geben</p>
                </div>
            </div>

            <div class="button form-row justify-content-center">
                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">weiter</button>
                </div>
            </div>

        </div>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>