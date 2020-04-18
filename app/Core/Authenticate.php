<?php

namespace App\Core;

use App\Modules\User\UserRepository;

trait Authenticate
{
  public function login()
  {
    return $this->render("users/login");
  }

  public function auth($request)
  {

    if (!$request->post->email || !$request->post->password)
      return Redirect::route('/users/login', [
        'errors' => ['Os Campos são obrigatórios'],
        'inputs' => ['email' => $request->post->email]
      ]);

    $result = UserRepository::where("email", $request->post->email)->first();

    if ($result && password_verify($request->post->password, $result->password)) {
      $user = [
        'id' => 1,
        'name' => "Ghost",
        'email' => $result->email
      ];
    
      Session::set('user', $user);
      return Redirect::route('/todos');
    }

    return Redirect::route('/users/login', [
      'errors' => ['Usuário ou senha estão incorretos'],
      'inputs' => ['email' => $request->post->email]
    ]);
  }

  public function logout()
  {
    Session::destroy('user');
    return Redirect::route('/login');
  }
}
