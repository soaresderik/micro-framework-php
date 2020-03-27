<?php 

$routes[] = ["/users", "UserController@index"];
$routes[] = ["/users/login", "UserController@index"];
$routes[] = ["/users/signin", "UserController@login"];
$routes[] = ["/users/register", "UserController@register"];
$routes[] = ["/users/store", "UserController@store"];

$routes[] = ["/users/dashboard", "UserController@create", "auth"];
$routes[] = ["/users/{id}/create", "UserController@create"];

return $routes;