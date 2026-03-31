<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">

    <?php
        include '../database.php';
        $conn = openConnection();

        $dns_to_check = $_POST['check-dns'];

        $check = $conn->query("SELECT * FROM `scam_list` WHERE `dns_name` LIKE '$dns_to_check'"); // vérfier si le DNS a déjà été report
        if ($check -> num_rows == 0) {
            echo "<title>DNS inexistant dans la db...</title>";
            $dns_found = false;
        } else {
            echo "<title>DNS trouvé!</title>";
            $dns_found = true;
        }
    ?>
</head>

<body class="background">
    <?php
        echo file_get_contents("../html-template/menu-header.html");

        if ($dns_found == false) { // si le site ne se trouve pas dans la base de données
            echo "<br><h3 class='text center'>Aucune informations comme quoi <span class='green'>".$dns_to_check."</span> serait malveillant n'a été trouvée!</h3>";

        } elseif ($dns_found == true) { // si le site se trouve dans la base de données
            $line = mysqli_fetch_array($check);

            $dns_name = $line['dns_name']; // récuperer les données
            $username = $line['user'];
            $description = $line['description'];

            $date = $line['date']; // convertie la date
            $timestamp = strtotime($date);
            $day = date("d", $timestamp);
            $month = date("m", $timestamp);
            $year = date("Y", $timestamp);
            $frDate = $day."/".$month."/".$year;

            echo "<h3 class='text center'>Attention, <span class='red'>".$dns_name."</span> est peut-être malveillant!<br>Il a déjà été signalé le ".$frDate." par ".$username.".</h3><br>";

            if (empty($description)) { // si aucune description n'a été rédigée
                echo "<p class='text'><u>Nom de domaine:</u> ".$dns_name."<p class='text'><u>Utilisateur ayant fait le rapport:</u> ".$username."</p><p class='text'><u>Date du rapport:</u> ".$frDate."</p><br>";
            } else {
                echo "<p class='text'><u>Nom de domaine:</u> ".$dns_name."</p><p class='text'><u>Utilisateur ayant fait le rapport:</u> ".$username."</p><p class='text'><u>Date du rapport:</u> ".$frDate."</p><p class='text'><u><br>Description du problème:</u></p><p class='text'>".$description."<br>";
            }

        }
        closeConnection($conn);
    ?>
    
</body>