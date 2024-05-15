<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index_web.css">
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

    <section class="laundry-fs">
            <div class="laundry-d1">
                <h1>Find laundry services </h1>
                <input type="text" name="" id="search-d1" placeholder="search...">
                <button class="search-btn-d1">search</button>
            </div>
            <div class="laundry-d2">
                <div class="laundry-d2-img">
                    <img src="img/r12.jpg" alt="">
                </div>
                <div class="laundry-d2-details">
                     <h2>Shree krisha laundry,kamrej</h2>
                     <p class="d2-p1">bhavani complex,sector-4,house no: R-32</p>
                     <p class="d2-p1">Mobile No: 932040204</p>
                     <button>location</button>
                </div>

            </div>
    </section>




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

// Check if form submitted
if(isset($_POST['submit'])) {
    $search = $_POST['search'];
                    
                    // Query to select data from your table, filtered by the search term
                    $sql = "SELECT * FROM `laundryservice` WHERE city = '$search'";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        // Displaying the data in div format
                        echo "<div class='room'>";
                        echo "<div class='room-img'>";
                        echo "<img src='data:image/jpg;base64," . base64_encode($row["image"]) . "' alt='Uploaded Image'>";
                        echo "</div>";
                        echo "<div class='room-details'>";
                        echo "<h3>" . $row['address'] . ", " . $row['city'] . "</h3>";
                        echo "<p>Mobile Number: " . $row['tel'] . "</p>";
                        echo "<p>Charges: " . $row['charges'] . "/-</p>";
                        echo "<p>Pickup Date: " . $row['pickupDate'] . "</p>";
                        echo "<p>Pickup Time: " . $row['pickupTime'] . "</p>";
                        echo "<p>Delivery Date: " . $row['deliveryDate'] . "</p>";
                        echo "<p>Delivery Time: " . $row['deliveryTime'] . "</p>";
                        echo "<p>Laundry Type: " . $row['laundryType'] . "</p>";
                        echo "<p>Special Instructions: " . $row['specialInstructions'] . "</p>";
                        echo '<a href="bookingpage.php?id=' . $row["id"] . '" class="view-details">View Details</a>';
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No results found.</p>";
                }
                


// Close connection
$conn->close();
?>


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