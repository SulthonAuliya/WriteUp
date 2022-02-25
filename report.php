<?php 
        session_start();
        include "connection/connection.php";
        if(!isset($_SESSION['login'])){
            echo "<script> alert ('Please login first!'); window.location.replace('index.php');</script>";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="card-report">
        <h1 class="report-title"><?= $_SESSION['username'] ?>'s Post Report</h1>
        <?php 
    
        $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $year = date('Y');

        ?>
        <form>
            <p class="report-title">Choose Periode</p>
                <select name="month" style="width: 150px; height: 30px;" required>
                    <option value="" >Month</option>
                    <?php for($m = 1; $m <= 12; $m++){ ?>
                        <?php if(!isset($_GET['month'])) { ?>
                            <option value="<?= $m ?>"><?= $month[$m-1] ?></option>
                        <?php } else { ?>
                            <option value="<?= $m ?>" <?= ($m==$_GET['month'])?'selected':'' ?>><?= $month[$m-1] ?></option>
                    <?php }} ?>
                </select>

                <select name="year" required style="width: 150px; height: 30px;">
                    <option value="">Year</option>
                    <?php for($y = 0; $y <= 4; $y++){ 
                        if(!isset($_GET['year'])) { ?>
                            <option value="<?= $year-$y ?>" ><?= $year-$y ?></option>
                        <?php } else { ?>
                            <option value="<?= $year-$y ?>" <?= ($year-$y==$_GET['year'])?'selected':'' ?>><?= $year-$y ?></option>
                    <?php }} ?>
                </select>

                <input type="submit" value="View Report" class="btn-report" >
            </p>
        </form>

        <?php if(isset($_GET['year'])) {  
        
        $query = "SELECT * FROM post AS p, account AS a WHERE p.id_account = a.id_account AND p.id_account = '$_SESSION[id_account]' AND MONTH(p.created_at) = '$_GET[month]' AND YEAR(p.created_at) = '$_GET[year]'";
        $report = mysqli_query($db_connection, $query);

         
        ?>

        <h2 class="report-title">Report Periode <?= $month[$_GET['month'] - 1] ?> - <?= $_GET['year'] ?></h2>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Date Posted</th>
                    <th>Title</th> 
                    <th>Read Count</th>
                </tr>
                <?php 
                
                if(mysqli_num_rows($report) > 0) {
                    $i = 0;
                    $total = 0;
                    foreach($report as $data) :
                        $total = $total + $data['reader'];
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= date('M-d-Y, A H:i:s ', strtotime($data['created_at'])) ?></td>
                    <td><?= $data['title'] ?></td>
                    <td align="right"><?= $data['reader'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr><th colspan="4" align="right">Total Reader : <?= $total ?></th></tr>
                <?php } else { ?>
                <tr><td colspan="4"  align="center">No Record!</td></tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</body>
</html>