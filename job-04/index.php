<?php
function my_fizz_buzz(int $length) : array {
    // Initialisation du tableau de résultat
    $result = [];
    
    // Boucle pour générer les valeurs du tableau
    for ($i = 1; $i <= $length; $i++) {
        // Vérifie si $i est un multiple de 3 et 5
        if ($i % 3 === 0 && $i % 5 === 0) {
            $result[] = 'FizzBuzz';
        } 
        // Vérifie si $i est un multiple de 3
        elseif ($i % 3 === 0) {
            $result[] = 'Fizz';
        } 
        // Vérifie si $i est un multiple de 5
        elseif ($i % 5 === 0) {
            $result[] = 'Buzz';
        } 
        // Sinon, ajoute simplement l'entier $i
        else {
            $result[] = $i;
        }
    }
    
    // Retourne le tableau généré
    return $result;
}

// Exemple d'utilisation de la fonction
$result = my_fizz_buzz(15);
var_dump($result); 
// Devrait afficher : [1, 2, 'Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz', 11, 'Fizz
