<?php
        $connString = "mysql:host=localhost;dbname=TaylorU";
        $user ="root";
        $pass ="root";
 ?>
<!DOCTYPE html>
 
<html>
    <head>
        <title>User List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="advisor.css" type="text/css"/>
    </head>
<body>
    <img src="images/taylorUbanner.jpg">
  <?php
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    $sql = "select * from application";
    $result = $pdo->query($sql); 
   ?>
    
    <h1>Applications</h1>    
    
    <?php while($val=$result->fetch()): ?>
    <input class="toggle-box" id="<?php echo $val['applicationId']; ?>" type="checkbox" >
    <label for="<?php echo $val['applicationId']; ?>"><b>ID: </b><?php echo $val['applicationId'];  ?>
            <b>Name: </b><?php echo $val['firstName']." ".$val['lastName'];  ?></label>
        <div><ul> 
            <li><b>Date of Birth: </b><?php echo $val['dob']; ?></li> 
            <li><b>Address: </b></td><?php echo $val['address']; ?></a></li>
            <li><b>Gender: </b><?php echo $val['gender']; ?></a></li>
            <li><b>ACT Score: </b><?php echo $val['actScore']; ?></a></li>
            <li><b>Phone Number: </b><?php echo $val['phoneNumber']; ?></a></li>
            <li><b>High School Attended: </b><?php echo $val['highSchoolAtt']; ?></a></li>
            <li><b>High School Grad: </b><?php echo $val['highSchoolGrad']; ?></a></li>
            <li><b>Other College Attended: </b><?php echo $val['otherCollegeAtt']; ?></a></li>
            <li><b>Major: </b><?php echo $val['major']; ?></a></li>
            <li><b>Minor: </b><?php echo $val['minor']; ?></a></li>         
            
            <form>
            <input type="button" name="enroll" value="Enroll">
            <input type="button" name="deny" value="Deny">
            </form>
            
            </ul></div><?php endwhile; ?></form>
</body>
</html>