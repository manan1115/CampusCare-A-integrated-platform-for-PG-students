<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index_web.css">
    <style>
        
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
            <!-- <input type="text" placeholder="search.." id="search"> -->
            <button class="log-in-btn"><a href="log-in" >log-in</a></button>
        </div>
    </nav>

<!-- first section -->
    <section class="first-section">
        <h1>Home/Flat for Students</h1>
        <div class="f-img">
            <img src="img/logo-removebg-preview.png" alt="">
        </div>
        <div class="f-link">
            <a href="owner.php">Owner</a>
            <a href="">Student</a>
        </div>
    </section>

    <!-- second section -->
     <p class="p1">Find Your Sweet Accommodation</p>
    <section class="second-section">
        <div class="s-d1">
            <a href="house.php">
                <img src="img/l5.jpg" alt="">
            </a>
        </div>

        <div class="s-d1">
            <a href="tiffin.php">
                <img src="img/l3.jpg" alt="">
            </a>
         </div>

        <div class="s-d1">
            <a href="laundry.php">
             <img src="img/l1.jpg" alt="">
            </a>
        </div>

        <div class="s-d1">
            <a href="wifi.html">
             <img src="img/l6.jpg" alt="">
            </a>
        </div>

    </section>
 <!--  third section  -->
    <section class="third-section">

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

    // Query to select random data from your table
    $sql = "SELECT * FROM `rajtable4` ORDER BY RAND() LIMIT 9"; // Retrieve 9 random records
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
        // No records found
    }

    // Closing the database connection
    $conn->close();
?>
       
    </section>

    <!-- footer -->
    <footer class="footer">
        <div class="footer1">
           <img src="img/rent-removebg-preview.png" alt="">
        </div>
        <div class="footer2">
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