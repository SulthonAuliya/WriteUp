<?php 
            session_start();
            if(!isset($_SESSION['login'])){
                echo "<script> alert ('Please login first!'); window.location.replace('index.php');</script>";
            }

            $id = $_GET['id'];
            if($id != null){
                $link = 'profile.php?id='.$_GET['id'];
            }else{
                $link = 'index.php'; 
            }
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
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="left">
            <a href='<?=  $link ?>'>< Back</a>
        </div>
        
        <ul>
            <li><a  href="index.php">Home</a></li>
        </ul>
    </div>
    <!-- end of navbar -->


    <div class="addPage">
        <div class="card">
            <H1>Post Your Story Now!</H1>
            <form method="POST" action="controller/create_post.php" enctype='multipart/form-data'>
                <div class="img-dec">
                    <label for="file" >Upload Image</label>
                    <input type="file" name="file" id="file" accept="image/*" onchange="showPreview(event)" required>
                    <img src="" alt="your picture" id="img" style="opacity: 0; display: block">
                </div>
                <input type="text" name="title" required placeholder="Title">
                <textarea type="text" name="description" required placeholder="Description..." rows="15"></textarea>
                <button type="submit" >Upload Now!</button>
            </form>
        </div>
    </div>
    
    



    <script src="script.js"></script>
</body>
</html>