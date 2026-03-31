<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">

    <title>Repérer un DNS</title>
</head>
<body class="background">

    <?php echo file_get_contents("html-template/menu-header.html"); ?>

    <br>

    <p class="text"> 
        Un nom de domaine est généralement identifiable dans une URL par la partie qui se situe juste après les lettres "http://" ou "https://".
        <br>Cette partie commence par "www." suivi du nom de domaine proprement dit, qui est composé d'une suite de lettres, de chiffres et de tirets, séparés par des points. Par exemple, dans l'URL "<u>https://www.example.com/index.html</u>", le nom de domaine est "example.com".
        <br><br>
        Il est important de noter que certains sites peuvent utiliser des sous-domaines, qui peuvent être indiqués avant le nom de domaine principal, comme dans "<u>https://blog.example.com</u>". Dans ce cas, le sous-domaine est "blog" et le nom de domaine principal est "example.com".
    </p>

</body>
</html>