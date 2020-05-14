<?php
    session_start();
    require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>

    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap">

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js "></script>

</head>

<body class="dashboard--bg">

    <div class="dashboard-wrapper">
        <div class="dashboard--sidebar">
            <?php           
            $result = mysqli_query($conn, 'SELECT userImg FROM `profiles-img` WHERE userID ='.$_SESSION['userid']);
            if(($row = mysqli_fetch_array($result)) == 0){
                // if(empty($row)){
                //     echo '<img src="data:image/jpeg;base64,'.base64_encode($row['userImg'] ).'" height="200" width="200"/>';
                // }else{
                    echo '<img class="dashboard--user--avatar" src="assets/icons/avatar.png">'; 
                // }
            }else{
                echo '<img class="dashboard--user--avatar" src="data:image/jpg;base64,'.base64_encode($row['userImg'] ).'" height="150" width="150">';
            }
            
            ?>

            <?php
            $result = mysqli_query($conn, 'SELECT userName FROM users WHERE userID ='.$_SESSION['userid']);
            if(($row = mysqli_fetch_array($result))){
                echo '<h2><span> < </span>Welcome, '.$row['userName'].'<span> /></span></h2>';
            }
            ?>   

            <ul>
                <li><a href="index.php">
                    <img class="dashboard--icon" src="assets/icons/home.png">
                    <span>home</span>
                </a></li>
                <li><a href="profile.php">
                    <img class="dashboard--icon" src="assets/icons/user-pink.png">
                    <span>profile</span>
                </a></li>
                <li><a href="#">
                    <img class="dashboard--icon" src="assets/icons/calendar.png">
                    <span>events</span>
                </a></li>
                <li><a href="#">
                    <img class="dashboard--icon" src="assets/icons/comment.png">
                    <span>blog</span>
                </a></li>
                <li><a href="#">
                    <img class="dashboard--icon" src="assets/icons/bookmark.png">
                    <span>bookmarks</span>
                </a></li>
                <li><a href="includes/logout.inc.php">
                    <img class="dashboard--icon" src="assets/icons/logout.png">
                    <span>logout</span>
                </a></li>
            </ul>
        </div>
    </div>

</body>