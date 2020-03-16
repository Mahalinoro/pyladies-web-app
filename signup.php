<?php
    include "header.php";
?>

<main>
    <div class="signup--bg">
        <div class="signup--flex">
            <div class="signup--container">
                <h4><span>< </span>SIGN UP<span> /></span></h4>
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
                    <button type="submit" name="signup-submit">LOGIN</button>
                </form>            
                <p>Already have an account? </p>
                <a href="login.php">LOGIN</a>
            </div>
        </div>
    </div>    
</main>

<?php
    include "footer.php";
?>