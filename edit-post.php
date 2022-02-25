<?php 
        session_start();
        if(!isset($_SESSION['login'])){
            echo "<script> alert ('Please login first!'); window.location.replace('index.php');</script>";
        }
        include "connection/connection.php";

        $query = "SELECT * FROM post WHERE id_post = '$_GET[id]'";

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
            <a href="profile.php?id=1"> < Back</a>
        </div>
        <div class="search">
            <input type="text" placeholder="Look for artist, title, tag">
        </div>
        <ul>
            <li><a  href="index.php">Home</a></li>
        </ul>
    </div>
    <!-- end of navbar -->


    <div class="addPage">
        <div class="card">
            <H1>Post Your Story Now!</H1>
            <form method="POST" action="controller/update_post.php" enctype='multipart/form-data'>
                <div class="img-dec">
                    <label for="file" >Upload Image</label>
                    <input type="file" name="file" id="file" accept="image/*" onchange="showPreview(event)" value="<?= $data['image'] ?>">
                    <img src="img/<?= $data['image'] ?>" alt="your picture" id="img" style="opacity: 1; display: block">
                </div>
                <input type="text" name="title" required placeholder="Title" value="<?= $data['title'] ?>">
                <textarea type="text" name="description" required placeholder="Description..." rows="15"><?= $data['description'] ?></textarea>
                <input type="hidden" value="<?= $data['id_post'] ?>" name="id_post">
                <input type="hidden" value="<?= $data['image'] ?>" name="imgcomparison">
                <button type="submit" style="width: 30%;">Upload Now!</button>
                
            </form>
            <button style="width: 30%; background-color: red;" onclick="deletes(<?= $data['id_post'] ?>)">Delete Post!</button>
        </div>
    </div>
    




    <script src="script.js"></script>
</body>
</html>