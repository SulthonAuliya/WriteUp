<?php
    session_start();
    if(isset($_POST)) {
        include '../connection/connection.php';

        $query = "DELETE FROM likes where
                    id_likes                 = '$_POST[id_likes]' ";


        $delete = mysqli_query($db_connection, $query);
        
    }



?>

<script> window.location.replace("../detail_page.php?id=<?= $_POST['id_post'] ?>")</script>