<?php
function my_array_sort(array $arrayToSort, string $order) : array {
    // Fonction de tri pour l'ordre croissant
    if ($order === 'ASC') {
        for ($i = 0; $i < count($arrayToSort) - 1; $i++) {
            for ($j = 0; $j < count($arrayToSort) - $i - 1; $j++) {
                if ($arrayToSort[$j] > $arrayToSort[$j + 1]) {
                    // Échange des éléments si l'ordre n'est pas respecté
                    $temp = $arrayToSort[$j];
                    $arrayToSort[$j] = $arrayToSort[$j + 1];
                    $arrayToSort[$j + 1] = $temp;
                }
            }
        }
    }
    // Fonction de tri pour l'ordre décroissant
    elseif ($order === 'DESC') {
        for ($i = 0; $i < count($arrayToSort) - 1; $i++) {
            for ($j = 0; $j < count($arrayToSort) - $i - 1; $j++) {
                if ($arrayToSort[$j] < $arrayToSort[$j + 1]) {
                    // Échange des éléments si l'ordre n'est pas respecté
                    $temp = $arrayToSort[$j];
                    $arrayToSort[$j] = $arrayToSort[$j + 1];
                    $arrayToSort[$j + 1] = $temp;
                }
            }
        }
    } else {
        // Si l'ordre n'est ni 'ASC' ni 'DESC', on retourne le tableau non trié
        return $arrayToSort;
    }

    // Retourne le tableau trié
    return $arrayToSort;
}

// Exemples d'utilisation de la fonction
var_dump(my_array_sort([2, 24, 12, 7, 34], 'ASC'));  // Devrait afficher [2, 7, 12, 24, 34]
var_dump(my_array_sort([8, 5, 23, 89, 6, 10], 'DESC')); // Devrait afficher [89, 23, 10, 8, 6, 5]
var_dump(my_array_sort(['apple', 'orange', 'banana', 'grape'], 'ASC'));  // Devrait afficher ['apple', 'banana', 'grape', 'orange']
var_dump(my_array_sort(['apple', 'orange', 'banana', 'grape'], 'DESC')); // Devrait afficher ['orange', 'grape', 'banana', 'apple']
?>
