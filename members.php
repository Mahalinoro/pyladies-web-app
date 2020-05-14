<?php
    require "sidebaradmindashboard.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="user-profile--main-content">
        <div class="user-profile--header">
            <h2>Members Overview</h2>
        </div>  

        <div class="admin-info--flex">
            <div class="admin-info--content">
                <div class="admin-info--applicant-table expand">
                    <div class="admin-text--header">
                        <h5>List Of Members</h5>
                    </div>

                    <div class="admin-text--content">
                        <table>
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Fist Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Date of Birth</th>
                                    <th>Email Address</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, 'SELECT * FROM users');
                                $index = 1;
                                // if(($row = mysqli_fetch_assoc($result))){
                                    while($row = $result->fetch_assoc()){
                                        $userid = $row['userID'];
                                        echo "<tr>";
                                        echo "<td>".$index."</td>";
                                        echo "<td>".$row['firstName']."</td>";
                                        echo "<td>".$row['lastName']."</td>";
                                        echo "<td>".$row['userName']."</td>";
                                        echo "<td>".$row['dateOfBirth']."</td>";
                                        echo "<td>".$row['emailAddress']."</td>";
                                        echo "<td><a>Update</a></td>";
                                        echo '<td><a href="includes/admin.remove.user.inc.php?userID='.$userid.'">Remove</button></a>';
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
</main>