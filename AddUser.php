

<html>
    <body>
        <h1><img src="images/taylorUbanner.jpg" alt="Taylor University"></h1>
        <form method='post' action='UserController.php'  border='0'>
            <legend>New User Information</legend>
            
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type='text' name='username' required /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type='text' name='password' required /></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td><input type='text' name='role' required /></td>
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
