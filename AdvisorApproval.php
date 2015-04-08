<!DOCTYPE html>
<!--
   AdvisorApproval.php is page that allows an advisor to approve a student's
    first semester schedule.
   @author John Cochran
    created 31 March 2015
    
-->
<html>
    <head>
        <title>Advisor Approval</title>
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
      <h1>First Semester Schedules</h1>
      
        <?php
           
            //database connection
            $connString = "mysql:host=localhost;dbname=TaylorU";
            $user ="root";
            $pass ="root";
            
            //query database for students with first semesters (Student Table)
             $pdo = new PDO($connString, $user, $pass);
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "SELECT * FROM TaylorU.Student WHERE firstSemester = 1;";
             $result = $pdo->query($sql); 
             
              while($val=$result->fetch()):
                $studentID = $val['studentId'];
                $fName = $val['firstName'];
                $lName = $val['lastName'];
              ?>  
                <input class="toggle-box" id="<?php echo $studentID; ?>" type="checkbox" >
                <label for="<?php echo $studentID; ?>"><b>ID: </b><?php echo $studentID;  ?>
                <b>Name: </b><?php echo $fName." ".$lName;  ?></label>
            
                <div><table 
                 <tr>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Course Title</b></td>
                   <td>&nbsp;&nbsp;<b>Meeting Time</b></td>
                   <td>&nbsp;&nbsp;<b>Location</b></td>
                   <td>&nbsp;&nbsp;<b>Credit Hours</b></td>
                   <td>&nbsp;&nbsp;<b>Instructor</b></td>
                   <td>&nbsp;&nbsp;<b>Class Size</b></td>
                </tr>
            <!query intermdiate table for each student's courses >
             <?php 
              $pdo2 = new PDO($connString, $user, $pass);
              $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sqlStudent = "SELECT * FROM TaylorU.Schedule WHERE studentId = ".$studentID.";";
              $resultStudent = $pdo2->query($sqlStudent); 
              
              
              while($valStudent=$resultStudent->fetch()): 
                  //query courses table to get each course description
                  $sqlCourse = "SELECT * FROM TaylorU.course WHERE idcourse = ".$valStudent['courseId'].";";
                  $resultCourse = $pdo2->query($sqlCourse); 
                    $valCourse=$resultCourse->fetch();
             ?>
    
            <!populate table >  
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $valCourse['courseTItle'];?></td>
                <td>&nbsp;&nbsp;<?php echo $valCourse['meetingTime'];?></td>
                <td>&nbsp;&nbsp;<?php echo $valCourse['location'];?></td>
                <td>&nbsp;&nbsp;<?php echo $valCourse['creditHours'];?></td>
                <td>&nbsp;&nbsp;<?php echo $valCourse['instructor'];?></td>
                <td>&nbsp;&nbsp;<?php echo $valCourse['size'];?></td>
            </tr>
   
            <?php 
                 endwhile;
             ?> 
            <tr>
                  <!--  Button for an advisor to approve a schedule-->
              <td> <a href="AdvisorApproval.php?approval_id=<?php echo $val['studentId']?>" 
                      onclick="return confirm('Are you sure you want to approve this Student\'s schedule?'); " ><button>Approve</button></a></td>
                   </tr> 
                    </table>
           </div>
            <?php
            endwhile;
            ?>
                
              <?php
           //  approve schedule by studentID
           if(isset($_GET['approval_id']))
           {
               
             $pdoApprove = new PDO($connString, $user, $pass);
             $pdoApprove->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
             $sqlApprove="UPDATE TaylorU.Student SET firstSemester = 0 WHERE studentId =".$_GET['approval_id'].";";
             $pdoApprove->exec($sqlApprove);
             header("Location: AdvisorApproval.php");
          //   header("Refresh: 0; url= 'http://localhost:8888/Project/AdvisorApproval.php'");
             
           }
         ?>

        
    </body>
</html>
