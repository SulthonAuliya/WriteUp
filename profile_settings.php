<?php 
        session_start();
        include "connection/connection.php";
        if(!isset($_SESSION['login'])){
            echo "<script> alert ('Please login first!'); window.location.replace('index.php');</script>";
        }

        $query = "SELECT * FROM account WHERE id_account = '$_SESSION[id_account]'";

        $post = mysqli_query($db_connection, $query);

        $data = mysqli_fetch_assoc($post);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
<meta http-equiv="Content-Language" content="en">
    <title>WriteUp</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png">
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="left">
            <a href="profile.php?id=<?= $_SESSION['id_account'] ?>"> < Back</a>
        </div>

        <ul>
            <li><a  href="index.php">Home</a></li>
        </ul>
    </div>
    <!-- end of navbar -->


    <div class="addPage">
        <div class="card">
            <H1>Profile Settings</H1>
            <form method="POST" action="controller/update_account.php" enctype='multipart/form-data'>
                <div class="img-dec">
                    <label for="file" >Upload Image</label>
                    <input type="file" name="file" id="file" accept="image/*" onchange="showPreview(event)" value="<?= $data['profpict'] ?>">
                    <img src="img/<?= $data['profpict'] ?>" alt="your picture" id="img" style="opacity: 1; display: block">
                </div>
                <input type="email" name="email" required placeholder="Email" value="<?= $data['email'] ?>">
                <input type="text" name="username" required placeholder="username" value="<?= $data['username'] ?>">
                <input type="password" name="password"  placeholder="New Password">
                <input type="hidden" value="<?= $data['id_account'] ?>" name="id_account">
                <input type="hidden" value="<?= $data['profpict'] ?>" name="imgcomparison">
                <button type="submit" style="width: 30%;">Update profile</button>
                
            </form>
        </div>
    </div>
    




    <script src="script.js"></script>
</body>
</html>