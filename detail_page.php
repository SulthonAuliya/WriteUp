<?php 


        session_start();


        include "connection/connection.php";

       

        $query = "SELECT * FROM post as p, account as a WHERE id_post = '$_GET[id]' AND p.id_account = a.id_account";

        $user = mysqli_query($db_connection, $query);

        $data = mysqli_fetch_assoc($user);

        $query2 = "SELECT id_likes, id_account, COUNT(*) as total FROM likes where id_post = '$_GET[id]'";
        $likes = mysqli_query($db_connection, $query2);
        $like = mysqli_fetch_assoc($likes);
        
        $query3 = "SELECT id_likes, id_account FROM likes where id_account = '$_SESSION[id_account]'";
        $liked = mysqli_query($db_connection, $query3);
        $liker = mysqli_fetch_assoc($liked);

        $reader = $data['reader']+1;
        $qUpdateRead = "UPDATE post SET reader = '$reader' WHERE id_account = '$data[id_account]' AND id_post = '$data[id_post]'";
        $read = mysqli_query($db_connection, $qUpdateRead); 

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
            <a href="index.php">WriteUp</a>
        </div>
        
        <ul>
        <?php if(!isset($_SESSION['login'])){ ?>
            <li><a  onclick="modLog();">Login</a></li>
            <li><a onclick="modReg()">Register</a></li>
        <?php } else{?>
            <li><a href="add-page.php">Post ur writes!</a></li>
            <li><a href="profile.php?id=1">My Account</a></li>
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


    <div class="detail-page">
        <div class="card">
            <div class="img">
                <img src="img/<?= $data['image']?>" alt="">
            </div>
            <div class="profile">
                <a class="prof-link" href='profile.php?id=<?= $data['id_account'] ?>'><img src='img/<?= $data['profpict']?>' alt=""></a>
            </div>
            <div class="title">
                <h3><?= $data['title']?></h3>
            </div>
            <div class="des">
                <pre><?= $data['description']?></pre>
            </div>

            <div class="likes">
                <?php if(!isset($_SESSION['login'])) { ?>
                    <img src="img/like.png" alt="" class="img">
                <?php }else{ ?>
                    
                    
                    <?php if (isset($liker['id_account']) == $_SESSION['id_account']){ ?>

                        <form action="controller/delete_like.php" method="POST">
                            <input type="hidden" name="id_post" value="<?= $data['id_post'] ?>">
                            <input type="hidden" name="id_likes" value="<?= $liker['id_likes'] ?>">
                            <input type="image" class="img" src="img/likes.png"><p><?= $like['total'] ?></p>
                        </form>   

                    <?php } else{ ?>

                        <form action="controller/create_like.php" method="POST">
                            <input type="hidden" name="id_post" value="<?= $data['id_post'] ?>">
                            <input type="hidden" name="id_account" value="<?= $_SESSION['id_account'] ?>">
                            <input type="image" class="img" src="img/like.png"><p><?= $like['total'] ?></p>
                        </form>
                        
                    <?php } ?>

                <?php } ?>
            </div>
            <hr id="hr1">
            <div class="comment-section">

                <h1><b>Comment</b></h1>
                <?php  if(!isset($_SESSION)) {}else {?>
                <form action="controller/create_comment.php" method="POST">
                    <textarea name="comment" placeholder="Comment here..." onkeyup="textAreaAdjust(this)" required></textarea>
                    <input type="hidden" value="<?= $data['id_post'] ?>" name="id_post">
                    <input type="submit">
                </form>
                <?php } ?>

                <?php 
                $queryC = "SELECT * FROM `comment` as c, post as p, account as a WHERE c.id_post = '$_GET[id]' 
                            AND c.id_account = a.id_account 
                            AND c.id_post = p.id_post";

                $datac = mysqli_query($db_connection, $queryC);
                
                foreach ($datac as $komen) : 
                ?>
                <div class="comment">
                    <div class="profiles">
                        <div class="profile-pict">
                            <a class="prof-link" href='profile.php?id=<?= $komen['id_account'] ?>'><img src='img/<?= $komen['profpict']?>' alt=""></a>
                        </div>
                        <div class="username">
                            <a href='profile.php?id=<?= $komen['id_account'] ?>'><?= $komen['username'] ?></a>
                        </div>
                    </div>
                    <div class="komentar">
                        <pre><?= $komen['comment'] ?></pre>
                        <hr id="hr2">
                    </div>
                </div>
                <?php 
                endforeach
                ?>

            </div>
        </div>
    </div>





    <script src="script.js"></script>
</body>
</html>