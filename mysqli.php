<?php
    
function connectMysqli(){
    $servername = "fdb6.biz.nf";
    $username = "1997069_database";
    $password = "elsheikh1";
    $dbname = "1997069_database";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function mysqliQuery($query){
    $conn = connectMysqli();
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn); 
    return $result;
}

/*
$result = mysqliQuery("SELECT * FROM accounts");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
    }
} else {
    echo "0 results";
}

$result = mysqliQuery("INSERT INTO `accounts` (`username`, `password`, `first_name`, `last_name`, `email`) VALUES ('asdaasds', 'asdasd', 'asdkas', 'asdasdas', 'dsadad')");

if($result){
    echo "INSERTED";
}

*/

?>
