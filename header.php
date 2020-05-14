<?php
    session_start();
    require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pyladies Antananarivo</title>

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

<header>
<div id="section-header ">
        <div class="header--bg ">
            <div class="header--container ">
                <div class="header--navbar ">

                    <div class="header--navbar--logo ">
                        <ul>
                            <li><img src="assets/icons/pyladies-logo.png "></li>
                            <li><a href="index.php">Pyladies Antananarivo</a></li>
                        </ul>
                    </div>

                    <div class="header--navbar--items ">
                        <ul>
                            <li><a href="events.php">EVENTS</a></li>
                            <li><a href="#">RESOURCES</a></li>
                            <li><a href="supportus.php">SUPPORT US</a></li>
                            <li><a href="codeofconduct.php">CODE OF CONDUCT</a></li>

                        </ul>
                    </div>

                    <div class="header--navbar--authentification ">
                        <?php
                        if(isset($_SESSION['userid'])){ 
                        
                            $result = mysqli_query($conn, 'SELECT userName FROM users WHERE userID ='.$_SESSION['userid']);
                            if(($row = mysqli_fetch_array($result))){
                                echo '<ul>';
                                echo '<li><a href="userdashboard.php">'.$row['userName'].'</a></li>';
                                echo'<li><a class="button--signup" href="includes/logout.inc.php">LOGOUT</a></li>';
                                echo '</ul>';                                
                            }          
                        }
                        else{
                            echo '
                            <ul>
                                <li><a href="login.php">LOG IN</a></li>
                                <li><a class="button--signup" href="signup.php">BECOME A MEMBER</a></li>
                            </ul>';
                        }
                        ?>                        
                    </div>

                </div>

                <div class="header--content ">
                    <div class="header--content--title ">
                        <span>WELCOME TO PYLADIES</span>
                    </div>

                    <div class="header--content--adv ">
                        <ul>
                            <li>FRIENDLY SUPPORT</li>
                            <li>-</li>
                            <li>NETWORK FOR WOMEN</li>
                            <li>-</li>
                            <li>BRIDGE TO A LARGER PYTHON WORLD</li>
                        </ul>
                    </div>

                    <div class="header--content--button ">
                        <ul>
                            <li>
                                <a class="button--content--event " href="events.php">UPCOMING MEETUPS</a>
                            </li>
                            <li>
                                <a class="button--content--event " href="blogs.php">LATEST BLOG POSTS</a>
                            </li>
                        </ul>
                    </div>

                    <div class="header--content--social ">
                        <ul>
                            <li>
                                <a href="# "><img src="assets/icons/facebook.png "></a>
                            </li>
                            <li>
                                <a href="# "><img src="assets/icons/twitter.png "></a>
                            </li>
                            <li>
                                <a href="# "><img src="assets/icons/github-image.png "></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>    

</header>