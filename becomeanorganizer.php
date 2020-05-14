<?php
    session_start();
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

<body class="organizer--background">
    <div>
        <div class="organizer--form">
            <form action="includes/organizer.inc.php" method="post">
                <p>Personal Information</p>
                <input type="text" name="fname" placeholder="Your Full Name">
                <input type="text" name="title" placeholder="Your Title">  
                <input type="text" name="pnumber" placeholder="Your Phone Number">              
                <input type="email" name="email" placeholder="Your Email Address">
                <p>Motivation and Skills</p>
                <label>Why are you interested to become an organizer?</label>
                <textarea name='interest'></textarea>
                <label>What kind of skills you have and why do you think these will contribute to the community?</label>
                <textarea name='skills'></textarea>
                <input type="checkbox" id="true" name="true" value="identity">
                <label id="closer" for="true">I hereby certify that all above information is true and complete</label></br>
                <input type="checkbox" id="codeofconduct" name="codeofconduct" value="code">
                <label id="closer" for="codeofconduct">I agree to <a href="codeofconduct.php">Pyladies Code of Conduct</a></label></br>             
                
                <button type="submit" name="organizer-info">SUBMIT</button> 
            </form>
        </div>
    </div>

</body>