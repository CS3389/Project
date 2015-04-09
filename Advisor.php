<!Advisor class to display application, delete application, and create user and student.
     Created by Robert Vines > 

<?php
    //database connection
    $connString = "mysql:host=localhost;dbname=TaylorU";
    $user ="root";
    $pass ="root";
?>
<?php
    //delete application by id(deny button)
    if(isset($_GET['delete_id']))
    {
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sql="DELETE FROM tayloru.application WHERE applicationId=".$_GET['delete_id'];
        $result = $pdo->query($sql);
        header("Location: Advisor.php");
    }
?>
<?php
    //add user(enroll button)
    if(isset($_GET['add_user']))
    {              
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $studentNum = $_GET['add_user'];
        
        $sql = "INSERT INTO tayloru.user (`UsrName`, `Password`, `Role`)
                VALUES ('".$studentNum."', 'pass', 'student');";
        $result = $pdo->query($sql);
  
        //add enrolled student to student table
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        date_default_timezone_set('America/Chicago');
        $date = date('m-d-Y H:i:s');
        
        $id = substr( $_GET['add_user'], 5, 8);
        
        $sql = "INSERT INTO tayloru.student (firstName, lastName, dob, address,
            gender, actScore, phoneNumber, highSchoolAtt, highSchoolGrad,
            highSchoolGPA, otherCollegeAtt, major, minor, classification,
            dateEnrolled)
            SELECT firstName, lastName, dob, address, gender, actScore, phoneNumber,
            highSchoolAtt, highSchoolGrad, highSchoolGPA, otherCollegeAtt, major,
            minor, 'freshmen', '".$date."' FROM tayloru.application
            WHERE applicationId=".$id;
        $result = $pdo->query($sql);

        //delete enrolled student from applicaiton table 
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $id = substr( $_GET['add_user'], 5, 8);
        
        $sql = "DELETE FROM tayloru.application WHERE applicationId=".$id;
        $result = $pdo->query($sql);
    }
 ?>
<!DOCTYPE html>
 
<html>
    <head>
        <title>Acceptance Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="advisor.css" type="text/css"/>    
    </head>
<body>
    <div id="wrapper">   
      <div class="loginHeader">
        <div class="emblemBox">
        </div>
          <div class="box">
            <div class="boxContent uniName">
              <div class="uniName">Taylor University</div>
            </div>
              <div class="boxContent motto">
                <div class="motto">You're learnin we're earnin</div>
              </div>
              </div>
      </div>
        
    <?php
        //get info from application
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tayloru.application";
        $result = $pdo->query($sql); 
    ?>
   
    <h1>Applications</h1>  
    <!display information from application table >
    <?php while($val=$result->fetch()): ?>
    
        <?php
            $appId= $val['applicationId']; $fName = $val['firstName'];
            $lName = $val['lastName']; $dob = $val['dob']; $address = $val['address']; 
            $gender = $val['gender']; $act = $val['actScore']; $phone = $val['phoneNumber']; 
            $hSchoolAtt = $val['highSchoolAtt']; $hSchoolGrad = $val['highSchoolGrad']; 
            $otherCollege = $val['otherCollegeAtt']; $major = $val['major']; $minor = $val['minor'];
        ?>
    
        <input class="toggle-box" id="<?php echo $appId; ?>" type="checkbox" >
        <label for="<?php echo $appId; ?>"><b>ID: </b><?php echo $appId;  ?>
                <b>Name: </b><?php echo $fName." ".$lName;  ?></label>
        <div><ul> 
            <li><b>Date of Birth: </b><?php echo $dob; ?></li> 
            <li><b>Address: </b></td><?php echo $address; ?></a></li>
            <li><b>Gender: </b><?php echo $gender; ?></a></li>
            <li><b>ACT Score: </b><?php echo $act; ?></a></li>
            <li><b>Phone Number: </b><?php echo $phone; ?></a></li>
            <li><b>High School Attended: </b><?php echo $hSchoolAtt; ?></a></li>
            <li><b>High School Grad: </b><?php echo $hSchoolGrad; ?></a></li>
            <li><b>Other College Attended: </b><?php echo $otherCollege; ?></a></li>
            <li><b>Major: </b><?php echo $major; ?></a></li>
            <li><b>Minor: </b><?php echo $minor; ?></a></li>        
            
            <?php 
                  $month= substr($dob, 0, 2);
                  $year= substr($dob, 8, 2);
            ?>
            
            <!buttons to delete from application table and create a user >
            <a href="Advisor.php?add_user=<?php if($appId < 10)
                    {
                       echo $year.$month.'000'.$appId;//yymm####
                    }
                    if($appId >= 10)
                    {
                       echo $month.$year.'00'.$appId;
                    }
                ?>" onclick="return confirm('Are you sure you enroll this person?');" ><button>Enroll</button></a>
            <a href="Advisor.php?delete_id=<?php echo $val['applicationId']?>" onclick="return confirm('Are you sure you want to delete this application?');" ><button>Deny</button></a>
        </ul></div>
    <?php endwhile; ?>

</body>
</html>