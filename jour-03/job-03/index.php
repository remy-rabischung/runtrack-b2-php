<?php
// Inclure la classe Student
require_once '../class/Student.php';

// Créer une instance de Student
$student = new Student(1, 101, "student1@example.com", "John Doe", new DateTime('2000-01-01'), "male");

// Utiliser les getters pour obtenir les valeurs des propriétés
echo "<h1>Test des getters et setters de la classe Student</h1>";
echo "<p>ID: " . $student->getId() . "</p>";
echo "<p>Grade ID: " . $student->getGradeId() . "</p>";
echo "<p>Email: " . $student->getEmail() . "</p>";
echo "<p>Nom Complet: " . $student->getFullname() . "</p>";
echo "<p>Date de Naissance: " . $student->getBirthdate()->format('Y-m-d') . "</p>";
echo "<p>Genre: " . $student->getGender() . "</p>";

// Modifier les propriétés avec les setters
$student->setFullname("Jane Doe");
$student->setEmail("jane.doe@example.com");

// Afficher les nouvelles valeurs
echo "<h2>Après modification</h2>";
echo "<p>Nom Complet: " . $student->getFullname() . "</p>";
echo "<p>Email: " . $student->getEmail() . "</p>";
?>
