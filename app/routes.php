<?php

$routes[] = ["/users/login", "User\UserController@login"];
$routes[] = ["/users/logout", "User\UserController@logout"];
$routes[] = ["/users/auth", "User\UserController@auth"];
$routes[] = ["/users/register", "User\UserController@register"];
$routes[] = ["/users/store", "User\UserController@store"];

$routes[] = ["/todos", "Todo\TodoController@index", "auth"];
$routes[] = ["/todos/create", "Todo\TodoController@create", "auth"];
$routes[] = ["/todos/store", "Todo\TodoController@store", "auth"];

return $routes;
