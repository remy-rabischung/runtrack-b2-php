<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbName = 'Ip_official';
$username = 'root';
$password = '';

function find_full_rooms(): array {
    global $host, $dbName, $username, $password;

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour récupérer les noms et la capacité des salles, ainsi que le nombre d'étudiants
        $sql = "
            SELECT r.name AS room_name, r.capacity, 
                   COALESCE(COUNT(s.id), 0) AS student_count,
                   CASE 
                       WHEN COALESCE(COUNT(s.id), 0) >= r.capacity THEN 'Oui'
                       ELSE 'Non'
                   END AS is_full
            FROM room r
            LEFT JOIN student s ON r.id = s.room_id
            GROUP BY r.id, r.name, r.capacity
        ";

        // Exécution de la requête
        $stmt = $conn->query($sql);

        // Récupération des résultats sous forme de tableau associatif
        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rooms;
    } catch (PDOException $e) {
        // Afficher l'erreur SQL
        echo "Erreur SQL : " . $e->getMessage();
        return [];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Salles</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h1>Liste des salles et leur statut de remplissage</h1>

    <?php
    // Appel de la fonction pour récupérer les informations des salles
    $rooms = find_full_rooms();

    // Vérification s'il y a des salles
    if (!empty($rooms)) {
        echo "<table>";
        echo "<tr><th>Nom de la Salle</th><th>Capacité</th><th>Nombre d'Étudiants</th><th>Pleine ?</th></tr>";
        foreach ($rooms as $room) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($room['room_name']) . "</td>";
            echo "<td>" . htmlspecialchars($room['capacity']) . "</td>";
            echo "<td>" . htmlspecialchars($room['student_count']) . "</td>";
            echo "<td>" . htmlspecialchars($room['is_full']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucune salle trouvée.</p>";
    }
    ?>

</body>
</html>
