<?php
//Start session
session_start();
require 'Display.php';
require 'Student.php';
header("Last-Modified:".  gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", FALSE);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
	header("location: login.html");
	exit();
}
$dsp = new Display();
$std = new Student(null,null,null,null,null,null,null,null);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="Login/Login.css" type="text/css"/>
<link rel='stylesheet' href='dashboard.css' type='text/css'/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<title>Home Page</title>
</head>
 
<body>
    <div id="fullHeightContainer">
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
        <div class="pageBody">
            <div id="windowContainer">
            </div>
            
            <div id="menuContainer">
                <?php echo $dsp->displayMenu($_SESSION['usr_role']);?>
            </div>
    </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function (){
        
        var url = window.location.href;
        var innPage = "";
        
        if(url.indexOf('?innPage=') != -1)
        {
            
            innPage = url.substring(url.indexOf('?innPage=') + 9,url.length);
        }
        
       
        
        if(innPage == 'student')
        {
            
            showSubWindow('StudentButton');
            
        }
        else if(innPage == 'classes')
        {
            showSubWindow('ClassesButton');
        }
        else if(innPage == 'grades')
        {
            showSubWindow('GradesButton');
        }
        else if(innPage == 'faid')
        {
            showSubWindow('FinancialAidButton');
        }
        
        determineResSet(innPage);
    });
    
    
    function showSubWindow(id)
    {
       var ele = document.getElementById('windowContainer');
       
       
       switch(id)
       {
           case 'StudentButton':
               ele.innerHTML = '<?php echo $dsp->showWindow('student');?>';
               break;
           case 'ClassesButton':
               ele.innerHTML = '<?php echo $dsp->showWindow('class');?>';

               break;
            case 'GradesButton':
               ele.innerHTML = '<?php echo $dsp->showWindow('grades');?>';
               break; 
            case 'FinancialAidButton':
               ele.innerHTML = '<?php echo $dsp->showWindow('financialAid');?>';
               break;   
       }
       
    }
    
    function getStudentRes()
    {
       
       var first = '<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['firstName'];?>';
       var last = '<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['lastName'];?>';
       var id = '<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['studentId'];?>';
       var class1 ='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][0]['courseName'];?>';
       var class1Grade='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][0]['currLettGrade'];?>';
      var class2 ='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][1]['courseName'];?>';
      var class2Grade='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][1]['currLettGrade'];?>';
      var class3 ='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][2]['courseName'];?>';
      var class3Grade='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][2]['currLettGrade'];?>';
      var class4 ='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][3]['courseName'];?>';
      var class4Grade='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['classes'][3]['currLettGrade'];?>';
      var tuitionOwed='<?php echo $std->search($_POST['fname'],$_POST['lname'],$_POST['ID'])['tuitionOwed'];?>';
       
       
       $(document).ready(function(){
               $('#frsName').attr('value',first); 
               $('#lstName').attr('value',last);
               $('#idBox').attr('value',id);
               $('#amountOwed').attr('value','$'+ tuitionOwed);
               $('#course1id').attr('value',class1);
               $('#course2id').attr('value',class2);
               $('#course3id').attr('value',class3);
               $('#course4id').attr('value',class4);
               $('#course1grades').attr('value',class1Grade);
               $('#course2grades').attr('value',class2Grade);
               $('#course3grades').attr('value',class3Grade);
               $('#course4grades').attr('value',class4Grade);
                 
                 
    });
    }
    
    function determineResSet(innpage)
    {
        switch(innpage)
        {
            case 'student':
                getStudentRes();
                break;
                
            case  'classes':
                getClassRes();
                break;
                
            case  'grades':
                getGradesRes();
                break;
                
            case 'faid':
                getFaidRes();
                break;
        }
    }
    
 
    
</script>