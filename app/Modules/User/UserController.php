<?php

namespace App\Modules\User;

use App\Core\Redirect;
use App\Core\Controller;
use App\Modules\User\UserRepository as User;

class UserController extends Controller
{
  
  use \App\Core\Authenticate;

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

    $user = User::where("email", $req->post->email)->first();

    if ($user)
      return Redirect::route("/users/register", [
        "errors" => ["Usuário já cadastrado"]
      ]);
    
    $user = User::create([
      "name" => $req->post->name,
      "email" => $req->post->email,
      "password" => password_hash($req->post->password, PASSWORD_DEFAULT)
    ]);

    if(!$user)
      return Redirect::route("/users/register", [
        "errors" => ["Ocorreu um erro ao tentar salvar usuário no sistema"]
      ]);

    return Redirect::route("/users/login", [
      "success" => ["Usuário cadastrado com sucesso!"]
    ]);
  }
}
