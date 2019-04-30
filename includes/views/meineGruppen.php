<?php

echo $this->header;

?>

<div class="container mb-5 mt-5">

    <h1>Meine Gruppen</h1>

    <?php if(is_null($this->projektListe)):?>
        <p class="text-center">Es wurden bisher noch keine Gruppen erstellt</p>
        <br>
        <p class="text-center">Legen Sie <a href="addProject">HIER</a> los!</p>
    <?php else: $counter = 0;?>
    <div class="table-responsive">
            <table class="table table-striped meineGruppen " id="sb-meineGruppen-liste">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gruppenname</th>
                    <th scope="col">Anmerkungen</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
        <?php $zaehler=1; ?>
        <?php foreach($this->projektListe as $projekt) { ?>
                <tr>
                    <th scope="row"><?php echo $zaehler++ ?></th>
                    <td><?php echo $projekt->titel ?></td>
                    <td id="td-anmerkungen"><?php echo $projekt->anmerkung ?></td>
                    <td align="right"><button type="button" class="btn btn-primary" onclick="window.location.href='ergebnis?id=<?php echo $projekt->id?>'">Ergebnis</button></td>
                </tr>
        <?php } ?>
                </tbody>
            </table>
    </div>
    <?php endif ?>
</div>

<?php
echo $this->footer;

?>
