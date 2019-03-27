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
    <link href="css/main.css" rel="stylesheet">

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
    <nav class="navbar navbar-expand-lg navbar-dark <?php if($this->current != "index"): ?>bg-dark<?php endif ?>">
        <!-- Kein Logo wenn Home/Index -->
        <?php if($this->current != "index"): ?>
        <a class="navbar-brand" href="/">
            <i class="fas fa-2x fa-robot d-inline-block align-baseline"></i>
            <h1 class="align-baseline ml-1 d-inline">SplitBuddy</h1>
        </a>
        <?php endif ?>
        <!-- START Toogler oder Anmeldungslink -->
        <!-- Falls nicht angemeldet, Link zur Anmeldung, in Mobiler Version statt Toggler-->
        <?php if($this->loggedIn != true): ?>
        <ul class="navbar-nav ml-auto d-lg-none">
            <li class="nav-item">
                <a class="nav-link" href="/?loggedIn">Anmelden/Registrieren</a>
            </li>
        </ul>
        <?php else: ?>
        <!-- Mobile Menu Toggler nur benötigt wenn wir eingeloggt sind -->
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-2x fa-user-circle"></i>
        </button>
        <?php endif ?>
        <!-- END Toogler oder Anmeldungslink -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <?php if($this->loggedIn != true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/?loggedIn">Anmelden/Registrieren</a>
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