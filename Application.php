<!DOCTYPE html>
<!--
    Application.php is the application page for TaylorU
    @author John Cochran
    Created 24 February 2015
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="application.css" type="text/css"/>
        <title>TaylorU Online Application</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
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
    
    <div id="mainwrapper">
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
                     <td>Date of Birth: (mm/dd/yyyy)</td>
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
          <br>
          <input type="submit" value="Submit Application">
      </form>
    <br>
    <a href="Login/login.html">Cancel</a>
    </div>
   </div>
    </body>
</html>

