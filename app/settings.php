<?php

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$settings = [];

$settings["db"] = [
  "host"      =>  getenv("DB_HOST") ?: "127.0.0.1",
  "database"  =>  getenv("DB_NAME") ?: "local",
  "user"      =>  getenv("DB_USER") ?: "root",
  "pass"      =>  getenv("DB_PASS") ?: "root",
  "charset"   => "utf8mb4",
  "collation" => "utf8mb4_unicode_ci",
  "flags"     => [
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => true,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
  ],
];


return $settings;
