<?php
    include "header.php";
?>

<main>
    <div class="login--bg">
        <div class="login--flex">
            <div class="login--container">
                <h4><span>< </span>LOGIN<span> /></span></h4>
                <form action="includes/login.inc.php" method="post">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Type your username">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Type your password" >
                    <button type="submit" name="login-submit">LOGIN</button>
                </form>            
                <p>Not a member yet? </p>
                <a href="signup.php">SIGN UP</a>
            </div>
        </div>
    </div>    
</main>

<?php
    include "footer.php";
?>