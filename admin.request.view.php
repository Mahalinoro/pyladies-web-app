<?php
    require "includes/dbh.inc.php"
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

<div class="application--card">
    <?php
        $result = mysqli_query($conn, 'SELECT * FROM `contactus-request` WHERE requestID='.$_GET['requestID']);
        // if(($row = mysqli_fetch_assoc($result))){
            while($row = $result->fetch_assoc()){            
                echo '<div class="view--content">';
                echo '<h5>Full Name</h5>';
                echo '<p>'.$row['fullName'].'</p>';
                echo '<h5>Email Address</h5>';
                echo '<p>'.$row['emailAddress'].'</p>';
                echo '<h5>Subject</h5>';
                echo '<p>'.$row['subject'].'</p>';
                echo '<h5>Message</h5>';
                echo '<p>'.$row['message'].'</p>';
                echo '</div>
                </div>';
            }
        
        ?>
    </div>

</body>