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
            <form id="login" method="post">    
                <label><b>User Name</b></label>    
                <input type="text" name="Uname" placeholder="Username">    
                <br><br>    
                <label><b>Password</b></label>    
                <input type="Password" name="Pass" placeholder="Password">    
                <br><br>    
                <input type="submit" name="submit" placeholder="Submit">       
                <br><br>    
                <input type="checkbox" id="check">    
                <span>Remember me</span>    
                <br><br>    
                <a href="https://raspberrypimakerspace.ca/contact.html">Forgot Password</a>    
            </form>     
  
        <?php
	    
	    $msg = '';
	    if (isset($_POST["submit"]) && !empty($_POST["Uname"]) && !empty($_POST["Pass"])) {
				
               if ($_POST['Uname'] == 'tutorialspoint' && $_POST['Pass'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  $msg = 'You have entered valid use name and password';
               }
            else {
                  $msg = 'Wrong username or password';
               }
            }
	echo $msg;
        ?>
	</div>    
    </body>    
</html>    
