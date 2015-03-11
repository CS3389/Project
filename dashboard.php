<?php
//Start session
session_start();
require 'Display.php';
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="Login/Login.css" type="text/css"/>
<link rel='stylesheet' href='dashboard.css' type='text/css'/>
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
            <div id="menuContainer">
                <?php echo $dsp->displayMenu($_SESSION['usr_role']);?>
            </div>
            <div id="windowContainer">
                
            </div>
        </div>
    </div>
</body>
</html>

<script>
    
    function showSubWindow(id)
    {
        document.getElementById('windowContainer').innerHTML = "<div style='color:white'>test</div>";
    }
    
</script>