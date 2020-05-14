<?php
    require "sidebaradmindashboard.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="user-profile--main-content">
        <div class="user-profile--header">
            <h2>Overview</h2>
        </div>  

        <div class="admin-info--flex">
            <div class="admin-info--content">
                <div class="admin-info--applicant-table">
                    <div class="admin-text--header">
                        <h5>New Applications</h5>
                        <a href="#" id="addModal">Add New Admin</a>
                    </div>

                    <div class="admin-text--content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Application ID</th>
                                    <th>Full Name</th>
                                    <th>Title</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, 'SELECT * FROM `organizer-application`');
                                $index = 1;
                                $input = 0;
                                // if(($row = mysqli_fetch_assoc($result))){
                                    while($row = $result->fetch_assoc()){
                                        $userid = $row['applicationID'];

                                        echo "<tr>";
                                        echo "<td>".$index."</td>";
                                        echo "<td>".$row['fullName']."</td>";
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['phoneNumber']."</td>";
                                        echo "<td>".$row['emailAddress']."</td>";
                                        echo '<td><a href="admin.application.view.php?userID='.$userid.'">View</a></td>';
                                        echo '<td><a href="includes/admin.remove.application.inc.php?userID='.$userid.'">Remove</button></a';
                                        echo "<tr>";    

                                        $index ++;
                                        $input ++;
                                    }
                                
                                ?>
                                    
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="admin-info--request-table">
                    <div class="admin-text--header">
                        <h5>New Requests</h5>
                    </div>

                    <div class="admin-text--content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Subject</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, 'SELECT * FROM `contactus-request`');
                                $index = 1;
                                // if(($row = mysqli_fetch_assoc($result))){
                                    while($row = $result->fetch_assoc()){
                                        $requestid = $row['requestID'];
                                        echo "<tr>";
                                        echo "<td>".$index."</td>";
                                        echo "<td>".$row['fullName']."</td>";
                                        echo "<td>".$row['emailAddress']."</td>";
                                        echo "<td>".$row['subject']."</td>";
                                        echo '<td><a href="admin.request.view.php?requestID='.$requestid.'">View</button></a>';
                                        echo '<td><a href="includes/admin.remove.request.inc.php?requestID='.$requestid.'">Remove</button></a>';
                                        echo "<tr>";     
                                        
                                        $index ++;
                                    }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="admin-info--stats">
                <div class="admin-text--header">
                    <h5>Report</h5>
                </div>

                <div class="admin-info--stats-content">
                    <?php
                    $result = mysqli_query($conn, 'SELECT COUNT(userID) AS `count` FROM users');
                    if($row = mysqli_fetch_assoc(($result))){
                        echo '<p>Total Members: '.$row["count"].'</p>';
                    }
                    $result_one = mysqli_query($conn, 'SELECT COUNT(subID) AS `count` FROM `newsletters-subscription`');
                    if($row = mysqli_fetch_assoc($result_one)){
                        echo '<p>Total Newsletters: '.$row["count"].'</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="organizer--form">
            <span class="close">&times;</span>
            <form action="includes/admin.add.inc.php" method="post">
                <p>Add New Admin!</p>
                <input type="text" name="fname" placeholder="Full Name">
                <input type="text" name="username" placeholder="Username">            
                <input type="email" name="email" placeholder="Email Address"> 
                <input type="password" name="password" placeholder="New Password">                     
                <button type="submit" name="admin-add">SAVE</button> 
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("addModal");
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

