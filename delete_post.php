<?php

    if(isset($_POST)) {
        include 'connection/connection.php';
        
            $query = "DELETE FROM post WHERE id_post = '$_GET[id]'";
            $update = mysqli_query($db_connection, $query);

            if($update){
                // echo "<p> pet added succesfully ! </p>";
                echo "<script> alert('Post updated succesfully !');</script>";
            }else{
                // echo "<p> pet add fail ! </p>";
                echo "<script> alert('Post update failed !');</script>";
            }


        
    }

?>

<!-- <p><a href="read_pet_200003.php">Back to pet list</a></p> -->

<script> window.location.replace('index.php')</script>