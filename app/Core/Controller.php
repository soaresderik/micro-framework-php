<?php

namespace App\Core;

use App\Core\Session;
use Rakit\Validation\Validator;

class Controller
{
  protected $view;
  protected $auth;
  protected $input;
  protected $errors;
  protected $success;
  protected $viewPath;
  protected $layoutPath;
  protected $validator;

  public function __construct()
  {
    $this->view = new \stdClass;
    $this->validator = new Validator();

    $this->errors = self::toJson(Session::get('errors'));
    Session::destroy('errors');

    $this->inputs = Session::get('inputs');
    Session::destroy('inputs');

    $this->success = self::toJson(Session::get('success'));
    Session::destroy('success');

  }

  protected function render($viewPath, $layoutPath = null)
  {
    $this->viewPath = $viewPath;
    $this->layoutPath = $layoutPath;
    if ($layoutPath) {
      return $this->layout();
    } else {
      return $this->content();
    }
  }

  protected function layout()
  {
    if (file_exists(__DIR__ . "/../Views/{$this->layoutPath}.php")) {
      return require_once __DIR__ . "/../Views/{$this->layoutPath}.php";
    } else {
      echo "Error: Layout não encontrado";
    }
  }

  protected function content()
  {
    if (file_exists(__DIR__ . "/../Views/{$this->viewPath}.php")) {
      return require_once __DIR__ . "/../Views/{$this->viewPath}.php";
    } else {
      echo "Error: View path not found!";
    }
  }

  public function forbidden()
  {
    return Redirect::route('/users/login');
  }

  public static function toJson($data){
    return json_encode($data ?: [], JSON_UNESCAPED_UNICODE);
  }
}
