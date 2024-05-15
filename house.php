<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index_web.css">
    <style>
        .view-details {
            text-decoration: none;
            border-radius: 20px;
            border: none;
            padding: 4px;
            padding-left: 7px;
            padding-right: 7px;
            font-size: 19px;
            background-color: rgb(108, 201, 248);
            color: black;
           
             
        }
        .room{
    margin: 20px;
    padding: 10px;
    width: 300px;
    height: 490px;
    border: 1px solid grey;
    border-radius: 20px;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
}
        .view-details:hover{
            cursor: pointer;
            box-shadow: 2px 2px 14px rgb(45, 121, 179);
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="img/logo-removebg-preview.png" alt="">
        </div>

        <div class="home">
            <a href="homepage.php">Home</a>
            <a href="">Contact</a>
            <a href="">About us</a>
           
        </div>

        <div class="search-bar">
        <form method="POST" action="">
                <input type="text" name="search" placeholder="search city...." id="search-city">
                <button name="submit" class="search-btn-city">search</button>
            </form>
        </div>
    </nav>
    <!-- house section  -->
    <section>
        <!--  third section  -->
    <section class="third-section">
          
            <!-- PHP code to fetch and display data from the database -->
            <?php
             
            // Establishing a connection to the database
            $servername = "localhost"; // Assuming the database is hosted locally
            $username = "root"; // Replace with your MySQL username
            $password = ""; // Replace with your MySQL password
            $dbname = "rajudb"; // Replace with your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
                // Check if search term is provided by the user
                if(isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    
                    // Query to select data from your table, filtered by the search term
                    $sql = "SELECT * FROM `rajtable4` WHERE city = '$search'";
                    $result = $conn->query($sql);

                    // Check if there are any rows returned from the query
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            // Displaying the data in div format
                            echo "<div class='room'>";
                            echo "<div class='room-img'>";
                            echo "<img src='data:image/jpg;base64," . base64_encode($row["upload"]) . "' alt='Uploaded Image'>";
                            echo "</div>";
                            echo "<div class='room-details'>";
                            echo "<h3>".$row['society'] . ", " . $row['city']."</h3>"; ;
                            echo "<p>house no: ".$row['houseno']."</p>";
                            echo "<p>mobile Number: ".$row['tel']."</p>";
                            echo "<h3>".$row['rent']."/-</h3>";
                            echo '<a href="bookingpage.php?id=' . $row["id"] . '" class="view-details">View Details</a>';
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No results found for the searched city.</p>";
                    }
                } else {
                    // Default display of divs
                    $sql = "SELECT * FROM `rajtable4` LIMIT 9";
                    $result = $conn->query($sql);

                    // Check if there are any rows returned from the query
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            // Displaying the data in div format
                            echo "<div class='room'>";
                            echo "<div class='room-img'>";
                            echo "<img src='data:image/jpg;base64," . base64_encode($row["upload"]) . "' alt='Uploaded Image'>";
                            echo "</div>";
                            echo "<div class='room-details'>";
                            echo "<h3>".$row['society'] . ", " . $row['city']."</h3>"; ;
                            echo "<p>house no: ".$row['houseno']."</p>";
                            echo "<p>mobile Number: ".$row['tel']."</p>";
                            echo "<h3>".$row['rent']."/-</h3>";
                            echo '<a href="bookingpage.php?id=' . $row["id"] . '" class="view-details">View Details</a>';
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No results found.</p>";
                    }
                }
            $conn->close();
            ?> 

            <div class="room">
            <div class="room-img">
                <img src="img/r1.jpg" alt="">
            </div>
            <div class="room-details">
                <h3>Bhavani complex,Kamrej</h3>
                <p>house no: D-52</p>
                <p>mobile Number: 985452321</p>
                <h3>3000/-</h3>
                <a href="bookingpage.php?id=<?php echo $row["id"];?>">View Details</a>  
            </div>
        </div> 
        <div class="room">
            <div class="room-img">
                <img src="img/r2.jpg" alt="">

            </div>
            <div class="room-details"> 
                <h3>Sayam nagar,Kamrej</h3>
                <p>house no: A-11</p>
                <p>mobile Number: 885452321</p>
                <h3>3800/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div>  
        <div class="room">
            <div class="room-img">
                <img src="img/r3.jpg" alt="">
            </div>
            <div class="room-details"> 
                <h3>Gayatri nagar,Pasodara</h3>
                <p>house no: E-30</p>
                <p>mobile Number: 785452321</p>
                <h3>4000/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div>
        <div class="room">
            <div class="room-img">
                <img src="img/r4.jpg" alt="">
            </div>
            <div class="room-details">
                <h3>Dada bhagavan,Kamrej</h3>
                <p>house no: D-52</p>
                <p>mobile Number: 985452321</p>
                <h3>3000/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div>
        <div class="room">
            <div class="room-img">
                <img src="img/r5.jpg" alt="">
            </div>
            <div class="room-details">
                <h3>Bhavani complex,Kamrej</h3>
                <p>house no: D-152</p>
                <p>mobile Number: 9954589021</p>
                <h3>2400/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div>
        <div class="room">
            <div class="room-img">
                <img src="img/r6.jpg" alt="">
                
            </div>
            <div class="room-details">
                <h3>Sarathana,surat</h3>
                <p>house no: A-02</p>
                <p>mobile Number: 985452321</p>
                <h3>8000/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div>

        <div class="room">
            <div class="room-img">
                <img src="img/r7.jpg" alt="">
            </div>
            <div class="room-details">
                <h3>Radha-Krisna ,Kamrej</h3>
                <p>house no: P-12</p>
                <p>mobile Number: 985452321</p>
                <h3>1900/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div>


        <div class="room">
            <div class="room-img">
                <img src="img/r8.jpg" alt="">
            </div>
            <div class="room-details">
                <h3>Sayam nagar,Kamrej</h3>
                <p>house no: D-52</p>
                <p>mobile Number: 985452321</p>
                <h3>5000/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div>

        <div class="room">
            <div class="room-img">
                <img src="img/r9.jpg" alt="">
            </div>
            <div class="room-details">
                <h3>Bhavani complex,Kamrej</h3>
                <p>house no: D-102</p>
                <p>mobile Number: 985452321</p>
                <h3>3000/-</h3>
                <button class="booking-btn">booking now</button>
            </div>
        </div> 
       
    </section>
    </section> 

    

   <!-- footer -->  
   <footer class="footer">
    <div class="footer1">
       <img src="img/rent-removebg-preview.png" alt="">
    </div>
    <div -class="footer2"> 
       <p>contac:982121323</p>
       <p>address:IIIT SURAT,KAMREJ</p>
       <p>location:KAMREJ,SURAT,GUJRAT</p>
       <p>email;iiitsurat@gmail.com</p>
    </div>
    <div class="footer3">
       <p>Privacy Policy</p>
       <p>Terms and condition</p>
    </div>


</footer>
    
</body>
</html>