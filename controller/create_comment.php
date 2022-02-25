<?php
    session_start();
    if(isset($_POST)) {
        include '../connection/connection.php';

        $query = "INSERT INTO comment SET
                    id_post                 = '$_POST[id_post]', 
                    id_account              = '$_SESSION[id_account]',
                    comment                 = '$_POST[comment]'";


        $create = mysqli_query($db_connection, $query);
        
    }



?>

<script> window.location.replace("../detail_page.php?id=<?= $_POST['id_post'] ?>")</script>