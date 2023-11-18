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
        <h4> </h4>
   
        <p>
           
        </p>
    </div>
</header>
          

      

    <div class="main-background">
        <div class="main-text">
        <h1> booking </h1>
            <h2> Please select date and room type</h2>
        </div>
        
    </div>
    <!--background image ended-->


    

    

    

<body>
    <div class="book-section">
        <div class="inner-book">
            <input type="date" name="checkin" value="default">
            <input type="date" name="checkout" placeholder="Check-out">
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
            <div class="book-btn">
                <a href="confirm.php">book now</a>
            </div>

        </div>
    </div>
</body> 
</html>
