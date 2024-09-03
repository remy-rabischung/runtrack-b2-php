<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbName = 'Ip_official';
$username = 'root';
$password = '';

function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId): void {
    global $host, $dbName, $username, $password;

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour insérer un nouvel étudiant
        $sql = "INSERT INTO student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :gradeId)";

        // Préparation de la requête
        $stmt = $conn->prepare($sql);

        // Définir les valeurs à lier
        $emailParam = $email;
        $fullnameParam = $fullname;
        $genderParam = $gender;
        $birthdateParam = $birthdate->format('Y-m-d');
        $gradeIdParam = $gradeId;

        // Liaison des paramètres
        $stmt->bindParam(':email', $emailParam, PDO::PARAM_STR);
        $stmt->bindParam(':fullname', $fullnameParam, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $genderParam, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $birthdateParam, PDO::PARAM_STR);
        $stmt->bindParam(':gradeId', $gradeIdParam, PDO::PARAM_INT);

        // Exécution de la requête
        $stmt->execute();

        echo "L'étudiant a été ajouté avec succès.";
    } catch (PDOException $e) {
        // Afficher l'erreur SQL
        echo "Erreur SQL : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
    <style>
        form {
            margin: 20px 0;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

    <h1>Ajouter un nouvel étudiant</h1>

    <!-- Formulaire pour ajouter un nouvel étudiant -->
    <form method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="input-email" required>

        <label for="fullname">Nom complet :</label>
        <input type="text" id="fullname" name="input-fullname" required>

        <label for="gender">Genre :</label>
        <select id="gender" name="input-gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="birthdate">Date de naissance :</label>
        <input type="date" id="birthdate" name="input-birthdate" required>

        <label for="grade_id">Grade ID :</label>
        <input type="number" id="grade_id" name="input-grade_id" required>

        <button type="submit">Ajouter l'étudiant</button>
    </form>

    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Déboguer : vérifier les valeurs soumises
        var_dump($_POST);

        $email = $_POST['input-email'];
        $fullname = $_POST['input-fullname'];
        $gender = $_POST['input-gender'];
        $birthdate = new DateTime($_POST['input-birthdate']);
        $gradeId = (int)$_POST['input-grade_id'];

        insert_student($email, $fullname, $gender, $birthdate, $gradeId);
    }
    ?>

</body>
</html>
