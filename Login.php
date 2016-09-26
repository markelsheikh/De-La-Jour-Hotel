<?php
    require_once 'mysqli.php';
    $error = array();

    if( isset($_POST['username']) && isset($_POST['password']) ){
                
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(count($error) == 0){
            $result = mysqliQuery("SELECT * FROM accounts WHERE username = '$username' AND password = '$password'");
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo $row["first_name"]. " " . $row["last_name"]. "<br>";

                $time = time() + (86400);
                setcookie("username", $username, $time , "/");
                setcookie("first_name", $first_name, $time, "/");
                setcookie("last_name", $first_name, $time, "/");
            } else {
                $error['login'] = TRUE;
            }

        }
    }
 ?>