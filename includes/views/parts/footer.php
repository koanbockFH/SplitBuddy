        <footer class="sb-footer">
            <span>SplitBuddy © 2019</span>
            <a href="/" class="text-decoration-none float-right sb-link-muted">Impressum</a>
        </footer>
    </div>
    <!-- Script Load -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php if($this->current == "login"): ?>
        <script type="text/javascript" src="js/login.js"></script>
    <?php endif ?>
    <?php if($this->current == "register"): ?>
        <script type="text/javascript" src="js/validateRegister.js"></script>
        <script type="text/javascript" src="js/register.js"></script>
    <?php endif ?>

    </body>
</html>