<?php ?>
<!DOCTYPE html>    
    <html>    
    <head>    
        <title>Login Form</title>    
        <link rel="stylesheet" type="text/css" href="TestingStyle.css">    
    </head>    
    <body>    
        <h2>Login Page</h2><br>    
        <div class="login">    
            <form id="login" method="post" action="login.php">    
                <label><b>User Name</b></label>    
                <input type="text" name="Uname" placeholder="Username">    
                <br><br>    
                <label><b>Password</b></label>    
                <input type="Password" name="Pass" placeholder="Password">    
                <br><br>    
                <input type="button" name="login" value="Log In Here">       
                <br><br>    
                <input type="checkbox" id="check">    
                <span>Remember me</span>    
                <br><br>    
                Forgot <a href="#">Password</a>    
            </form>     
        </div>    
        <?php
            echo 'in php';
            if (isset($_POST['login']) && !empty($_POST['Uname']) && !empty($_POST['Pass'])) {
				
               if ($_POST['Uname'] == 'tutorialspoint' && $_POST['Pass'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  echo 'You have entered valid use name and password';
               }
            else {
                  echo 'Wrong username or password';
               }
            }
        ?>
    </body>    
</html>    
