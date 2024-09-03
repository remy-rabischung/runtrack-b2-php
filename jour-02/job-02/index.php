<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbName = 'Ip_official';
$username = 'root';
$password = '';

function find_one_student(string $email) : array {
    global $host, $dbName, $username, $password;

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour sélectionner un étudiant par email
        $sql = "SELECT * FROM student WHERE email = :email";

        // Préparation et exécution de la requête
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Récupération du résultat
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retourner un tableau avec les informations de l'étudiant ou un tableau vide si aucun résultat
        return $student ? $student : [];

    } catch (PDOException $e) {
        // En cas d'erreur, retourner un tableau vide
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'un étudiant</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

    <h1>Recherche d'un étudiant</h1>

    <!-- Formulaire pour saisir l'email de l'étudiant -->
    <form method="get">
        <label for="email">Email de l'étudiant :</label>
        <input type="text" id="email" name="input-email-student" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php
    // Vérifier si l'email a été soumis via le formulaire
    if (isset($_GET['input-email-student'])) {
        $email = $_GET['input-email-student'];

        // Appel de la fonction pour récupérer les informations de l'étudiant
        $student = find_one_student($email);

        // Vérification si l'étudiant a été trouvé
        if (!empty($student)) {
            echo "<h2>Informations de l'étudiant</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Grade ID</th><th>Email</th><th>Nom complet</th><th>Date de naissance</th><th>Genre</th></tr>";
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student['id']) . "</td>";
            echo "<td>" . htmlspecialchars($student['grade_id']) . "</td>";
            echo "<td>" . htmlspecialchars($student['email']) . "</td>";
            echo "<td>" . htmlspecialchars($student['fullname']) . "</td>";
            echo "<td>" . htmlspecialchars($student['birthdate']) . "</td>";
            echo "<td>" . htmlspecialchars($student['gender']) . "</td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "<p>Aucun étudiant trouvé avec cet email.</p>";
        }
    }
    ?>

</body>
</html>
