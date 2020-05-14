<?php
    require "alt-navbar.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="main--event--section">
        <h2>BLOG POSTS</h2>

        <div class="post--card">
            <div class="post--image--bg">
            </div>
            
            <?php
            $result = mysqli_query($conn, 'SELECT * FROM blogs WHERE postID='.$_GET['postID']);
            while($row = $result->fetch_assoc()){
                echo '<div class="post--details">';
                echo '<h3>'.$row["postTitle"].'</h3>';
                echo '<img src="assets/icons/comment.png">';
                echo '<span>'.$row["postAuthor"].'</span>';
                echo ' <img src="assets/icons/calendar.png">';
                echo '<span>'.$row["postDate"].'</span>';
                echo '<p>'.$row["postContent"].'</p>';
            }
            
            ?>
            </div>      
        </div>

    </div>
</main>