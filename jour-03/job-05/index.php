<?php
// Inclure les fonctions et les classes
require_once '../functions.php';
require_once '../class/Grade.php';
require_once '../class/Student.php';

// Trouver une promotion (Grade) avec l'ID 1
$grade = findOneGrade(1);

// Récupérer les étudiants dans cette promotion
if ($grade) {
    $students = $grade->getStudents();
    echo "<h1>Étudiants dans la promotion " . htmlspecialchars($grade->getName()) . "</h1>";
    echo "<pre>";
    print_r($students);
    echo "</pre>";
} else {
    echo "<p>Aucune promotion trouvée avec cet ID.</p>";
}
?>
