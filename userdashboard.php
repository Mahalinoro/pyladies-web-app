<?php
    require "sidebaruserdashboard.php"
?>

<main>
    <div class="user-profile--main-content"> 
        <div class="user-profile--header">
            <h2>User Information Details</h2>
        </div> 
        
        <div class="user-profile--information">
            <div class="user-profile--information--subflex">
                <div class="user-profile--card">
                    <div class="user-profile--card--header">
                        <h5>Profile</h5>
                        <a href="profile.php">Update Information</a>
                    </div>

                    <div class="user-profile--card--content">
                        <div>
                            <?php
                                $result = mysqli_query($conn, 'SELECT userImg FROM `profiles-img` WHERE userID ='.$_SESSION['userid']);
                                if(($row = mysqli_fetch_array($result)) == 0){
                                    // if(empty($row)){
                                    //     echo '<img src="data:image/jpeg;base64,'.base64_encode($row['userImg'] ).'" height="200" width="200"/>';
                                    // }else{
                                        echo '<img class="user-profile--card--img" src="assets/icons/avatar.png"> '; 
                                    // }
                                }else{
                                    echo '<img class="user-profile--card--img" src="data:image/jpg;base64,'.base64_encode($row['userImg'] ).'" height="150" width="150">';
                                }
                                
                            ?>
                        </div>

                        <div class="user-profile--card--container">
                            <?php
                            $result = mysqli_query($conn, 'SELECT * FROM users WHERE userID ='.$_SESSION['userid']);
                            if(($row = mysqli_fetch_assoc($result))){
                                echo '<p><span>First Name:</span> ' .$row['firstName'].'</p>';
                                echo '<p><span>Last Name:</span>  '.$row['lastName'].'</p>';
                                echo '<p><span>Username:</span>  '.$row['userName'].'</p>';
                                echo '<p><span>Date Of Birth:</span>  '.$row['dateOfBirth'].'</p>';
                                echo '<p><span>Email Address:</span>  '.$row['emailAddress'].'</p>';
                            }                            
                            ?>
                        </div>
                    </div>                        
                </div>

                <div class="user-profile--card--second">
                    <div class="user-profile--card--header">
                        <h5>Latest Events</h5>
                        <a href="#">Attend Event</a>
                    </div>

                    <div class="user-profile--card--content">
                        <div>
                            
                        </div>

                        <div class="user-profile--card--container">
                            
                        </div>
                    </div>                        
                </div>
            </div>

            <div class="user-profile--card--social-media">
                <div class="user-profile--card--header">
                    <h5>Latest Tweets</h5>
                    <a href="https://twitter.com/PyladiesTNR" target="_blank">Follow</a>
                </div>

                <div class="user-profile--card--content">
                    <div class="user-profile--card--container">
                    <a class="twitter-timeline" data-width="420" data-height="550" data-theme="light" href="https://twitter.com/mahalinoro_raz/lists/pyladies-global?ref_src=twsrc%5Etfw"></a> 
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>          
                    </div>
                </div>                        
            </div>

        </div>
    </div>
</main>