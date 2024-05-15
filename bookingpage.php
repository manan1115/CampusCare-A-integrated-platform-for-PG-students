<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index_web.css">
    <style>
        .house-details{
            width: 100%;
            height: 90vh;
            border: 1px solid black;
            display: flex;
            flex-direction: row;
            padding: 20px;
        }
        .house-img{
            width: 40%;
            height: 80vh;  
            border: 1px solid gray;  
            border-radius: 20px;  
        }
        .house-img img{
            width: 100%;
            height: 100%;
            border-radius: 20px;  
        }
        .house-discription{
            margin-left: 40px;
        }
        h1{
            color: rgb(74, 71, 71);
        }
        .house-p1{
            font-size: 20px;
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
            <a href="homepage.html">Home</a>
            <a href="">Contact</a>
            <a href="">About us</a>
            
        </div>

        <div class="search-bar">
            <!-- <input type="text" placeholder="search.." id="search"> -->
            <button class="log-in-btn"><a href="log-in" >log-in</a></button>
        </div>
    </nav>

    

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
 
     // Check if ID is provided in the URL
     if(isset($_GET['id'])) {
         $id = $_GET['id'];
 
         // Query to select data from your table based on the provided ID
         $sql = "SELECT * FROM `rajtable4` WHERE id = '$id' ";
         $result = $conn->query($sql);
 
         // Check if there is exactly one row returned from the query
         if ($result && $result->num_rows == 1) {
             // Fetching the row as an associative array
             $row = $result->fetch_assoc();
 
             // Displaying the data
             echo "<div class='house-details'>";
             echo "<div class='house-img'>";
             echo "<img src='data:image/jpg;base64," . base64_encode($row["upload"]) . "' alt='Uploaded Image'>";
             echo "</div>";

             echo "<div class='house-discription'>";
             echo "<h1>".$row['society'] . ", " . $row['city']."</h1>";
             echo "<p class='house-p1'>house no: ".$row['houseno']."</p>";
             echo "<p class='house-p1'>Owner name: ".$row['firstname'] . " " . $row['lastname']."</p>";
             echo "<p class='house-p1'>address: ".$row['address1']."</p>";

             echo "<p class='house-p1'>mobile Number: ".$row['tel']."</p>";
             echo "<h3>".$row['rent']."/-</h3>";
             // You can include other details as needed
             echo "</div>";
             echo "</div>";
         } else {
             // Handle the case where no matching record is found
             echo "No details found.";
         }
     } else {
         // Handle the case where ID is not provided in the URL
         echo "Invalid request.";
     }
 
     // Closing the database connection
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