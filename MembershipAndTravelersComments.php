<?php
    ob_start();
    require_once 'mysqli.php';
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Membership and Traveler Comments</title>
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
            $error = array();

            if( isset($_POST['username']) && isset($_POST['password']) ){
                $username = $_POST['username'];
                $password = $_POST['password'];

                if(count($error) == 0){
                    $result = mysqliQuery("SELECT * FROM accounts WHERE username = '$username' AND password = '$password'");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $time = time() + (86400);
                        setcookie("username", $row['first_name'] . " " . $row['last_name'] , $time , "/");
                        header("Refresh:0");
                    } else {
                        $error['login'] = TRUE;
                    }
                }
            }
        ?>
            <!-- Start of header -->
            <center>
                <h1><u>Our Mission</u></h1>
            </center>
            <!-- End of header -->

            <!-- Start of Mission Statement -->
            <p>We will strive to understand our client and guest needs by listening to their requirements and responding in a competent, accurate and timely fashion. We will design and deliver our services and products to address their needs. In fact, we are committed to exceeding their expectations by surprising them with our ability to anticipate and fulfill their wishes. We will be an innovative leader in the hotel industry and will continually improve products and services.</p>
            <!-- End of Mission Statement -->

            <!-- Member header -->
            <center>
                <h1><u>Members and New Members</u></h1>
            </center>
            <!-- End of Member header -->
            <?php 
                if(!isset($_COOKIE['username'])){
                 ?>
            <!-- Start of Login -->
            <form method="post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                <center>
                    <br>
                    Username:
                    <input name ="username"type="text" placeholder="Username" />
                    <br> 
                    Password:
                    <input name ="password" type="password" placeholder="Password" />
                    <br>
                    <input type="submit" value="Login">
                    <br>
                    <br>
                    <?php if(isset($error['login'])){ echo "Login Unsuccessful";}?>
                </center>
            </form>
            <!-- End of Login -->

            <!-- Start of Link for new members -->
            <center>
                <br><a href="Register.php">Not a Member? Click here to join now!</a>
            </center>
            <?php } else {
                echo $_COOKIE['username'] . " is Logged in. <br>";
            } ?>
            <!-- End of Link for new members -->

            <!-- Header for Survey -->
            <center>
                <h1>Survey:</h1>
            </center>
            <!-- End of header for survey -->

            <!-- Start of Survey -->
            <center>
                <form>
                    <input type="checkbox" />Excellent
                    <br>
                    <input type="checkbox" />Great
                    <br>
                    <input type="checkbox" />Good
                    <br>
                    <input type="checkbox" />Average
                    <br>
                    <input type="checkbox" />Bad
                    <br> Rating:
                    <input type="range" name="Rating" min="0" max="5" />
                    <br>
                    <textarea rows="10" cols="30">More Suggestions? Please add here.</textarea>
                    <br>
                    <input type="submit" value="Submit" />
                </form>
            </center>
            <!-- End of Survery -->

            <!-- Go to Top Link -->
            <center>
                <a href="#">
                    <br>Go to Top</a>
        </div>
        </center>

</body>

<!-- Body -->

<iframe class="footer" src=".\footer.php" frameborder="0"></iframe>

</html>
