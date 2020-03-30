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
    if (Session::get('errors')) {
      $this->errors = Session::get('errors');
      Session::destroy('errors');
    }
    if (Session::get('inputs')) {
      $this->inputs = Session::get('inputs');
      Session::destroy('inputs');
    }
    if (Session::get('success')) {
      $this->success = Session::get('success');
      Session::destroy('success');
    }
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
    if (file_exists(__DIR__ . "/../Views/{$this->layoutPath}.phtml")) {
      return require_once __DIR__ . "/../Views/{$this->layoutPath}.phtml";
    } else {
      echo "Error: Layout não encontrado";
    }
  }

  protected function content()
  {
    if (file_exists(__DIR__ . "/../Views/{$this->viewPath}.phtml")) {
      return require_once __DIR__ . "/../Views/{$this->viewPath}.phtml";
    } else {
      echo "Error: View path not found!";
    }
  }

  public function forbidden()
  {
    return Redirect::route('/users/login');
  }
}
