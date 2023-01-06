<?php

include "vendor/autoload.php";
include "config/database.php";

use App\Connection;
use App\User;
use App\Set;
use App\Card;

$connObj = new Connection($host, $database, $user, $password);
$connection = $connObj->connect();