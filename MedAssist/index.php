<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">

    <!-- aos library -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <!-- end source of aos... -->
    <title> Madical Related project </title>
</head>
<body>







    




<!-- php code goes from here -->
<?php

$flag_data = false; // flag for show user.
// Retrieve the form data using $_POST superglobal
// Database connection details
$host = 'localhost:3311';
$user = 'root';
$pass = '';
$dbname = 'mydatabase';

// Establish a connection to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






  // echo "Connected to the database.";

  if (isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['margin'], $_POST['quantity'])) {

  
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $margin = $_POST['margin'];
  $quantity = $_POST['quantity'];
  $imagefile = $_POST['img-src'];

  try {
  $sql = "INSERT INTO `mydatabase`.`medicine` (`name`, `description`, `price`, `margin`, `quantity`,`image_med`) VALUES ('$name', '$description', '$price', '$margin', '$quantity','$imagefile');";
  

  if ($conn->query($sql) == true) {
          $flag_data = true;
      }
  }


catch (Exception $e) {
  echo " <h3> Something getting wrong...";
  echo "<br> Medicine cannot same name, give some unique name. </h3>";
  }
}

  

// Insert the form data into the database

// Close the database connection
$conn->close();
?>


<!-- ends of php block -->



























  <div class="navbar">

      
        

  

        <div class="name-of-medical-store">

        
          <h2>Amrut Medicines</h2>


          
        </div>

        
      <div class="button-class">

        <button class="add-item" onclick="show()"> Add New Medicine </button>
        <button class="add-item" onclick="document.location='edit_medicine.php'"> Search / Delete Medicine</button>
        <button class="add-item" onclick="document.location='invoice_generator.html'"> Invoice generator </button>

      
      </div>
  </div>

    <?php 

      if ($flag_data == true){
        echo "<h3>  <center> Medicine added successfully </center> </h3>";
      }
    ?> 




    <form class="madicine-input" id="madicine-input" data-aos="zoom-in-up" action="index.php" method="post">
        <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" id="name" name="name" placeholder="Dettol">
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" id="description" name="description" placeholder="Antiseptic">
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" id="price" name="price" step="0.01" min="0.50" placeholder="11.20">
        </div>
        <div class="form-group">
          <label for="margin">Margin:</label>
          <input type="number" id="margin" name="margin" step="0.01" min=".02" placeholder="1.20">
        </div>
        <div class="form-group">
          <label for="quantity">Available Quantity:</label>
          <input type="number" id="quantity" name="quantity" min="1" placeholder="18">
        </div>

        <!-- image input -->
        <div class="form-group">
          <label for="quantity">Add URL for image</label>
          <input type="text" id="img" name="img-src" placeholder="image link 'imgbb/images'">
        </div>
        
          

          
        
       </div>
       </div>
        


        <center>
            <button class="btn">Submit</button>
        </center>
      </form>
      


    <br><br><br><br>
    <br><br><br><br>

































    

    

    <!-- serchbox -->
    

    <div class="main-contaner-medicine">
      










                                                



        <div class="search-box-class" >
              <form class="search-box">
                    <h2 style="color: white;"> All medicine </h2>
                    <!-- <input type="text" id="search-box-1" placeholder="Search..." action="index.php" method="GET" name="search-med"> -->
                    <!-- <button type="submit">Go</button> -->
              

              </form> 

                                                              


              <ul>
                <!-- <li>Bandage</li>
                <li>Paracetamol</li>
                <li>BioPolio</li> -->


                <?php

        $flag_data = false; // flag for show user.
        // Retrieve the form data using $_POST superglobal
        // Database connection details
        $host = 'localhost:3311';
        $user = 'root';
        $pass = '';
        $dbname = 'mydatabase';

        // Establish a connection to the database
        $conn = new mysqli($host, $user, $pass, $dbname);

        // Check if the connection is successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }



      $sql2 = "SELECT name FROM `medicine` order by name;";
      $result = $conn->query($sql2);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
  
          // echo "id: " . $row['name']. " - Name: " . $row["price"]. " <br> " . $row["description"]. "<br>";
       


      // $newname = $row["name"];

      // <li>Bandage</li>


            echo " <li>" . $row['name'] . "</li>";

        }
      } else {
        echo "0 results"; 
      }

      ?>




              </ul>

        </div>

    






















    <div class="main-container" id="main-container-id">



    

        <!-- <div class="product">
            <img src="images/dettol.png" alt="Product Image">
            <div class="product-info">


              <h2>Dettol</h2>
              <p class="description">Dettol anti-septic</p>
              <p class="price"> Price: $19.99</p>
              <p class="margin"> Margin: $1.20</p>
              <p class="quantity">Available Quantity:10 </p>
            </div>
         </div>


         

         <div class="product">
            <img src="images/bandage dettol.png" alt="Bandage">
            <div class="product-info">
              <h2>Bandage Dettol</h2>
              <p class="description"> Protection from Small injury </p>
              <p class="price"> Price: $1</p>
              <p class="margin"> Margin: $0.20</p>
              <p class="quantity">Available Quantity:20 </p>
            </div>
         </div>

         <div class="product">
            <img src="images/paracetamol.png" alt="Bandage">
            <div class="product-info">
              <h2>Paracetamol</h2>
              <p class="description"> Panic, fever, cold </p>
              <p class="price"> Price: $1</p>
              <p class="margin"> Margin: $0.20</p>
              <p class="quantity">Available Quantity:40 </p>
            </div>
         </div> -->

         



  
      <?php

        $flag_data = false; // flag for show user.
        // Retrieve the form data using $_POST superglobal
        // Database connection details
        $host = 'localhost:3311';
        $user = 'root';
        $pass = '';
        $dbname = 'mydatabase';

        // Establish a connection to the database
        $conn = new mysqli($host, $user, $pass, $dbname);

        // Check if the connection is successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }



      $sql2 = "SELECT * FROM `medicine` LIMIT 6;";
      $result = $conn->query($sql2);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          // echo "id: " . $row['name']. " - Name: " . $row["price"]. " <br> " . $row["description"]. "<br>";
       


      // $newname = $row["name"];



      echo "    <div class='product' title=Madicine_id_" . $row["m_id"] . " >  ";
      echo "        <img src=" . $row["image_med"]. " alt=". $row["name"] .">";
      echo "        <div class='product-info'>";
      echo "          <h2> ". $row["name"] ." </h2>";
      echo "          <p class='description'> ". $row["description"] ."</p>";
      echo "          <p class='price'> Price:" . $row["price"]. " </p>";
      echo "          <p class='margin'> Margin: " . $row["margin"]. "</p>";
      echo "          <p class='quantity'>Available Quantity:" . $row["quantity"]. " </p>";
      echo "        </div>";
      echo "    </div>";

        }
      } else {
        echo "0 results"; 
      }

      ?>

      
   

    </div>
    </div>















    

























    <script src="script.js"></script>

    

<!-- aos -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<!-- ends of aos -->

</body>
</html>