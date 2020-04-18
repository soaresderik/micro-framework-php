<?php

namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

$settings = include_once __DIR__ . "/../settings.php";
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => $settings["db"]["driver"],
    'host'      => $settings["db"]["host"],
    'database'  => $settings["db"]["database"],
    'username'  => $settings["db"]["user"],
    'password'  => $settings["db"]["pass"],
    'charset'   => $settings["db"]["charset"],
    'collation' => $settings["db"]["collaction"],
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

abstract class Eloquent extends Model {}
abstract class SQL extends Capsule {}