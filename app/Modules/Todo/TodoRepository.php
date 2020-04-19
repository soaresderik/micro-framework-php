<?php

namespace App\Modules\Todo;

use App\Core\Eloquent;

class TodoRepository extends Eloquent { 
  public $table = "todos";
  protected $fillable = ["user_id"];
}