<?php
// Inclure la classe Student
require_once '../class/Student.php';

// Créer deux instances de Student
$student1 = new Student(1, 101, "student1@example.com", "John Doe", new DateTime('2000-01-01'), "male");
$student2 = new Student(2, 102, "student2@example.com", "Jane Smith", new DateTime('1998-05-15'), "female");

// Afficher les informations des étudiants
echo "<h1>Test de la classe Student</h1>";
echo "<pre>";
print_r($student1);
print_r($student2);
echo "</pre>";

// Test des getters
echo "<h2>Test des getters</h2>";
echo "Email de student1: " . $student1->getEmail() . "<br>";
echo "Nom complet de student2: " . $student2->getFullname() . "<br>";
?>
