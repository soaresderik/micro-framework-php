<?php

namespace App\Core;

trait Authenticate
{
  public function login()
  {
    return $this->render("users/login");
  }

  public function auth($request)
  {
    // TODO: Buscar e-mail no BD
    $result = $request->post->email;

    // TODO: Aplicar verificação de senha
    // $result && password_verify($request->post->password, $result->password)
    if (true) {
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
