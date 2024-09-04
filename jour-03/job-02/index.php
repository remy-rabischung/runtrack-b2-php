<?php
// Inclure les classes
require_once '../class/Grade.php';
require_once '../class/Room.php';
require_once '../class/Floor.php';

// Créer des instances de chaque classe
$grade = new Grade(1, "Bachelor 1", new DateTime('2023-01-09'));
$room = new Room(1, 1, "RDC Food and Drinks", 90);
$floor = new Floor(1, "Rez-de-chaussée", 0);

// Afficher les informations
echo "<h1>Test des classes Grade, Room et Floor</h1>";
echo "<pre>";
print_r($grade);
print_r($room);
print_r($floor);
echo "</pre>";
?>
