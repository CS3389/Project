<!DOCTYPE html>
<!--
    Application.php is the application page for TaylorU
    @author John Cochran
    Created 24 February 2015
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TaylorU Online Application</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <style>
         body     {margin: 20px;}
    	 fieldset {margin-top: 20px;
                   margin-bottom: 20px;}
    </style>
      
    <p style="color:red">* required field</p>
      <form method="post" action="ApplyController.php">
	<fieldset>
                <legend>General Information</legend>
                 <table>
                   <tr>
                     <td>First Name:</td>
                     <td><input type="text" name="firstName"><a style="color:red">&nbsp;*</a></td>
                     
                   </tr>
                   <tr>
                     <td>Last Name:</td>
                     <td><input type="text" name="lastName"><a style="color:red">&nbsp;*</a></td>
                     
                   </tr> 
                   <tr>
                     <td>Date of Birth:</td>
                     <td><input type="text" name="dob"><a style="color:red">&nbsp;*</a></td>
                 </tr>
                 
                  </tr> 
                   <tr>
                     <td>Gender:</td>
                     <td>
                           <input type="radio" name="gender" value="male">Male&nbsp 
                           <input type="radio" name="gender" value="female">Female <a style="color:red">&nbsp;*</a>
                         </td>
                 </tr>
                 
                  </tr> 
                   <tr>
                     <td>Address:</td>
                     <td><input type="text" name="address"><a style="color:red">&nbsp;*</a></td>
                 </tr>
                 
                  </tr> 
                   <tr>
                     <td>Phone Number:</td>
                     <td><input type="text" name="phone"><a style="color:red">&nbsp;*</a></td>
                 </tr>
                 
               </table>
            </fieldset>
            
            <fieldset>
                <legend>Education</legend>
                 <table>
                   <tr>
                     <td>ACT Score:</td>
                     <td><input type="text" name="actscr"><a style="color:red">&nbsp;*</a></td>
                     
                   </tr>
                     
                   <tr>
                     <td>Last High School Attended:</td>
                     <td><input type="text" name="hsAtt"><a style="color:red">&nbsp;*</a></td>
                     
                   </tr>
                   <tr>
                     <td>Did You Graduate?</td>
                     <td>
                           <input type="radio" name="hsGrad" value="yes">Yes&nbsp; 
                           <input type="radio" name="hsGrad" value="no">No <a style="color:red">&nbsp;*</a>
                         </td>
                                          
                   </tr> 
                   <tr>
                     <td>High School GPA:</td>
                     <td><input type="text" name="hsGPA"><a style="color:red">&nbsp;*</a></td>
                 </tr>
                 
                  </tr> 
                   <tr>
                     <td>Have you attended any other College?</td>
                     <td>
                           <input type="radio" name="otherCol" value="yes">Yes&nbsp; 
                           <input type="radio" name="otherCol" value="no">No <a style="color:red">&nbsp;*</a>
                         </td>
                 </tr>
                 
                  </tr> 
                   <tr>
                     <td>Intended Major:</td>
                     <td><select name="major">
                            <option value="Undecided">Undecided</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Business">Business</option>
			 </select></td>
                 </tr>
                 
                  </tr> 
                   <tr>
                     <td>Intended Minor:</td>
                     <td><select name="minor">
                            <option value="Undecided">Undecided</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Business">Business</option>
					 </select></td>
                 </tr>
                 
               </table>
            </fieldset>
          <br><br>
          <input type="submit" value="Submit Application">
      </form>
    <br><br>
    <a href="login.html">Cancel</a>
    </body>
</html>

