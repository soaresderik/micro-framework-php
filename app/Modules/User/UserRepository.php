<?php

namespace App\Modules\User;

use App\Core\Eloquent;

class UserRepository extends Eloquent { 
  public $table = "users";

  protected $fillable = ["name", "email", "password"];
}