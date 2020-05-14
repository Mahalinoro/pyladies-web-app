<?php
    require "sidebaradmindashboard.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="user-profile--main-content">
        <div class="user-profile--header">
            <h2>Events Overview</h2>
        </div>  

        <div class="admin-info--flex">
            <div class="admin-info--content">
                <div class="admin-info--applicant-table expand">
                    <div class="admin-text--header">
                        <h5>List Of Events</h5>
                        <a href="#" id="addEvent">Add New Event</a>
                    </div>

                    <div class="admin-text--content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Debut</th>
                                    <th>Event End</th>
                                    <th>Event Location</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, 'SELECT * FROM events');
                                $index = 1;
                                // if(($row = mysqli_fetch_assoc($result))){
                                    while($row = $result->fetch_assoc()){
                                        $eventid = $row['eventID'];
                                        echo "<tr>";
                                        echo "<td>".$index."</td>";
                                        echo "<td>".$row['eventName']."</td>";
                                        echo "<td>".$row['eventDate']."</td>";
                                        echo "<td>".$row['eventFromTime']."</td>";
                                        echo "<td>".$row['eventToTime']."</td>";
                                        echo "<td>".$row['eventLocation']."</td>";
                                        echo '<td><a href="admin.event.view.php?eventID='.$eventid.'">View</button></a>';
                                        echo "<td><a>Update</a></td>";
                                        echo '<td><a href="includes/admin.remove.event.inc.php?eventID='.$eventid.'">Remove</button></a>';
                                        echo "<td><a>View Attendees</a></td>";
                                        echo "<tr>";     
                                        
                                        $index ++;
                                    }

                                // }
                                ?>  
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span> 
        <div class="modal--content"> 
            <img id="blah" src="assets/images/gradient.jpg">
            <form class="event--form" action="includes/admin.add.event.inc.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" onchange="readURL(this);">
                <label>Title</label>
                <input type="text" name="name">
                <label>Date</label>
                <input type="date" name="date">
                <label>Time</label>
                <span>From</span><input type="time" name="fromTime">
                <span>To</span><input type="time" name="toTime">
                <label>Location</label>
                <input type="text" name="location">
                <label>Description</label>
                <textarea name="description"></textarea>
                <button type="submit" name="add-event">PUBLISH EVENT</button>
            </form>      
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("addEvent");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
        modal.style.display = "block";
        }

        span.onclick = function() {
        modal.style.display = "none";
        }

        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            }
        }
    </script>
    
</main>