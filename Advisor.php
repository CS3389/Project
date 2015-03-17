<!Advisor class to display application, delete application, and create user.
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
    }
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

        $sql = "select * from tayloru.application";
        $result = $pdo->query($sql); 
    ?>
   
    <h1>Applications</h1>  
    <!display information from application table >
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
            
            <!buttons to delete from application table and create a user >
            <a href="Advisor.php?add_user=<?php if($val['applicationId'] < 10)
                    {
                       echo $val['dob'].'00'.$val['applicationId'];
                    }
                    if($val['applicationId'] >= 10)
                    {
                       echo $val['dob'].'0'.$val['applicationId'];
                    }
                ?>" onclick="return confirm('Are you sure you enroll this person?');" ><button>Enroll</button></a>
            <a href="Advisor.php?delete_id=<?php echo $val['applicationId']?>" onclick="return confirm('Are you sure you want to delete this application?'); " ><button>Deny</button></a>
        </ul></div>
    <?php endwhile; ?>

</body>
</html>
