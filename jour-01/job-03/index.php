<?php
function my_is_multiple(int $divider, int $multiple) : bool {
    // Vérifie si le reste de la division de $multiple par $divider est égal à zéro
    if ($divider === 0) {
        // Évite la division par zéro en retournant false
        return false;
    }
    
    return $multiple % $divider === 0;
}

// Exemples d'utilisation de la fonction
var_dump(my_is_multiple(2, 4)); // Devrait afficher bool(true)
var_dump(my_is_multiple(2, 5)); // Devrait afficher bool(false)
?>
