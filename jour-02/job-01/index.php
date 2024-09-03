<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbName = 'Ip_official';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour sélectionner tous les étudiants
    $sql = "SELECT * FROM student";

    // Exécution de la requête
    $stmt = $conn->query($sql);

    // Vérification s'il y a des résultats
    if ($stmt->rowCount() > 0) {
        // Affichage des résultats
        echo "<h2>Liste des étudiants</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nom Complet</th><th>Email</th><th>Date de Naissance</th><th>Genre</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['birthdate'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun étudiant trouvé.";
    }
} catch (PDOException $e) {
    // Afficher une erreur si la connexion échoue ou en cas d'autre erreur SQL
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
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

    <?php
    // Le tableau des étudiants est déjà affiché plus haut dans le code,
    // donc cette section n'est plus nécessaire. 
    // Supprimez ou commentez cette partie si elle n'est pas utilisée.
    ?>

</body>
</html>
