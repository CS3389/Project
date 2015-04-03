<?php 

include "User.php";

$usr = new User($_SESSION["session_username"],null,$_SESSION["usr_role"]);


?>
<div id="studentContainer">
        <div class="searchCluster">
                <div>
                    <form id="searchForm" action="dashboard.php?innPage=student" method="post">
                        
                            <div class="LabelDiv">
                                <label class="label">Student First Name:</label>
                            </div>
                            <div class="inputDiv">
                                <input type="text" name="fname" id="fname">
                            </div>
                         
                            <div class="LabelDiv">
                                <label class="label">Student Last Name:</label>
                            </div>
                            <div class="inputDiv">
                                <input type="text" name="lname" id="lname">
                            </div>
                             <div class="LabelDiv">
                                <label class="label">Student ID:</label>
                            </div>
                            <div class="inputDiv">
                                <input type="text" name="ID" id="studId">
                            </div>
                             <input class="submit" type="submit"  value="submit">
                       
                    </form>
                </div>
            <div>
                <div id="resContainer">
                    <div class="resultsFieldGroup">
                        <?php
                        
                        if(!$usr->isAuthorizdToEdit($_SESSION["usr_role"]))
                        {
                            echo "<input id=\"frsName\" name=\"frsName\" type=\"text\" >
                        <input id=\"lstName\" name=\"lstName\" type=\"text\" >
                        <input id=\"idbox\" name=\"idbox\" type=\"text\" disabled >";
                        }
                        else
                        {
                            echo "<input id=\"frsName\" name=\"frsName\" type=\"text\" >
                        <input id=\"lstName\" name=\"lstName\" type=\"text\" >
                        <input id=\"idbox\" name=\"idbox\" type=\"text\" >";
                        }
                        
                        
                        ?>
                    </div>
                </div>

</div>

 

