<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">

    <title>Vérfier un lien</title>
</head>

<body class="background">

    <?php echo file_get_contents("../html-template/menu-header.html"); ?>

    <div class="container">
        <form action="display-info.php" method="post">

            <div class="row">
                <div class="center">
                    <label class="text" for="check-dns-id">Nom de domaine d'un site potentiellement malveillant <a href="../about-DNS.php" class="text">(<u>exemple.com</u>)</a>:</label>
                </div>
                <div class="check-entry center">
                    <input class="textarea" type="text" id="check-dns-id" name="check-dns" placeholder="Entrer le nom de domaine du site (exemple.com)">
                </div>
            </div>

            <br><br>

            <div class="center">
                <input type="submit" value="Vérifier" class="submit-button button">
            </div>
        </form>
        <br>
    </div>
    
</body>
</html>