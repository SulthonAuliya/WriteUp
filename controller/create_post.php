<?php
    session_start();
    if(isset($_POST)) {
        include '../connection/connection.php';

        $img = $_FILES['file']['name'];
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $extensions_arr = array("jpg","jpeg","png","gif");

        if( in_array($imageFileType,$extensions_arr) ){
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img)){
                $query = "INSERT INTO post 
                            (title, description, image, id_account) 
                            VALUES 
                            (
                                '$_POST[title]', 
                                '$_POST[description]', 
                                '$img', 
                                '$_SESSION[id_account]'
                        )";
                $create = mysqli_query($db_connection, $query);

                if($create){
                    // echo "<p> pet added succesfully ! </p>";
                    echo "<script> alert('Posted succesfully !');</script>";
                }else{
                    // echo "<p> pet add fail ! </p>";
                    echo "<script> alert('Post failed !');</script>";
                }
            }
        }

        


        
    }

?>

<!-- <p><a href="read_pet_200003.php">Back to pet list</a></p> -->

<script> window.location.replace('../index.php')</script>