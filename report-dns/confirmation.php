<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">

    <title>Merci</title>
</head>

<body class="background">

    <?php echo file_get_contents("../html-template/menu-header.html"); ?>

    <?php
        include '../database.php';
        $conn = openConnection();

        $dns_name = $_POST['dns'];
        $username = $_POST['username'];
        $description = $_POST['description'];
        $descriptionDB = mysqli_real_escape_string($conn, $_POST['description']);;

        if (empty($_POST['dns']) || empty($_POST['username'])) { // si les champs obligatoires ne sont pas remplies
            echo "<h3 class='error-message'>DONNEES MANQUANTES</h3>";

        } elseif (preg_match('/[\'\s^£$%&*()}{@#~?><>,|=+_¬]/', $dns_name)) {
            echo "<h3 class='error-message'>Le nom de domaine est invalide!</h3>
            <h3 class='error-message'>Dans une URL, le nom de domaine est le texte situé entre le protocole (http:// ou https://) et le premier slash (/) suivant.<br> Par exemple, dans l'URL suivante: <u>https://www.example.com/page1.html</u>, le nom de domaine est 'example.com'.</h3><h3 class='error-message'>Attention aux espaces!</h3>";

        } elseif (preg_match('/[\'\s^.£$%&*()}{@#~?><>,|=+¬]/', $username)) { // vérfie si le nom d'utilisateur ne contient pas d'espaces ou de caractères spéciaux
            echo "<h3 class='error-message'>Le nom d'utilisateur est invalide!</h3>";

        } else {

            $check_dns = $conn->query("SELECT `dns_name` FROM `scam_list` WHERE `dns_name` = '$dns_name'"); // vérfier si le DNS n'a pas déjè été enregistré
            $nbReport = $check_dns -> num_rows;

                if ($nbReport >= 1) { // données déjà existante
                    $nbReportEmbed = $nbReport + 1;
                    echo "<br><p class='text'>Le nom de domaine à déjà été enregistré dans la base de donnée (".$dns_name."), merci quand même!";
                }
                else {

                    $report_data = "INSERT INTO `scam_list` (`dns_name`, `description`, `user`, `date`, `ID`) VALUES ('$dns_name', '$descriptionDB', '$username', '".date("Y-m-d")."', '1');"; // requète à la base de données

                    if ($conn->query($report_data) === TRUE) {
                        echo '<h3 class="text">Données Reçues</h4>';

                        if (empty($_POST['description'])) { // si aucune description n'a été rédigée
                            echo "<p class='text'><u>Nom de domaine:</u> ".$dns_name."<p class='text'><u>Nom d'utilisateur:</u> ".$username."</p><br>";
                        } else {
                            echo "<p class='text'><u>Nom de domaine:</u> ".$dns_name."</p><p class='text'><u>Nom d'utilisateur:</u> ".$username."</p><br><p class='text'><u>Description du problème:</u></p><p class='text'>".$description."<br>";
                        }

                        echo "<br><p class='text'>Le nom de domaine potentiellement malveillant a été enregistré dans la base de données!</p>";

                    } else {
                        echo "Error: " . $report_data . "<br>" . $conn->error;
                    }
                }
            closeConnection($conn);
        }
    ?>

</body>
</html>