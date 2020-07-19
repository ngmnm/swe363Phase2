<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signUp.css">
</head>

<body>
    <div class="main">
        <div class="container">


            <h2>Getting Started with KFUPM Collection </h2>
            <form id="signUp" class="inputGroup1" action="signup.php" method="POST">

                <input type="text" placeholder="Username" class="input-field" name="username" required>
                <input type="text" placeholder="Email" class="input-field" name="email" required>
                <input type="password" placeholder="Password" class="input-field" name="pwd" required>
                <input type="password" placeholder="Repeat Password" class="input-field" name="re-pwd" required>

                <button type="submit" class="submitBtn" name="signup">Sign Up</button>
                <?php
                
                if (isset($_GET['error'])) {
                    
                    if ($_GET['error'] == 'invalidmailusername') {
                        echo "<br><p class='errormsg' >Invalid username and email</p> ";
                    } 
                    
                    else  if ($_GET['error'] == 'invalidmail') {
                        echo "<br><p class='errormsg' >Invalid Email</p> ";
                    } 
                    
                    else  if ($_GET['error'] == 'invalidusername') {
                        echo "<br><p class='errormsg' >Invalid Username</p> ";
                    } 
                    
                    else  if ($_GET['error'] == 'passwordcheck') {
                        echo "<br><p class='errormsg' >Passwords don't match</p> ";
                    } 
                    else  if ($_GET['error'] == 'accountexist') {
                        echo "<br><p class='errormsg' >Email is already exist</p> ";
                    }
                }

                ?>
            </form>

        </div>

    </div>

</body>

</html>