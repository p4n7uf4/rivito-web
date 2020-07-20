<?php

const DB_HOST = "localhost";
const DB_NAME = "rivito";
const DB_USER = "root";
const DB_PASS = null;
// Habilita as mensagens de erro
ini_set("display_errors", true);

function startConnection() {
    $PDO = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER,DB_PASS);
    return $PDO;
}