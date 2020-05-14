<?php
    require "sidebaruserdashboard.php";
    require "includes/dbh.inc.php"
?>

<main>
    <div class="user-profile--main-content"> 
        <div class="user-profile--header">
            <h2>User Profile</h2>
        </div> 
        
        <div class="profile--information">
            <div class="profile--card">
                <div class="profile--card--header">
                    <h5>Photo</h5>
                    <a href="userdashboard.php">View Profile</a>
                </div>

                <div class="profile--card--content">
                    <div>
                    <?php
                        $result = mysqli_query($conn, 'SELECT userImg FROM `profiles-img` WHERE userID ='.$_SESSION['userid']);
                        if(($row = mysqli_fetch_array($result)) == 0){
                            // if(empty($row)){
                            //     echo '<img src="data:image/jpeg;base64,'.base64_encode($row['userImg'] ).'" height="200" width="200"/>';
                            // }else{
                                echo '<img class="profile--card--img" src="assets/icons/avatar.png">'; 
                            // }
                        }else{
                            echo '<img class="profile--card--img" src="data:image/jpg;base64,'.base64_encode($row['userImg'] ).'" height="150" width="150">';
                        }
                        // echo '<img class="profile--card--img" src="assets/icons/avatar.png">'; 
                    ?>
                    </div>

                    <div class="profile--card--container up">
                        <p>Choose an image from your computer</p>
                        <p class="smaller-text">Minimum Size: 150 x 150 px (*png, jpg, jpeg, ...)</p>
                        <form action="includes/profile.img.inc.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="image">
                            <button type="submit" name="upload-img" class="upload--button">Upload</button>
                            <button type="submit" name="delete-img" class="delete--button">Delete</button>
                        </form>
                    </div>
                </div>                        
            </div>                   
        </div>

        <div class="profile--flex">
            <div class="profile--information">
                <div class="profile--card smaller">
                    <div class="profile--card--header">
                        <h5>Update Personal Information</h5>
                    </div>

                    <div class="profile--card--content block">
                        <div class="profile--card--form">
                            <form action="includes/profile.update.inc.php" method="post">
                                <label>First Name</label>
                                <input type="text" name="firstname" placeholder="Type your first name">
                                <label>Last Name</label>
                                <input type="text" name="lastname" placeholder="Type your last name">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Type your new username">
                                <label>Date Of Birth</label>
                                <input type="date" name="dateofbirth">                
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Type your email address">
                                <button type="submit" name="update-info">UPDATE</button> 
                            </form>            
                        </div> 
                    </div>                           
                </div>
            </div>

            <div class="profile--information">
                <div class="profile--card smaller">
                    <div class="profile--card--header">
                        <h5>Change Password</h5>
                    </div>

                    <div class="profile--card--content block">
                        <div class="profile--card--form">
                            <form action="includes/profile.password.inc.php" method="post">
                                <label>New Password</label>
                                <input type="password" name="password" placeholder="Type your new password" >
                                <label>Confirm Password</label>
                                <input type="password" name="repeatpassword" placeholder="Repeat your new password">
                                <button type="submit" name="update-password">CHANGE PASSWORD</button> 
                            </form>            
                        </div> 
                    </div>                           
                </div>
            </div>
        </div>
    </div>
</main>


