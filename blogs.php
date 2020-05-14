<?php
    require "alt-navbar.php";
    require "includes/dbh.inc.php"
?>

<main>
<div class="main--event--section">
        <h2>BLOG POSTS</h2>

        <?php
            $result = mysqli_query($conn, 'SELECT * FROM blogs');
            while($row = $result->fetch_assoc()){
                echo '<div class="event--card-details">';
                echo '<div class="event--image">';
                echo '<img src="data:image/jpg;base64,'.base64_encode($row["postImage"]).'">';
                echo '</div>';
                echo '<div class="event--information">
                <ul>
                    <li>
                        <img src="assets/icons/calendar.png">';
                echo '<span>'.$row["postDate"].'</span>';
                echo '</li>
                <li>
                    <img src="assets/icons/comment.png">';
                echo '<span>'.$row["postAuthor"].'</span>';
                echo '</li>
                </ul>';
                echo  '<h4>'.$row["postTitle"].'</h4>';
                echo  '<p>'.$row["postDescription"].'</p>';
                echo '<a href="blogs.post.php?postID='.$row["postID"].'">READ MORE</a>';
                echo '</div>

                </div>';
            }        
        ?>    
    </div>

    <div>

    </div>
</main>