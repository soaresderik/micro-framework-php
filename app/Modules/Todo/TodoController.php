<?php

namespace App\Modules\Todo;

use App\Core\Controller;
use DateTime;

class TodoController extends Controller
{
  public function index($req)
  {
    $this->view = [
      "tarefas" => [
        ["id" => 1, "title" => "Aprender PHP do jeito certo", "status" => "FINALIZADA", "created_at" => "2019-03-25 12:40:20"],
        ["id" => 2, "title" => "Estudar ReactJS", "status" => "EM PROGRESSO", "created_at" => "2019-03-25 12:40:20"],
        ["id" => 3, "title" => "Aprender boas Práticas de CSS", "status" => "ABERTA", "created_at" => "2019-03-25 12:40:20"],
      ]
    ];

    $this->render("todos/index", "layout");
  }
}
