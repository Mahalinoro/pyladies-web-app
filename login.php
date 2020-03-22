<?php
    require "header.php";
?>

<main>
    <div class="login--bg">
        <div class="login--flex">
            <div class="login--container">
                <h4><span>< </span>LOGIN<span> /></span></h4>
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "emptyfields"){
                            echo '<p class="error-field">Fill Out The Empty Fields</p>';
                        }
                        else if($_GET['error'] == "wrongpwd"){
                            echo '<p class="error-field">Password Not Matching With The User</p>';
                        }                        
                        else{
                            echo '<p class="error-field">Please, Try Again Later</p>';
                        }                                           
                    }
                    else if(isset($_GET['login'])) {
                        if($_GET['login'] == "success"){
                            echo '<p class="signup--success">Login Successful</p>';
                        }
                        
                    }
                    
                ?>
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
    require "footer.php";
?>