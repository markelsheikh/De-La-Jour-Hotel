<?php
    ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Room And Rates</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src = "js/main.js"></script>
</head>

<iframe class="header" src=".\header.php" frameborder="0"></iframe>

<body>
    <?php 

        if(isset($_COOKIE['username'])){
            echo "<center> Welcome " . $_COOKIE['username'] . "</center>";
        }
    ?>
    <!-- Body -->
    <br>
    <form  onsubmit="return checkInput();">
        <div class="body">

            <center>
                <h1><u>Rooms And Rates</u></h1>
            </center>

            <br>
            <br>
            <br>

            <center>
                <table style="width:100%; height:100%" border="1">
                    <!-- 1st Row -->
                    <tr>
                        <th><font size="4"><br>Room</font>
                        </th>
                        <th><font size="4"><br>Picture</font>
                        </th>
                        <th><font size="4"><br>Description</font>
                        </th>
                        <th><font size="4"><br>Price</font>
                        </th>
                        <th><font size="4"><br>Booking</font>
                        </th>
                    </tr>
                    <!-- 2nd Row -->
                    <tr>

                        <td>
                            <center><strong>Standard Room</strong>
                            </center>
                        </td>
                        <td>
                            <a href="Club Room"><img src="http://www.invernesshotel.com/images/interior/room-types/club-room.jpg" width="400" height="200" alt="Deluxe Plaza Room">
                            </a>
                        </td>
                        <td>
                            <center><strong><font size = "3">Located on our exclusive 5th floor, these larger rooms feature one queen bed, one king bed or two queen beds; raised ceilings; upgraded amenities; and private concierge services-along with access to the Mountain View Lounge.</font></strong>
                            </center>
                        </td>
                        <td>
                            <center><strong>$<script>document.write(getPrice(1)); </script>/Night</strong>
                            </center>
                        </td>
                        <td>
                            <center> <strong>Rooms:<input id = "roomOne" type="number" min = "1" max = "5" style="width:50px"/> </strong>
                            </center>
                        </td>
                    </tr>
                    <!-- 3rd Row -->
                    <tr>

                        <td>
                            <center><strong>Executive Suite</strong>
                            </center>
                        </td>
                        <td>
                            <a href="Club Room"><img src="http://www.invernesshotel.com/images/interior/room-types/club-suites.jpg" width="400" height="200" alt="Executive Suite">
                            </a>
                        </td>
                        <td>
                            <center><strong><font size = "3">In addition to exclusive Club-Level amenities-including complimentary continental breakfast and evening cocktails and appetizers in the Mountain View Lounge-these luxurious spacious New York resort suites feature private balconies and sunken living rooms.</font></strong>
                            </center>
                        </td>
                        <td>
                            <center><strong>$<script>document.write(getPrice(2)); </script>/Night</strong>
                            </center>
                        </td>
                        <td>

                            <center> <strong>Rooms:<input id = "roomTwo" type="number" min = "1" max = "5" style="width:50px"/> </strong>
                            </center>

                        </td>
                    </tr>
                    <!-- 4th Row -->
                    <tr>

                        <td>
                            <center><strong>Centennial Suite</strong>
                            </center>
                        </td>
                        <td>
                            <a href="Club Room"><img src="http://www.invernesshotel.com/images/interior/room-types/centennial.jpg" width="400" height="200" alt="Centennial Suite">
                            </a>
                        </td>
                        <td>
                            <center><strong><font size = "3">Our magnificent Centennial Suite is a premier lodging option in the Denver area. The suite features a spacious living area, dining area, small kitchen, office, separate bedroom, opulent bathroom with oversized jetted tub, raised ceilings, private balcony, numerous flat-screen televisions, a Bang &amp; Olufsen stereo, and all the enhanced amenities that come with exclusive Club Floor access.</font></strong>
                            </center>
                        </td>
                        <td>
                            <center><strong>$<script>document.write(getPrice(3)); </script>/Night</strong>
                            </center>
                        </td>
                        <td>

                            <center><strong>Rooms:<input id = "roomThree" type="number" min = "1" max = "5" style="width:50px"/> </strong>
                            </center>

                        </td>
                    </tr>
                </table>

                <h2><u>Dates</u></h2>
                <table align="center" border="1" style="width:&quot;100%&quot;;">
                    <tr>
                        <td align="right">Check In:
                            <input id="checkIn" type="date">
                        </td>

                        <td align="right">Check Out:
                            <input id="checkOut" type="date">
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <input type="submit" value="Reserve"/> <input type="reset"/>

                <div id = "error"></div>
                <br>
                <br>
                <div id = "summary"></div>
                <a href="#">
                    <br>Go to Top</a>
        </div>
    </form>
</body>

<!---footer-->

<iframe class="footer" src=".\footer.php" frameborder="0"></iframe>

</html>