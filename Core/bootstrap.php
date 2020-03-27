<?php

/* start session */
if (!session_id()) session_start();

/* start routes */
$routes = require_once __DIR__ . "/../routes.php";
$route = new \App\Core\Route($routes);
