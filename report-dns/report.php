<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">

    <title>Dénoncer un site</title>
</head>
<body class="background">
    <?php echo file_get_contents("../html-template/menu-header.html"); ?>    
    
    <div class="container">

        <form action="confirmation.php" method="post">

            <div class="row">
                <div class="col-25">
                    <label class="text" for="dns-id">Nom de domaine du site <a href="../about-DNS.php" class="text">(<u>exemple.com</u>)</a>: *</label>
                </div>
                <div class="col-75">
                    <input class="textarea" type="text" id="dns-id" name="dns" placeholder="Entrer le nom de domaine du site (exemple.com)">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-25">
                    <label class="text" for="username-id">Votre pseudo: *</label>
                </div>
                <div class="col-75">
                    <input class="textarea" type="text" id="username-id" name="username" placeholder="Entrer votre pseudo...">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-25">
                    <label class="text" for="description-id">Donner une description:</label>
                </div>
                <div class="col-75">
                    <textarea class="textarea" id="description-id" name="description" placeholder="Entrer une rapide descritpion des volontées malveillantes du site internet..." style="height:100px"></textarea>
                </div>
            </div>

            <br>

            <div class="center">
                <input type="submit" value="Submit" class="submit-button button">
            </div>
        </form>
        <br>
    </div>

</body>
</html>