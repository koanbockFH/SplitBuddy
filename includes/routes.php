<?php

//define Routes
$route['/'] = array('controller' => 'IndexController', 'uniqueName' => 'index');
$route['/index'] = array('controller' => 'IndexController', 'uniqueName' => 'index');
$route['/index.html'] = array('controller' => 'IndexController', 'uniqueName' => 'index');

$route['/addProject'] = array('controller' => 'AddProjectController', 'uniqueName' => 'addProject');
$route['/addProject.html'] = array('controller' => 'AddProjectController', 'uniqueName' => 'addProject');
