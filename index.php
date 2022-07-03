<?php 

include 'connection/connection.php';

session_start();
if (!isset($_SESSION['id_account'])){
    session_destroy();
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
    <link rel="icon" href="img/logo.png">
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="left">
            <a href="index.php">WriteUp Sulthon</a>
        </div>
        <div class="search">
            <form >
                <input type="text" name="search" placeholder="Look for title">
            </form>
        </div>
        <ul>
        <?php if(!isset($_SESSION['login'])){ ?>
            <li><a  onclick="modLog();">Login</a></li>
            <li><a onclick="modReg()">Register</a></li>
        <?php } else{?>
            <li><a href="add-page.php">Post ur writes!</a></li>
            <li><a href="profile.php?id=<?= $_SESSION['id_account'] ?>">My Account</a></li>
            <li><a href="controller/logout.php">Logout</a></li>
        <?php } ?>
        </ul>
    </div>
    <!-- end of navbar -->


    <!-- card login-->
    <div class="mod-log" id="login">
        <div class="card zoom">
            <h1>Login</h1>
            <form action="controller/login.php" method="post">
                <input type="text" placeholder="Username or email" required id="usernamel" name="username">
                <input type="password" placeholder="Password" required id="passwordl" name="password">
                <button type="submit" class="cardbutton">Login</button>
            </form>
        </div>
    </div>

    <!-- card register -->
    <div class="mod-log" id="register">
        <div class="card zoom">
            <h1>Register</h1>
            <form action="controller/register.php" method="post">
                <input type="email" placeholder="Email" required name="mailr" id="mail">
                <input type="text" placeholder="Username" required name="usernamer" id="usernamer">
                <input type="password" placeholder="Password" required name="passwordr" id="passwordr">
                <button type="submit" class="cardbutton">Register</button>
            </form>
        </div>
    </div>


    <!-- posting section -->
    <div class="post-section">
    
        <div class="row" id="post">
        <?php
            include 'connection/connection.php';
            if(!isset($_GET['search'])){
                $query = "SELECT * FROM post as p, account as a where p.id_account = a.id_account";
            } else{
                $query = "SELECT * FROM post as p, account as a where p.id_account = a.id_account AND p.title LIKE '%$_GET[search]%'";
            }
            $post = mysqli_query($db_connection, $query);

            $i = 1;
            foreach ($post as $data) : 
        ?>   
        <div class="column" id="post"> 
            <a href="detail_page.php?id=<?= $data['id_post'] ?>">
                <div class="card">           
                        
                    <div class="img">
                        <img src='img/<?php echo $data['image'] ?>' alt="<?php echo $posts['image'] ?>">
                    </div>
                    <div class="profile">
                        <img src='img/<?= $data['profpict']  ?>' alt="">
                    </div>
                    <div class="title">
                        <h3><?php echo $data['title'] ?></h3>
                    </div>
                    <div class="des">
                        <p><?php echo substr($data['description'], 0, 44) ?>...</p>
                    </div>
                </div>
            </a>
        </div>
         <?php endforeach ?>    
        </div>
        
    </div>
    



    <!-- floating button -->


    <script src="script.js"></script>

        
</body>
</html>
