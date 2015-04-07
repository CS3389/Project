 <?php
        $connString = "mysql:host=localhost;dbname=TaylorU";
        $user ="root";
        $pass ="root";
        ?>
<!DOCTYPE html>

<html>
    <head>
        <title>User List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </heatd>
<body>
    <h1><img src="images/taylorUbanner.jpg" alt="Taylor University"></h1>   
  <?php
  
     //delete user by id(delete button)
    if(isset($_GET['delete_id']))
    {
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sql="DELETE FROM tayloru.user WHERE UsrID=".$_GET['delete_id'];
        $result = $pdo->query($sql);
        
    }
    
      //edit user by id(Edit button)
    if(isset($_GET['edit_id']))
    {
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sql="SELECT FROM tayloru.user WHERE UsrID=".$_GET['edit_id'];
        $result = $pdo->query($sql);
        
    }
    
   $pdo = new PDO($connString, $user, $pass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    $sql = "select * from user";
    $result = $pdo->query($sql); 
    
    ?>
    <table border="1">
    	<thead>
            <th>User Name</th>
            <th>Role</th>
        </thead>
        <tbody>
        	<?php $rowNum=0; while($val=$result->fetch()): ?>
            <tr>
                <?php $rowNum++; ?>
            	<td id="UN-<?php echo $rowNum; ?>"><?php echo $val['UsrName'];  ?></td>
                <td><?php echo $val['Role']; ?></td>
             
                <td> <a href="UserList.php?delete_id=<?php echo $val['UsrID']?>" 
                        onclick="return confirm('Are you sure you want to delete this user?'); " >
                        <button>Delete</button></a></td>
                <td> <a href="UserList.php?edit_id=<?php echo $val['UsrID']?>" 
                        onclick="return confirm('Are you sure you want to edit this user?'); " >
                        <button>Edit</button></a></td>
            </tr>
            <?php endwhile; ?>
            <tr>
            	<td><a href="addUser.php">Add New User</a></td>
            </tr>
        </tbody>
    </table>
    </div>

</body>
</html>
