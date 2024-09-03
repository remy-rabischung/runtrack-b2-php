<?php
function my_str_search(string $needle, string $haystack) : int {
    // Initialisation du compteur d'occurrences
    $count = 0;
    
    // Parcours de la chaîne de caractères
    for ($i = 0; isset($haystack[$i]); $i++) {
        // Si la lettre actuelle correspond à la lettre cherchée
        if ($haystack[$i] === $needle) {
            $count++;
        }
    }
    
    // Retourne le nombre d'occurrences
    return $count;
}

// Exemple d'utilisation de la fonction
$result = my_str_search('a', 'La Plateforme');
var_dump($result); // Devrait afficher int(2)
?>
