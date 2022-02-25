<?php 

session_start();
if(isset($_POST)){
    include '../connection/connection.php';
    
    $query = "SELECT * FROM account WHERE username='$_POST[username]' OR email='$_POST[username]'";
    

    $login = mysqli_query($db_connection, $query);

    if(mysqli_num_rows($login) > 0){
        $user = mysqli_fetch_assoc($login);
        if(password_verify($_POST['password'], $user['password'])){

            $_SESSION['login']=TRUE;
            $_SESSION['id_account']=$user['id_account'];
            $_SESSION['username']=$user['username'];
            $_SESSION['password']=$user['password'];
            $_SESSION['email']=$user['email']; 
            $_SESSION['profpict']=$user['profpict'];

            echo "<script> alert ('Login success !'); window.location.replace('../index.php');</script>";
        } else{
            echo "<script> alert ('login failed, wrong password !'); window.location.replace('../index.php');</script>";
        } 
    }else{
        echo "<script> alert ('Login failed, user not found !'); window.location.replace('../index.php');</script>";
    }
}

?>