<?php

    if(isset($_POST)) {
        include '../connection/connection.php';
        

        $img = $_FILES['file']['name'];
        
        if ($img != ""){
            var_dump($img);
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $extensions_arr = array("jpg","jpeg","png","gif");

            if( in_array($imageFileType,$extensions_arr) ){
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img)){
                    $query = "UPDATE post SET
                                title                   =   '$_POST[title]', 
                                description             =   '$_POST[description]', 
                                image                   =   '$img'
                                WHERE id_post           =   '$_POST[id_post]'";
                    $update = mysqli_query($db_connection, $query);

                    if($update){
                        // echo "<p> pet added succesfully ! </p>";
                        echo "<script> alert('Post updated succesfully !');</script>";
                    }else{
                        // echo "<p> pet add fail ! </p>";
                        echo "<script> alert('Post update failed !');</script>";
                    }
                }
            }
        }
        else{
            
            $query = "UPDATE post SET
                        title                   =   '$_POST[title]', 
                        description             =   '$_POST[description]'
                        WHERE id_post           =   '$_POST[id_post]'";
            $update = mysqli_query($db_connection, $query);

            if($update){
                // echo "<p> pet added succesfully ! </p>";
                echo "<script> alert('Post updated succesfully !');</script>";
            }else{
                // echo "<p> pet add fail ! </p>";
                echo "<script> alert('Post update failed !');</script>";
            }
        }


        

        


        
    }

?>

<!-- <p><a href="read_pet_200003.php">Back to pet list</a></p> -->

<script> window.location.replace('../index.php')</script>