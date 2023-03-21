<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form for Edit DB</title>
    
    <link rel="stylesheet" href="style.css">
    
</head>
<body>


<div class="navbar">

      
        

  

<div class="name-of-medical-store">


  <h2>Amrut Medicines</h2>


  
</div>


<div class="button-class">

        <button class="add-item" onclick="document.location='index.php'"> Add New Medicine </button>
        <button class="add-item" onclick="document.location='invoice_generator.html'"> Invoice generator </button>


</div>
</div>




    <form class="madicine-input" id="madicine-input" data-aos="zoom-in-up" style="display: block" method='post'>
        
        
        <div class="form-group">
            <label for="name">Madicine Name or ID:</label>
            <input type="text" id="name" name="name" placeholder="Name or Id" >
        </div>


        <center>
                <button class="btn">Submit</button>
        </center>


    </form>

    <div class="preview">

        <center>

            <h2 style='color: white;'>Your medicine will see here </h2>







        <div class="main-container" id="main-container-id">


    

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

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $sql3 = "delete from medicine where m_id = '$id';";
            $result = $conn->query($sql3);

                if ($result) { 
                    echo "Deleted successfully.";
                 }
            

          }

        if (isset($_POST['name'])) {


                $name = $_POST['name'];


                // $sql2 = "SELECT * FROM `medicine` where name = \"$name\";";
                // $sql = "SELECT * FROM `medicine` WHERE name=\'BioPolio1\' or m_id = 27;";
                $sql2 = "SELECT * FROM medicine WHERE name = '$name' or m_id = '$name' or name LIKE '%$name%';";



                $result = $conn->query($sql2);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    // echo "id: " . $row['name']. " - Name: " . $row["price"]. " <br> " . $row["description"]. "<br>";
                


                // $newname = $row["name"];

                
                echo "    <div class='product' title=Madicine_id_" . $row["m_id"] . " style='transform: none' >  ";
                echo "        <img src=" . $row["image_med"]. " alt=". $row["name"] .">";
                echo "        <div class='product-info'>";
                echo "          <h2> ". $row["name"] ." </h2>";
                echo "          <p class='description'> ". $row["description"] ."</p>";
                echo "          <p class='price'> Price:" . $row["price"]. " </p>";
                echo "          <p class='margin'> Margin: " . $row["margin"]. "</p>";
                echo "          <p class='quantity'>Available Quantity:" . $row["quantity"]. " </p>";
                echo "        </div>";
                echo "    </div>";



                echo "<br><button class='btn' onclick=\"document.location='edit_medicine.php?id=" . $row['m_id'] . "'\">Delete</button>";

                



                    }
                } else {
                    echo "0 results"; 
                }

          
            }

            
                ?>

        

        

        </center>


        

    </div>




          
      
</body>
</html>