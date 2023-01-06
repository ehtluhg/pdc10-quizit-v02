<?php
include('vendor/autoload.php');
require('init.php');

use App\Card;

$id = $_GET['id']; 
$set_id = $_GET['set_id']; 

$deleteCard = new Card('');
$deleteCard->setConnection($connection);
$card = $deleteCard->delete($id);
header('Location: create-flash-cards.php?set_id=' . $set_id);
?>