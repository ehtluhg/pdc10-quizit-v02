<?php
include('vendor/autoload.php');
require('init.php');

use App\Set;
$id = $_GET['id']; 
$user_id = $_GET['user_id']; 

$deleteSet = new Set('');
$deleteSet->setConnection($connection);
$set = $deleteSet->delete($id);
header('Location: dashboard.php?user_id=' . $user_id);
?>