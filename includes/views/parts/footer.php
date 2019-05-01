        </div>
        <footer class="sb-footer">
            <div class="text-center">© 2019 | Axel, Larissa, Magdalena</div>
        </footer>
    </div>
    <!-- Script Load -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php if($this->current == "login"): ?>
        <script type="text/javascript" src="js/login.js"></script>
    <?php endif ?>
    <?php if($this->current == "addProject"): ?>
        <script src="js/CardNavigation.js"></script>
        <script src="js/addProject.js"></script>
        <script src="js/teilnehmer.js"></script>
        <script src="js/einstellungen.js"></script>
        <script src="js/indvGruppe.js"></script>
    <?php endif ?>
    <?php if($this->current == "register"): ?>
        <script type="text/javascript" src="js/validateRegister.js"></script>
        <script type="text/javascript" src="js/register.js"></script>
    <?php endif ?>

    </body>
</html>