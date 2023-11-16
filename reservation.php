<?php 
require_once('db.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="styleres.css">
    <title>Booking</title>
</head>

    <nav>
        <div class="navlogo">
            <a href="#">
                <img src="logo.jpg">
            </a>
        </div>

        <ul class="navbar">
            <li class="link"><a href="index.html">Home</a></li>
            <li id="link1" class="link"><a href="book.html">Booking</a></li>
            <li id="link2" class="link"><a href="#">Gallery</a></li>
            <li id="link3" class="link"><a href="about.html">About</a></li>
            <li id="link5" class="link"><a href="contact.html">Contact</a></li>
        </ul> 
        </ul> 
        </ul> 
        </ul>
    </nav>

<header class="container">
    <div class="content">
        <span class="blur"></span>
        <span class="blur"></span>
        <h4>SELECT DATE AND TIME</h4>
        <H1>MUCHROOM HOTEL</H1>
        <p>
           
        </p>
    </div>
</header>
          

      

    <div class="main-background">
        <div class="main-text">
            <h2> </h2>
            <h1>   </h1>
        </div>
        
    </div>
    <!--background image ended-->


    

    

    

<body>
    <div class="book-section">
        <div class="inner-book">
            <input type="date" name="checkin" >
            <input type="date" name="checkout">
            <select name="chooseroom" style="">
						<?php
						//select USERGROUP_ID, USERGROUP_NAME from USERGROUP
						$q3 = 'select type_name from room_type;';
						if ($result = $mysqli->query($q3)) {
							while ($row = $result->fetch_array()) {
								echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
							}
						} else {
							echo 'Query error: ' . $mysqli->error;
						}
						?>
					</select>
            <input type="text" name="person" placeholder="1 Person">
            <?php
            $checkin = stripslashes($_REQUEST['checkin']);
            //escapes special characters in a string
            $checkin = mysqli_real_escape_string($con, $checkin);
            $checkout   = stripslashes($_REQUEST['checkout']);
            $checkout   = mysqli_real_escape_string($con, $checkout);
            $roomtype    = stripslashes($_REQUEST['chooseroom']);
            $roomtype    = mysqli_real_escape_string($con, $roomtype);
            		$query    = "INSERT into `reservation` (Check-in-date,Check-out-date,type_name)
                     VALUES ('$checkin','$checkout','$roomtype')";
            		$result   = mysqli_query($con, $query);
					
					?>
            <div class="book-btn">
                <a href="bookcon.php">book now</a>
            </div>

        </div>
    </div>
</body> 
</html>
