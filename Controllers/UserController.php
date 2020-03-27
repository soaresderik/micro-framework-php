<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\Session;


class UserController extends Controller {

    public function index($req){

        if($_POST) {
            var_dump($post); die();
            $validation = $this->validator->make($_POST, [
                "email" => "required",
                "password" => "required|min:6",
            ]);
    
            $validation->validate();
    
            if($validation->fails()){
                return Redirect::route("/users/register", [
                    "errors" => $validation->errors()->all()
                ]);
            }
        }

        $this->render("users/login");
    }

    public function login($req){
        $validation = $this->validator->make($_POST, [
            "email" => "required",
            "password" => "required|min:6",
        ]);

        $validation->validate();

        if($validation->fails()){
            return Redirect::route("/users/login", [
                "errors" => $validation->errors()->all()
            ]);
        }
    }

    public function register(){
        $this->render("users/register");
    }

    public function store($req) {
        $validation = $this->validator->make($_POST, [
            "name" => "required",
            "email" => "required",
            "password" => "required|min:6",
        ]);

        $validation->validate();

        if($validation->fails()){
 
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