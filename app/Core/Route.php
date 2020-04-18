<?php

namespace App\Core;

class Route
{

  private $routes;

  function __construct(array $routes)
  {
    $this->setRoutes($routes);
    $this->run();
  }

  private function setRoutes(array $routes)
  {
    foreach ($routes as $route) {
      $explode = explode('@', $route[1]);

      $r = [$route[0], $explode[0], $explode[1]];

      // Rota autenticada
      if (isset($route[2])) {
        $r[] = $route[2];
      }

      // Rota, Controller, Método, [auth]
      $newRoutes[] = $r;
    }

    $this->routes = $newRoutes;
  }

  private function getUrl()
  {
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  }

  private function getRequest()
  {
    $obj = new \stdClass;

    foreach ($_GET as $key => $value) {
      @$obj->get->$key = $value;
    }

    foreach ($_POST as $key => $value) {
      @$obj->post->$key = $value;
    }

    return $obj;
  }

  private function run()
  {
    $url = $this->getUrl();
    $urlArray = explode("/", $url);

    foreach ($this->routes as $route) {
      $routeArray = explode('/', $route[0]);
      $param = [];
      for ($i = 0; $i < count($routeArray); $i++) {
        /** 
         * Verifica se a rota contém parâmetros e faz o parser
         * para comparar posteriormente; E separa o valor do parâmetro */
        if ((strpos($routeArray[$i], "{") !== false) && (count($urlArray) == count($routeArray))) {
          // a rota requisitada coloca o parametro
          $routeArray[$i] = $urlArray[$i];
          $param[] = $urlArray[$i];
        }
        $route[0] = implode($routeArray, "/");
      }

      // Se a rota requisitada combinar com as existentes
      if ($url == $route[0]) {
        $found = true;
        $controller = $route[1];
        $action = $route[2];
        
        if (isset($route[3]) && $route[3] == 'auth' && !(new Auth)->check())
          $action = 'forbidden';
        
        break;
      }
    }

    if (isset($found)) {
      $controller = Container::controllerInstance($controller);
      /**
       * Inicialmente aceita até 3 parâmetros na URL mais a requisição.
       */
      switch (count($param)) {
        case 1:
          $controller->$action($param[0], $this->getRequest());
          break;
        case 2:
          $controller->$action($param[0], $param[1], $this->getRequest());
          break;
        case 3:
          $controller->$action($param[0], $param[1], $param[2], $this->getRequest());
          break;
        default:
          $controller->$action($this->getRequest());
          break;
      }
    }
  }
}
