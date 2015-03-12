<?php

/*
 * ApplyController.php
 * @author John Cochran
 * Created 24 February 2015
 */

include 'Student.php';

$student = new Student($_POST["firstName"], $_POST["lastName"], $_POST["dob"],
        $_POST["address"], $_POST["gender"], $_POST["phone"], $_POST["actscr"], $_POST["hsAtt"],
        $_POST["hsGrad"], $_POST["hsGPA"], $_POST["otherCol"], $_POST["major"],
        $_POST["minor"]);

try
{
    $student->apply();
    echo "Congratulations, you successfully applied!";
    
    
}//end try
 catch (Exception $e)
 {
     echo $e->getMessage();
 }// end catch
