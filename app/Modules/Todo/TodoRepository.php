<?php

namespace App\Modules\Todo;

use App\Core\Eloquent;

class TodoRepository extends Eloquent { 
  public $table = "todos";
  protected $fillable = ["title", "description" ,"user_id"];
}