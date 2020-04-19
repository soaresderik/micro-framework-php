<?php

namespace App\Modules\Todo;

use App\Core\Redirect;
use App\Core\Auth;
use App\Core\Controller;
use App\Core\SQL;
use App\Modules\Todo\TodoRepository as Todo;

class TodoController extends Controller
{
  public function index($req)
  {
    $todos = SQL::select("SELECT * FROM todos WHERE user_id = :id", ["id" => Auth::id()]); 
    $this->view->tarefas = self::toJson($todos);

    $this->render("todos/index", "layout");
  }

  public function create($req)
  {
    $this->render("todos/create", "layout");
  }

  public function store($req)
  {
    $validation = $this->validator->make($_POST, [
      "taskname" => "required",
      "description" => "required",
    ]);

    $validation->validate();

    if ($validation->fails()) {
      return Redirect::route("/todos/create", [
        "errors" => $validation->errors()->all()
      ]);
    }
    
    Todo::create([
      "title" => $req->post->taskname,
      "description" => $req->post->description,
      "user_id" => Auth::id(),
    ]);

    return Redirect::route("/todos", [
      "success" => ["Tarefa criada com Sucesso"]
    ]);
  }
}
