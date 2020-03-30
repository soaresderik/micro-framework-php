<?php

namespace App\Modules\User;

use App\Core\Redirect;
use App\Core\Controller;
use App\Core\Authenticate;

class UserController extends Controller
{

  use Authenticate;


  public function register()
  {
    $this->render("users/register");
  }

  public function store($req)
  {
    $validation = $this->validator->make($_POST, [
      "name" => "required",
      "email" => "required",
      "password" => "required|min:6",
    ]);

    $validation->validate();

    if ($validation->fails()) {

      return Redirect::route("/users/register", [
        "errors" => $validation->errors()->all()
      ]);
    }

    $data = [
      "name" => $req->post->name,
      "email" => $req->post->email,
      "password" => password_hash($req->post->password, PASSWORD_DEFAULT)
    ];

    return Redirect::route("/users/login", [
      "success" => ["Usuário cadastrado com sucesso!"]
    ]);
  }
}
