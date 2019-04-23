<?php

//define Routes
$route['/'] = array('controller' => 'IndexController', 'uniqueName' => 'index');
$route['/index'] = array('controller' => 'IndexController', 'uniqueName' => 'index');
$route['/index.html'] = array('controller' => 'IndexController', 'uniqueName' => 'index');

$route['/addProject'] = array('controller' => 'AddProjectController', 'uniqueName' => 'addProject');
$route['/addProject.html'] = array('controller' => 'AddProjectController', 'uniqueName' => 'addProject');

$route['/login'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/login.html'] = array('controller' => 'LoginController', 'uniqueName' => 'login');

$route['/register'] = array('controller' => 'RegisterController', 'uniqueName' => 'register');
$route['/register.html'] = array('controller' => 'RegisterController', 'uniqueName' => 'register');

