<?php

namespace App\Core;

class Container
{

  public static function controllerInstance($controller)
  {
    $controller = "App\\Modules\\$controller";

    return new $controller;
  }

  public static function pageNotFound()
  {
    echo "Error 404: Page not found!";
  }
}
