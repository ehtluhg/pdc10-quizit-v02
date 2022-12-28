<?php

include "vendor/autoload.php";
include "config/database.php";

use App\Connection;
use App\User;

$connObj = new Connection($host, $database, $user, $password);
$connection = $connObj->connect();