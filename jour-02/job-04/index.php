<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbName = 'Ip_official';
$username = 'root';
$password = '';

function find_all_students_grades(): array {
    global $host, $dbName, $username, $password;

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour récupérer les informations des étudiants avec les noms de promotion
        $sql = "
            SELECT s.email, s.fullname, g.name AS grade_name
            FROM student s
            INNER JOIN grade g ON s.grade_id = g.id
        ";

        // Exécution de la requête
        $stmt = $conn->query($sql);

        // Récupération des résultats sous forme de tableau associatif
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $students;
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
    <title>Liste des étudiants avec leurs promotions</title>
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

    <h1>Liste des étudiants avec leurs promotions</h1>

    <?php
    // Appel de la fonction pour récupérer tous les étudiants avec les promotions
    $students = find_all_students_grades();

    // Vérification s'il y a des étudiants
    if (!empty($students)) {
        echo "<table>";
        echo "<tr><th>Email</th><th>Nom Complet</th><th>Nom de la Promotion</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student['email']) . "</td>";
            echo "<td>" . htmlspecialchars($student['fullname']) . "</td>";
            echo "<td>" . htmlspecialchars($student['grade_name']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucun étudiant trouvé.</p>";
    }
    ?>

</body>
</html>
