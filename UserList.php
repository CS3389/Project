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
             
                <td><a href="editUser.php">Edit</a> <input type="button" id="<?php echo $rowNum?>" value="Delete" onclick="postUsrId(this.id)"></td>
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

<script>
    function postUsrId(id)
    {
       
        
        
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "deleteUser.php";
    var usr = document.getElementById('UN-'+id).innerHTML; alert(usr);
    var vars = "userName="+usr;alert(vars);
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function()
    {
        alert(hr.readystate); alert(hr.status);
	    if(hr.readyState == 4 && hr.status == 200) 
            {
		    var return_data = hr.responseText;
			alert(hr.responseText);
                        window.location.reload();
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    }
</script>

