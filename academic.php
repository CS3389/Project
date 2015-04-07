<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "taylor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="academic.css">
        <title>Taylor University Academics</title>
    </head>
    <body>
        <h1><img src="taylorUbanner.jpg" alt="Taylor University"></h1>
        <div id="wrapper">
            <fieldset>
                <legend> Academics</legend>
           
  <?php
        
            
       
$sql = "SELECT idMajors, Department, Major FROM majors"; "SELECT idSemester, StartDate, EndDate, Semester FROM semester";
$result = $conn->query($sql);

     
 echo "Select Major"."<br>";
  //echo "<select name='Semester'>";
if ($result->num_rows > 0) {
     
    echo "<select name='course'>";
     while($row = $result->fetch_assoc()) 
      {
          echo "<option value='" . $row["Major"] . "'>" . $row["Major"] . "</option>";
         //echo "<option value='" . $row["Semester"] . "'>" . $row["Semester"] . "</option>";
        /* echo "<br> idMajors: ". $row["idMajors"]. " -". $row["Department"]. " " . $row["Major"] ."<br>";*/
     }
     echo "</select>";
} else {
     echo "0 results";
}

$conn->close();
   
?>
        
    
    </fieldset>
        </div>
        <div id="wrapper">
            <fieldset>
                <legend> Semester</legend>
                <td>
               <tr>
                    
                           <input type="radio" name="Semester" value="fall">Fall&nbsp 
                           <input type="radio" name="semester" value="spring">Spring&nbsp
                        
                </td>
                    
            </fieldset>
        </div>
        <br>
        <a href="Course.php" style="text-decoration: none">
            <input type="button" value="Submit"/>
        </a>
    
    </body>
</html>
