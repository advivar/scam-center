<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">

    <title>Accueil</title>
</head>
<body class="background">

    <?php echo file_get_contents("html-template/menu-header.html"); ?>

    <br>

    <p class="text"> 
        Scam-Center, comme son nom l’indique est une ressource utilisable publiquement, qui permet à n’importe qui de pouvoir référencer dans une base de données des liens (soit des noms de domaines) potentiellement malveillants.
        <br>Celle-ci se trouve sous la forme d’un site internet, celui-ci permet alors d’accéder à cette base, soit n’importe quel utilisateur peut aller vérifier un nom de domaine préalablement enregistré s’il a été alerté comme ayant de mauvaises intentions. L’utilisateur pourra alors consulter les données rentrées par la personne qui a fait le rapport et en apprendre plus sur le problème.
        <br><br>
        Ce projet a donc pour objectif d’apporter un environnement numérique plus sur contre les nouvelles méthodes d’ingénierie social, utilisées par les hackers.
        <br>Par exemple, un SMS reçu avec un lien suspect pourra être enregistré sur Scam-Center, par la suite des autres personnes pourront vérifier sa fiabilité.
    </p>

    <br>

    <div class="center">
        <a href="report-dns/report.php" class="index-button-padding">
            <button class="index-button button">Alerter sur un site</button>
        </a>
        <a href="checking/check-dns.php" class="index-button-padding">
            <button class="index-button button">Vérifier un site</button>
        </a>
    </div>

</body>
</html>