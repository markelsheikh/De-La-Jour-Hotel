<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<iframe class="header" src=".\header.php" frameborder="0"></iframe>

<body>
<!-- Body -->
<br>
<br>
<center>
    <div class="body">
        <?php
            require_once 'mysqli.php';
            $error = array();

            if( isset($_POST['username']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['retype_password'])){
                
                $username = $_POST['username'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone_number = $_POST['phone_number'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $retype_password = $_POST['retype_password'];

                $usernameRegEx = "/[a-z0-9]{3,13}([0-9]{3})$/";
                $nameRegEx =  "/^[a-zA-Z]+$/";
                $phoneNumberRegEx =  "/(^\(?)(\d){3}(\)?)[\s-]?(\d){3}[\s-]?(\d){4}/";
                $emailRegEx = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.(com|edu|gov))$/";
                $passwordRegEx =  "/^[a-zA-Z0-9 _]{1,12}$/";
                

                if(!preg_match($usernameRegEx , $username)){
                    $error['username'] = TRUE;
                }
                if(!preg_match($nameRegEx , $first_name)){
                    $error['first_name'] = TRUE;
                }
                if(!preg_match($nameRegEx , $last_name)){
                    $error['last_name'] = TRUE;
                }
                if(!preg_match($phoneNumberRegEx , $phone_number)){
                    $error['phone_number'] = TRUE;
                }
                if(!preg_match($emailRegEx , $email)){
                    $error['email'] = TRUE;
                }
                if(!preg_match($passwordRegEx , $password)){
                    $error['password'] = TRUE;
                }
                if(!preg_match($passwordRegEx , $retype_password)){
                    $error['retype_password'] = TRUE;
                }
                if($password != $retype_password){
                    $error['password_match'] = TRUE;
                }

                if(count($error) == 0){
                    $result = mysqliQuery("INSERT INTO `accounts` (`username`, `password`, `first_name`, `last_name`, `phone_number`, `email`) VALUES ('$username', '$password', '$first_name', '$last_name', '$phone_number', '$email')");

                    if($result){
                        echo "Registration Sucessful";
                        return;
                    }
                }
            }
        ?>
            <!-- Start of Register -->

        <form method="post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <center>
                Username:
                <br>
                <input name = "username" type="text" placeholder="Username" required/> <?php if($error['username'] == TRUE) { echo "*"; }?>
                <br>
                First Name:
                <br>
                <input name = "first_name" type="text" placeholder="First Name" required/> <?php if($error['first_name'] == TRUE) { echo "*"; }?>
                <br>
                Last Name:
                <br>
                <input name ="last_name" type="text" placeholder="Last Name" required/> <?php if($error['last_name'] == TRUE) { echo "*"; }?>
                <br>
                Phone Number:
                <br>
                <input name = "phone_number" type="tel" placeholder="Phone Number" required/> <?php if($error['phone_number'] == TRUE) { echo "*"; }?>
                <br>
                Email:
                <br>
                <input name="email" type="email" placeholder="Email" required/> <?php if($error['email'] == TRUE) { echo "*"; }?>
                <br>
                Password:
                <br>
                <input name ="password" type="password" placeholder="Password"  required/> <?php if($error['password'] == TRUE) { echo "*"; }?>
                <br>
                Retype Password:
                <br>
                <input name ="retype_password" type="password" placeholder="Retype Password" required/> <?php if($error['retype_password'] == TRUE) { echo "*"; }?>
                <br>
                <br>
                <?php 
                    if($error['password_match'] == TRUE) { 
                          echo "<br>Password doesn't match, please try again<br>"; 
                    }
                    if($error['username'] == TRUE) { 
                          echo "<br>Username error, username is either taken or doesn't use the proper requirements for creation, please try again<br>"; 
                    }
                    if($error['first_name'] == TRUE) { 
                          echo "<br>Invalid first name, please try again<br>"; 
                    }
                    if($error['last_name'] == TRUE) { 
                          echo "<br>Invalid last name, please try again<br>"; 
                    }
                    if($error['email'] == TRUE) { 
                          echo "<br>Invalid email, please try again<br>"; 
                    }
                    if($error['phone_number'] == TRUE) { 
                          echo "<br>Invalid Phone number, please try again<br>"; 
                    }
                    if($error['password'] == TRUE) { 
                          echo "<br>Invalid password, please try again<br>"; 
                    }
                    if($error['retype_password'] == TRUE) { 
                          echo "<br>Invalid password for 'retyped password' field<br>"; 
                    }


                      
                ?>

            </center>
                <input type="submit" value ="Register"/>
                <input type="reset" value="Reset"/>
        </form>
        <!-- End of Register -->
    </div>
</center>

</body>

<!-- Body -->

<iframe class="footer" src=".\footer.php" frameborder="0"></iframe>

</html>
