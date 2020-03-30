<?php

$routes[] = ["/users/login", "User\UserController@login"];
$routes[] = ["/users/auth", "User\UserController@auth"];
$routes[] = ["/users/register", "User\UserController@register"];
$routes[] = ["/users/store", "User\UserController@store"];

$routes[] = ["/todos", "Todo\TodoController@index", "auth"];

return $routes;
