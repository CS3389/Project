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
    </head>
<body>
    <h1><img src="/images/taylorUbanner.jpg" alt="Taylor University"></h1>        
  <?php
   $pdo = new PDO($connString, $user, $pass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    $sql = "select * from user";
    $result = $pdo->query($sql); 
    
    ?>
    <table>
    	<thead>
            <th>User Name</th>
            <th>Role</th>
        </thead>
        <tbody>
        	<?php while($val=$result->fetch()): ?>
            <tr>
                
            	<td><?php echo $val['UsrName'];  ?></td>
                <td><?php echo $val['Role']; ?></td>
             
                <td><a href="editUser.php">Edit</a> <a href="deleteUser.php">Delete</a></td>
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

