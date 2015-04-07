<?php
  //edit user by id(Edit button)
    
        $connString = "mysql:host=localhost;dbname=TaylorU";
        $user ="root";
        $pass ="root";
        
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $UserID = $_GET['edit_id'];
        $sql="SELECT * FROM tayloru.user WHERE UsrID=".$UserID.";";
        $result = $pdo->query($sql);
        $val=$result->fetch();
    ?>
<html>
    <body>
        <h1><img src="images/taylorUbanner.jpg" alt="Taylor University"></h1>
        <form method='post' action='EditUserController.php?edit_id=<?php echo $UserID;?> border='0'>
            <legend> Update User Information</legend>
            
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type='text' name='username' value="<?php echo $val['UsrName'];?>" required /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type='text' name='password' value="<?php echo $val['Password'];?>"  required /></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td><input type='text' name='role' value="<?php echo $val['Role'];?>" required /></td>
                </tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save'>
  
                        <a href='UserList.php'>Back to the user list</a>
                    </td>
                </tr>
            </table>
        </form>
    </body> 
</html>