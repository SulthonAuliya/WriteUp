<?php 
        session_start();
        include "connection/connection.php";

        $query = "SELECT * FROM account WHERE id_account = '$_GET[id]'";

        $user = mysqli_query($db_connection, $query);

        $data = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png">
</head>
<body>

    <<!-- navbar -->
    <div class="navbar">
        <div class="left">
            <a href="index.php">WriteUp</a>
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

    <div class="profile-page">
        <div class="cards">
            <div class="header">
            <?php if(!isset($_SESSION['login'])) {?>
            <?php } else {
                    if($_SESSION['id_account'] == $_GET['id']){ ?>
                        <div class="prof-button">
                            <ul>
                                <li><a href="profile_settings.php" class="edit-profile">Profile Settings</a></li>
                                <li><a href="report.php" class="report-profile">Post Report</a></li>
                            </ul>
                        </div>
            <?php   }
                  } ?>
                <div class="prof">
                    <div class="profile">
                        <img src='img/<?= $data['profpict'] ?>' alt="">
                    </div>
                </div>
                <div class="username">
                    <h1><?= $data['username'] ?></h1>
                </div>
                
            </div>
        </div>
                
            <div class="row" id="post">
                <?php
                    $query = "SELECT * FROM post where id_account = '$_GET[id]'";
                    $post = mysqli_query($db_connection, $query);

                    foreach ($post as $posts) : 
                ?>   
                <div class="column" id="post"> 
                    <?php if(!isset($_SESSION['login'])) {?>
                    <?php }else if($_SESSION['id_account'] == $_GET['id']){ ?>
                        <div class="menu">
                            <button class="dropbtn" onclick="option(<?= $posts['id_post'] ?>)"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png"/></button>
                        </div>
                    <?php } ?>
                    <a href="detail_page.php?id=<?= $posts['id_post'] ?>">
                        <div class="card">           
                            
                            <div class="img">
                                <img src='img/<?php echo $posts['image'] ?>' alt="<?php echo $posts['image'] ?>">
                            </div>
                            <div class="profile">
                                <img src='img/<?= $data['profpict']?>' alt="">
                            </div>
                            <div class="title">
                                <h3><?php echo $posts['title'] ?></h3>
                            </div>
                            <div class="des">
                                <p><?php echo substr($posts['description'], 0, 44) ?>...</p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>    
            </div>
                
        
    </div>


    <script src="script.js"></script>              
    
</body>
</html>