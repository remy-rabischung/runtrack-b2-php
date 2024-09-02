<?php
function my_closest_to_zero(array $array) : int {
    // Vérifie si le tableau n'est pas vide
    if (empty($array)) {
        // Retourne 0 si le tableau est vide (à ajuster selon les besoins)
        return 0;
    }

    // On initialise la variable $closest avec la première valeur du tableau
    $closest = $array[0];

    // Parcourt le tableau pour trouver le nombre le plus proche de 0
    foreach ($array as $number) {
        // Si la valeur absolue de $number est plus proche de 0 que celle de $closest
        // ou si elles sont égales mais que $number est positif (préférence pour les nombres négatifs en cas d'égalité)
        if (abs($number) < abs($closest) || (abs($number) == abs($closest) && $number > $closest)) {
            $closest = $number;
        }
    }

    // Retourne le nombre le plus proche de 0
    return $closest;
}

// Exemples d'utilisation de la fonction
var_dump(my_closest_to_zero([2, -1, 5, 23, 21, 9])); // Devrait afficher int(-1)
var_dump(my_closest_to_zero([234, -142, 512, 1223, 451, -59])); // Devrait afficher int(-59)
?>
