<?php

//define Routes
$route['/'] = array('BaseController' => 'IndexController', 'uniqueName' => 'index');
$route['/index'] = array('BaseController' => 'IndexController', 'uniqueName' => 'index');
$route['/index.html'] = array('BaseController' => 'IndexController', 'uniqueName' => 'index');

$route['/addProject'] = array('BaseController' => 'AddProjectController', 'uniqueName' => 'addProject');
$route['/addProject.html'] = array('BaseController' => 'AddProjectController', 'uniqueName' => 'addProject');

$route['/login'] = array('BaseController' => 'LoginController', 'uniqueName' => 'login');
$route['/login.html'] = array('BaseController' => 'LoginController', 'uniqueName' => 'login');

$route['/register'] = array('BaseController' => 'RegisterController', 'uniqueName' => 'register');
$route['/register.html'] = array('BaseController' => 'RegisterController', 'uniqueName' => 'register');

$route['/ergebnis'] = array('BaseController' => 'ErgebnisController', 'uniqueName' => 'ergebnis');
$route['/ergebnis.html'] = array('BaseController' => 'ErgebnisController', 'uniqueName' => 'ergebnis');

$route['/registrationComplete'] = array('BaseController' => 'RegistrationCompleteController', 'uniqueName' => 'registrationComplete');
$route['/registrationComplete.html'] = array('BaseController' => 'RegistrationCompleteController', 'uniqueName' => 'registrationComplete');

$route['/logout'] = array('BaseController' => 'LogoutController', 'uniqueName' => 'logout');
$route['/logout.html'] = array('BaseController' => 'LogoutController', 'uniqueName' => 'logout');

$route['/meineGruppen'] = array('BaseController' => 'GruppenController', 'uniqueName' => 'meineGruppen');
$route['/meineGruppen.html'] = array('BaseController' => 'GruppenController', 'uniqueName' => 'meineGruppen');