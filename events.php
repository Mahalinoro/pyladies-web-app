<?php
    require "alt-navbar.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="main--event--section">
        <h2>EVENTS</h2>

        <?php
            $result = mysqli_query($conn, 'SELECT * FROM events');
            while($row = $result->fetch_assoc()){
                echo '<div class="event--card-details">';
                echo '<div class="event--image">';
                echo '<img src="data:image/jpg;base64,'.base64_encode($row["eventImage"]).'">';
                echo '</div>';
                echo '<div class="event--information">
                <ul>
                    <li>
                        <img src="assets/icons/calendar.png">';
                echo '<span>'.$row["eventDate"].'</span>';
                echo '</li>
                <li>
                    <img src="assets/icons/clock.png">';
                echo '<span>'.$row["eventFromTime"].' - '.$row["eventToTime"].'</span>';
                echo '</li>
                <li>
                    <img src="assets/icons/seo-and-web.png">';
                echo '<span>'.$row["eventLocation"].'</span>';
                echo '</li>
                </ul>';
                echo  '<h4>'.$row["eventName"].'</h4>';
                echo  '<p>'.$row["eventDescription"].'</p>';
                echo '<a href="event.registration.php">REGISTER</a>';
                echo '</div>

                </div>';
            }        
        ?>       

    </div>

</main>
