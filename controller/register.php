<?php 

if(isset($_POST)) {
    include '../connection/connection.php';
    $password = password_hash($_POST['passwordr'], PASSWORD_DEFAULT);

    $query = "INSERT INTO account SET 
                email       =   '$_POST[mailr]',
                username    =   '$_POST[usernamer]',
                password    =   '$password',
                profpict    =   '3.png'
                ";

    $insert = mysqli_query($db_connection, $query);
    if($insert) { // check if query TRUE
        
         echo "<script> alert ('Register succes. now please login using ur account!'); </script>";
    }else{
        
          echo "<script> alert ('Register failed!'); </script>";
    }
}

?>
<script>window.location.replace("../index.php");</script>