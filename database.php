<?php

    function openConnection() {
        $db_host = "";
        $db_user = "";
        $db_password = "";
        $db_name = "";

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name) or die("Connect failed: %s\n". $conn -> error);

        return $conn;
    }

    function closeConnection($conn) {
        $conn -> close();
    }

?>
