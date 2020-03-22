<?php
    require "header.php";
?>

<main>
    <div class="signup--bg">
        <div class="signup--flex">
            <div class="signup--container">
                <h4><span>< </span>SIGN UP<span> /></span></h4>
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "emptyfields"){
                            echo '<p class="error-field">Fill Out The Empty Fields</p>';
                        }
                        else if($_GET['error'] == "invalidmailusername"){
                            echo '<p class="error-field">Invalid Email And Username</p>';
                        }
                        else if($_GET['error'] == "invalidmail"){
                            echo '<p class="error-field">Invalid Email</p>';
                        }
                        else if($_GET['error'] == "invalidusername"){
                            echo '<p class="error-field">Invalid Username</p>';
                        }
                        else if($_GET['error'] == "passwordcheck"){
                            echo '<p class="error-field">Password Not Matching</p>';
                        }  
                        else if($_GET['error'] == "usertaken"){
                            echo '<p class="error-field">Username Already Taken</p>';
                        }                        
                        else{
                            echo '<p class="error-field">Please, Try Again Later</p>';
                        }                                           
                    }
                    else if(isset($_GET['signup'])) {
                        if($_GET['signup'] == "success"){
                            echo '<p class="signup--success">Signup Successful</p>';
                        }
                        
                    }
                    
                ?>
                <form action="includes/signup.inc.php" method="post">
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
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Type your new password" >
                    <label>Confirm Password</label>
                    <input type="password" name="repeatpassword" placeholder="Repeat your new password">
                    <button type="submit" name="signup-submit">SIGN UP</button>
                </form>            
                <p>Already have an account? </p>
                <a href="login.php">LOGIN</a>
            </div>
        </div>
    </div>    
</main>

<?php
    require "footer.php";
?>