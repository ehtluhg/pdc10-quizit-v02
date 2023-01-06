<?php
include('vendor/autoload.php');
require('init.php');

use App\Card;

$id = $_GET['id']; 

$deleteCard = new Card('');
$deleteCard->setConnection($connection);
$card = $deleteCard->delete($id);
header('Location: create-study-set.php');
?>