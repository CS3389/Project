<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="course.css">
        <title>Taylor University</title>
    </head>
    <body>
         <h1><img src="taylorUbanner.jpg" alt="Taylor University"></h1>
        <?php
        // put your code here
        ?>
         <form action="saveCourse.php" method="post">
             <div id="wrapper">
                 <fieldset>
                     <legend>Create Course</legend>
                     <table>
                     
                         <tr>
                             <td>Course Title</td>
                             <td><input type="text" name="courseTItle"></td>
                         </tr>
                     <tr>
                     <td>Class Size</td>
                     <td><input type="text" name="size"></td>
                     </tr>
                     
                     <tr>
                     <td>Meeting Time</td>
                     <td><input type="text" name="meetingTime"></td>
                     </tr>
                     
                     <tr>
                     <td>Credit Hours</td>
                     <td><input type="text" name="creditHours"></td>
                     </tr>
                     
                     <tr>
                    <td> Instructor</td>
                     <td><input type="text" name="instructor"></td>
                     </tr>
                     
                     <tr>
                    <td> Location</td>
                     <td><input type="text" name="location"></td>
                     </tr>
                     
                     </table>
                     
                     <br>
                     <input type="submit" value="Create Course">
                    
                     </fieldset>
                
             </div>
         
         
         
         </form>
         
         
         
           
            <h1><b>Courses</b></h1>
       
    <table>
  <tr>
      
      <td>Course Title&nbsp;</td>
      <td>Class Size&nbsp;</td>
      <td>Meeting Time&nbsp;</td>
      <td>Credit Hours&nbsp;</td>
      <td>Instructor&nbsp;</td>
      <td>Location&nbsp;</td>
  </tr>
  <tr>
   
    <td><input type="checkbox" name="course" value="course">English</td>
    <td>30</td>		
    <td>M/W 8:30-9:50&nbsp;</td>
    <td>3</td>
    <td>Sheryl Smith&nbsp;</td>
    <td>BH109</td>
  </tr>
  <tr>
     <td><input type="checkbox" name="course" value="course">English</td>
    <td>30</td>		
    <td>M/W 10:40-12:00&nbsp;</td>
    <td>3</td>
    <td>Aleen Drew&nbsp;</td>
    <td>BH109</td>
  </tr>
   <tr>
     <td><input type="checkbox" name="course" value="course">English</td>
    <td>30</td>		
    <td>M/W 1:40-3:00&nbsp;</td>
    <td>3</td>
    <td>Jennifer Foster&nbsp;</td>
    <td>BH109</td>
</tr>
 <tr>
     <td><input type="checkbox" name="course" value="course">Biology</td>
    <td>40</td>		
    <td>M/W 1:40-3:30&nbsp;</td>
    <td>4</td>
    <td>Samuel Davis&nbsp;</td>
    <td>GR49</td>
  </tr>
   <tr>
     <td><input type="checkbox" name="course" value="course">Biology</td>
    <td>40</td>		
    <td>T/TH 8:30-9:50&nbsp;</td>
    <td>4</td>
    <td>Samuel Davis&nbsp;</td>
    <td>GR49</td>
  </tr>
   <tr>
     <td><input type="checkbox" name="course" value="course">Pre Calculus</td>
    <td>33</td>		
    <td>T/TH 1:30-3:00&nbsp;</td>
    <td>3</td>
    <td>Douglas Weaver&nbsp;</td>
    <td>GR25</td>
  </tr>
   <tr>
     <td><input type="checkbox" name="course" value="course">Pre Calculus</td>
    <td>33</td>		
    <td>T/TH 8:30-9:50&nbsp;</td>
    <td>3</td>
    <td>Douglas Weaver&nbsp;</td>
    <td>GR25</td>
  </tr>
   <tr>
     <td><input type="checkbox" name="course" value="course">Speech</td>
    <td>15</td>		
    <td>T/TH 12:00-1:00&nbsp;</td>
    <td>1</td>
    <td>David Burn&nbsp;</td>
    <td>R15</td>
  </tr>
  <tr>
     <td><input type="checkbox" name="course" value="course">Computer Programming 1</td>
    <td>25</td>		
    <td>T/TH 10:00-12:00&nbsp;</td>
    <td>3</td>
    <td>Ron Twinky&nbsp;</td>
    <td>MPX204</td>
  </tr>
   <tr>
     <td><input type="checkbox" name="course" value="course">Computer Programming 1</td>
    <td>25</td>		
    <td>M/W 10:00-12:00&nbsp;</td>
    <td>3</td>
    <td>Ron Twinky&nbsp;</td>
    <td>MPX204</td>
  </tr>
    <tr>
     <td><input type="checkbox" name="course" value="course">Visual Programming</td>
    <td>25</td>		
    <td>M/W 8:30-9:50&nbsp;</td>
    <td>3</td>
    <td>Carter Heith&nbsp;</td>
    <td>MPX204</td>
  </tr>
</table>
 
    </body>
</html>
