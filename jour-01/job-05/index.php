<?php
function my_is_prime(int $number) : bool {
    // Si le nombre est inférieur à 2, il n'est pas premier
    if ($number < 2) {
        return false;
    }

    // Vérifie la divisibilité par tous les nombres de 2 à la racine carrée de $number
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            // Si $number est divisible par $i, alors il n'est pas premier
            return false;
        }
    }

    // Si aucune division n'a été exacte, alors le nombre est premier
    return true;
}

// Exemples d'utilisation de la fonction
var_dump(my_is_prime(3));  // Devrait afficher bool(true)
var_dump(my_is_prime(12)); // Devrait afficher bool(false)
?>
