<?php
// Inclure les fonctions et les classes
require_once '../functions.php';
require_once '../class/Student.php';
require_once '../class/Grade.php';
require_once '../class/Room.php';
require_once '../class/Floor.php';

// Trouver un étudiant avec l'ID 1
$student = findOneStudent(1);
echo "<h1>Test de la fonction findOneStudent</h1>";
if ($student) {
    echo "<pre>";
    print_r($student);
    echo "</pre>";
} else {
    echo "<p>Aucun étudiant trouvé avec cet ID.</p>";
}

// Trouver une promotion avec l'ID 1
$grade = findOneGrade(1);
echo "<h1>Test de la fonction findOneGrade</h1>";
if ($grade) {
    echo "<pre>";
    print_r($grade);
    echo "</pre>";
} else {
    echo "<p>Aucune promotion trouvée avec cet ID.</p>";
}

// Trouver une salle avec l'ID 1
$room = findOneRoom(1);
echo "<h1>Test de la fonction findOneRoom</h1>";
if ($room) {
    echo "<pre>";
    print_r($room);
    echo "</pre>";
} else {
    echo "<p>Aucune salle trouvée avec cet ID.</p>";
}

// Trouver un étage avec l'ID 1
$floor = findOneFloor(1);
echo "<h1>Test de la fonction findOneFloor</h1>";
if ($floor) {
    echo "<pre>";
    print_r($floor);
    echo "</pre>";
} else {
    echo "<p>Aucun étage trouvé avec cet ID.</p>";
}
?>
