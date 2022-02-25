<?php
    session_start();
    if(isset($_POST)) {
        include '../connection/connection.php';
        if(isset($_POST['password'])) {
            $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            $password = $_SESSION['password'];
        }

        $img = $_FILES['file']['name'];
        
        if ($img != ""){
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $extensions_arr = array("jpg","jpeg","png","gif");

            if( in_array($imageFileType,$extensions_arr) ){
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img)){
                    $query = "UPDATE account SET
                                email                   =   '$_POST[email]', 
                                username                =   '$_POST[username]', 
                                password                =   '$password', 
                                profpict                =   '$img'
                                WHERE id_account        =   '$_POST[id_account]'";
                    $update = mysqli_query($db_connection, $query);

                    if($update){
                        // echo "<p> pet added succesfully ! </p>";
                        echo "<script> alert('account updated succesfully !');</script>";
                    }else{
                        // echo "<p> pet add fail ! </p>";
                        echo "<script> alert('account update failed !');</script>";
                    }
                }
            }
        }
        else{
            
            $query = "UPDATE account SET
            email                   =   '$_POST[email]', 
            username                =   '$_POST[username]', 
            password                =   '$password'
            WHERE id_account        =   '$_POST[id_account]'";
            $update = mysqli_query($db_connection, $query);

            if($update){
                // echo "<p> pet added succesfully ! </p>";
                echo "<script> alert('account updated succesfully !');</script>";
            }else{
                // echo "<p> pet add fail ! </p>";
                echo "<script> alert('account update failed !');</script>";
            }
        }


        

        


        
    }

?>

<!-- <p><a href="read_pet_200003.php">Back to pet list</a></p> -->

<script> window.location.replace('../index.php')</script>