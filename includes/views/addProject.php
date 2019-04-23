<?php

echo $this->header;

?>

    <div class="container">
        <?php echo $this->readPartialView('basisinformation'); ?>
        <hr>
        <?php echo $this->readPartialView('teilnehmer'); ?>
        <hr>
        <?php echo $this->readPartialView('einstellungen'); ?>
    </div>

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
                        form.checkValidity();
                        form.classList.add('was-validated');
                        event.preventDefault();
                        event.stopPropagation();
                    }, false);
                });
            }, false);
        })();
    </script>

<?php

echo $this->footer;

?>