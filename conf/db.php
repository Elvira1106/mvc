<?php
//класс конфигурации базы данных
class DB{
 //   $mysql = new mysqli("localhost", "root", "", "bd_test");
const USER = "root";
const PASS = "";
const HOST = "localhost";
const DB = "mvc";
 public static function connDB()
 {
    $user = self::USER;
    $pass = self::PASS;
    $host = self::HOST;
    $db = self::DB;

    $conn = new PDO("mysql:dbname=$db;host=$host;charset=UTF8", $user, $pass);
    return $conn;
 }
}