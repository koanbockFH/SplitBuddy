<!DOCTYPE html>
<html lang="de">
    <head>
        <title><?php echo $this->title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <!-- Extern Stylesheets Sources -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Internal Stylesheets -->
        <?php if($this->current == "login"): ?>
        <link href="css/login.css" rel="stylesheet">
        <?php endif ?>
        <?php if($this->current == "index"): ?>
            <link href="css/index.css" rel="stylesheet">
        <?php endif ?>

        <?php if($this->current == "register"): ?>
            <link href="css/register.css" rel="stylesheet">
        <?php endif ?>

        <!-- START NavBar Test -->
        <?php
        if (isset($_GET['loggedIn'])) {
            $this->loggedIn = true;
        }
        if (isset($_GET['otherSite'])) {
            $this->current = "gruppen";
        }
        ?>
        <!-- END NavBar Test -->
    </head>
    <body>
        <header>
    <!-- Navbar - transparent wenn Homepage/Index-->
    <nav class="navbar navbar-expand-lg navbar-dark sb-navbar <?php if($this->current == "index"): ?>sb-navbar-transparent<?php endif ?>">
        <!-- Kein Logo wenn Home/Index -->
        <a class="navbar-brand <?php if($this->current == "index"): ?>sb-nav-brand<?php endif ?>" href="/">
            <i class="fas fa-lg fa-robot d-inline-block align-baseline d-lg-none"></i>
            <i class="fas fa-2x fa-robot d-none align-top d-lg-inline-block"></i>
            <h1 class="align-baseline ml-1 d-inline">SplitBuddy</h1>
        </a>
        <!-- START Toogler oder Anmeldungslink -->
        <!-- Falls nicht angemeldet, Link zur Anmeldung, in Mobiler Version statt Toggler-->
        <?php if($this->loggedIn != true): ?>
        <ul class="navbar-nav ml-auto d-lg-none">
            <li class="nav-item">
                <a class="nav-link" href="login" id="mobile-login"><i class="fas fa-sign-in-alt"></i></a>
            </li>
        </ul>
        <?php else: ?>
        <!-- Mobile Menu Toggler nur benötigt wenn wir eingeloggt sind -->
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-lg fa-user-circle"></i>
        </button>
        <?php endif ?>
        <!-- END Toogler oder Anmeldungslink -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <?php if($this->loggedIn != true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="login">Anmelden/Registrieren</a>
                </li>
                <?php else: ?>
                <!-- START Mobile Menu; kein Dropdown -->
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="/?otherSite&loggedIn">Meine Gruppen</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="/">Einstellungen</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="/">Abmelden</a>
                </li>
                <!-- END Mobile Menu; kein Dropdown -->
                <!-- START Desktop Menu; Dropdown -->
                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-2x fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu sb-profile-dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/?otherSite&loggedIn">Meine Gruppen</a>
                        <a class="dropdown-item" href="/">Einstellungen</a>
                        <a class="dropdown-item" href="/">Abmelden</a>
                    </div>
                </li>
                <!-- END Desktop Menu; Dropdown -->
                <?php endif ?>
            </ul>
        </div>
    </nav>
</header>