<?php
//$servername = "172.30.251.114";
//$username = "ose";
//$password = "openshift";
//$dbname = "quotes";


// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);

$conn = mysqli_connect($_ENV["MYSQLDB_SERVICE_HOST"],"instructor","openshift","instructor",
 $_ENV["MYSQLDB_SERVICE_PORT"])
     or die("Error " . mysqli_error($conn));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// *********** Temporarily commenting out this portion of code *********

//echo " \n";

//$sql = "SELECT instructorNumber, instructorName, email, city, state, postalCode, country
//    from instructors";

//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
//   echo"<table border='1'>";
//   echo"<tr><td>Name</td><td>Category</td><td>Calories</td><tr>";
   // output data of each row
//   while($row = $result->fetch_assoc()) {
//          echo "InNum:- " . $row["instructorNumber"]. " " ;
//          echo "InName:- " . $row["instructorName"]. " " ;
//          echo "Email:- " . $row["email"]. " " ;
//          echo "City:- " . $row["city"]. " " ;
//          echo "State:- " .  $row["state"]. " " ;
//          echo "PostalCode:- " . $row["postalCode"]. " " ;
//          echo "Country:- " . $row["country"]. " " ;
//        echo " \n";
//   echo"</table>";
//   }
// } else {
//   echo "0 results";
// }

// *********** Temporarily commenting out this portion of code *********

// create a variable
// $instructorNumber=$GET['instructorNumber'];
// $instructorName=$_GET['instructorName'];
// $email=$_GET['email'];
// $city=$_GET['city'];
// $state=$_GET['state'];
// $postalCode=$_GET['postalCode'];
// $country=$_GET['country'];

$sql = "SELECT instructorNumber, instructorName, email, city, state, postalCode, country
    from instructors";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
         $instructorNumber = $row["instructorNumber"];
         $instructorName = $row["instructorName"];
         $email = $row["email"];
         $city = $row["city"];
         $state = $row["state"];
         $postalCode = $row["postalCode"];
         $country = $row["country"];
     echo "  <div style='margin:30px 0px;'>
      Instructor Number: $instructorNumber<br />
      Instructor Name: $instructorName<br />
      Email Address: $email<br />
      City: $city<br />
      State: $state<br />
      Zip Code: $postalCode<br />
      Country: $country
    </div>
    ";
    
//          echo "InNum:- " . $row["instructorNumber"]. " " ;
//          echo "InName:- " . $row["instructorName"]. " " ;
//          echo "Email:- " . $row["email"]. " " ;
//          echo "City:- " . $row["city"]. " " ;
//          echo "State:- " .  $row["state"]. " " ;
 //         echo "PostalCode:- " . $row["postalCode"]. " " ;
//          echo "Country:- " . $row["country"]. " " ;
//            echo "InNum:- " . $row["instructorNumber"]. " " ;
//        echo " \n";
   }
 } else {
   echo "0 results";
}

$conn->close();
?>
