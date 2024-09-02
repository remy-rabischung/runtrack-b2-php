<?php
function my_str_reverse(string $string) : string {
    // Initialisation de la chaîne de caractères inversée
    $reversed = '';
    
    // Parcours de la chaîne de caractères en sens inverse
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        // Ajout du caractère actuel à la nouvelle chaîne
        $reversed .= $string[$i];
    }
    
    // Retourne la chaîne de caractères inversée
    return $reversed;
}

// Exemple d'utilisation de la fonction
$result = my_str_reverse('Hello');
var_dump($result); // Devrait afficher string(5) "olleH"
?>
