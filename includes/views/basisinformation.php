<?php

echo $this->header;

?>


    <div>

        <h1>Basisinformationen</h1>

        <div class="form-group">
            <label for="title">Titel*</label>
            <input type="title" class="form-control" id="title">


            <div class="form-group">
                <label for="comment">Anmerkungen</label>
                <textarea class="form-control" id="comment" rows="4"></textarea>
                <small id="note" class="form-text text-muted">*gekennzeichnete Felder sind erforderlich</small>
            </div>

            <h2>Voraussetzungen:</h2>
            <p>Lorenm Ipsum</p>

            <button type="submit" class="btn btn-primary">weiter</button>


        </div>





<?php

echo $this->footer;

?>