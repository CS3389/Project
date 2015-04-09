<?php
    //database connection
    $connString = "mysql:host=localhost;dbname=TaylorU";
    $user ="root";
    $pass ="root";
    
    //add class
    if(isset($_GET['add_class']))
    {
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $course = $_GET['add_class'];
            
        $sql="INSERT INTO tayloru.schedule (courseId, studentId, grade) VALUES ('".$course."', '123', ' ');";
        $result = $pdo->query($sql);
    }
    
    //drop class
    if(isset($_GET['drop_class']))
    {
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $course = $_GET['add_class'];
            
        $sql="DELETE FROM tayloru.schedule WHERE courseId=".$_GET['drop_class']." AND studentId = '123';";
        $result = $pdo->query($sql);
    }
?>
<html>
    <head>
        <title>Course Selection</title>
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
        <h2>
        <?php
            //get student id
            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM tayloru.student;";
            $result = $pdo->query($sql);
            
            while($val=$result->fetch()):
                $studentId = $val['studentId']." ";
                $name = $val['firstName']." ".$val['lastName'];    
            endwhile;
            echo $studentId;
            echo $name;
            ?></h2>
        
        <!--table to show added classes-->
        <h2>Courses Selected</h2>
        
        <?php
            //get classes for table
            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT schedule.courseId, schedule.studentId, course.courseTItle, 
                    course.instructor, course.location, course.size, 
                    course.meetingTime, course.creditHours
                    FROM schedule
                    INNER JOIN course
                    ON schedule.courseId=course.idcourse
                    WHERE schedule.studentId = '123';";
            $result = $pdo->query($sql);           
        ?>
        
        <table id="courses">
            <thead>
                <tr>
                    <th width="9.3%">Course Id</th>
                    <th width="37.9%">Course Name</th>
                    <th width="14.7%">Instructor</th>
                    <th width="9.2%">Location</th>
                    <th width="4%">Size</th>
                    <th width="8.8%">Time</th>
                    <th width="4.8%">Hours</th>
                    <th width="6.2%"> </th>
                </tr>
            </thead>
            <tbody>
                <?php while($val=$result->fetch()): ?>
                <tr>
                    <td width="9.6%"><?php echo $val['courseId']; ?></td>
                    <td width="39.5%"><?php echo $val['courseTItle']; ?></td>
                    <td width="15.2%"><?php echo $val['instructor']; ?></td>
                    <td width="9.4%"><?php echo $val['location']; ?></td>
                    <td width="4.8%"><?php echo $val['size']; ?></td>
                    <td width="8.9%"><?php echo $val['meetingTime']; ?></td>
                    <td width="6%"><?php echo $val['creditHours']; ?></td>
                    <td width="4.7%" align="center"><a href="CourseSelection.php?drop_class=<?php echo $val['courseId']; ?>"><button>Drop</button></a></td>
                </tr>
                <?php endwhile; ?>
        </table>
 
        <!--table to show all courses-->
        <h2>Courses Offered</h2>
     
        <?php
            //get classes for table
            $pdo = new PDO($connString, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tayloru.course";
            $result = $pdo->query($sql);           
        ?>
        
        <table id="courses">
            <thead>
                <tr>
                    <th width="9.4%">Course Id</th>
                    <th width="39%">Course Name</th>
                    <th width="14.9%">Instructor</th>
                    <th width="9.2%">Location</th>
                    <th width="2">Size</th>
                    <th width="9%">Time</th>
                    <th width="4.8%">Hours</th>
                    <th width="8%"> </th>
                </tr>
            </thead>
            <tbody>
                <?php while($val=$result->fetch()): 
                    
                    $courseId = $val['idcourse']; $courseName = $val['courseTItle'];
                    $size = $val['size']; $time = $val['meetingTime'];
                    $hours = $val['creditHours']; $instructor = $val['instructor'];
                    $location = $val['location'];
                ?> 
                
                <tr>
                    <td width="9.6%"><?php echo $courseId; ?></td>
                    <td width="39.8%"><?php echo $courseName; ?></td>
                    <td width="15.2%"><?php echo $instructor; ?></td>
                    <td width="9.4%"><?php echo $location; ?></td>
                    <td width="6.1"><?php echo $size; ?></td>
                    <td width="8.9"><?php echo $time; ?></td>
                    <td width="6%"><?php echo $hours; ?></td>
                    <td width="4.6%" align="center"><a href="CourseSelection.php?add_class=<?php echo $val['idcourse']; ?>"><button>Add</button></a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </body>
</html>