<?php

class User
{
   private $username;
   private $password;
   private $role;
   
   public function __construct($uName,$pass,$r) 
   {
       $this->setUsername($uName);
       
       //if($pass !== NULL)
       $this->setPassword($pass);//}
      // else{$this->password = NULL;}
       $this->setRole($r);
       
   }
   
   public function getUsername(){return $this->username;}
   public function getPassword(){return $this->password;}
   public function getRole(){return $this->role;}
   
   public function setUsername($username){$this->username=$username;}
   public function setPassword($password){$this->password=$password;}
   public function setRole($role){$this->role=$role;}
   
  function saveNewUser()
  {
    try{
    $user = 'root';
    $password = 'root';
    $db = "TaylorU";
    $host = 'localhost';
    $port = 3306; 

    $conn ="mysql:host=localhost;dbname=TaylorU";
    $pdo = new PDO($conn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO ".$db.".User (usrname,password,role)"
            . " VALUES('".$this->username."', '".$this->password."', "
                . " '".$this->role."');";
    $pdo->exec($sql);
    echo"user added succesfully!";
    echo "<a href='UserList.php'>Back to the user list</a>";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    //need to fix!
    function UpdateUser()
  {
    try{
    $user = 'root';
    $password = 'root';
    $db = "TaylorU";
    $host = 'localhost';
    $port = 3306; 

    $conn ="mysql:host=localhost;dbname=TaylorU";
    $pdo = new PDO($conn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "UPDATE ".$db.".User
           SET usrname=$this->username, password=$this->password,
               role=$this->role
            WHERE UsrID=$_POST(edit_id);";
    $pdo->exec($sql);
    echo"user added succesfully!";
    echo "<a href='UserList.php'>Back to the user list</a>";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

  }
  
  
        function isAuthorizdToEdit($field)
        {
            $role = $_SESSION['usr_role'];
            
            switch($field)
            {
                case 'studentDem':
                   switch($role)
                    {
                        case 'ADMINISTRATOR':
                           return true;

                        case 'ADVISOR':
                            return true;

                        case 'STUDENT':
                            return false;

                        case 'FINANCIAL':
                            return false;

                        case 'ACADEMIC':
                            return false;

                    }
                    break;
                
                case 'Finance':
                    switch($role)
                    {
                        case 'ADMINISTRATOR':
                           return true;

                        case 'ADVISOR':
                            return false;

                        case 'STUDENT':
                            return false;

                        case 'FINANCIAL':
                            return true;

                        case 'ACADEMIC':
                            return false;

                    }
                    break;
                
                case 'Grades':
                    switch($role)
                    {
                        case 'ADMINISTRATOR':
                           return true;

                        case 'ADVISOR':
                            return false;

                        case 'STUDENT':
                            return false;

                        case 'FINANCIAL':
                            return false;

                        case 'ACADEMIC':
                            return true;

                    }
                    break;
                
                case 'courses':
                    switch($role)
                    {
                        case 'ADMINISTRATOR':
                           return true;

                        case 'ADVISOR':
                            return false;

                        case 'STUDENT':
                            return false;

                        case 'FINANCIAL':
                            return false;

                        case 'ACADEMIC':
                            return false;

                    }
                    break;
                
                case 'schedule':
                    switch($role)
                    {
                        case 'ADMINISTRATOR':
                           return true;

                        case 'ADVISOR':
                            return true;

                        case 'STUDENT':
                            return false;

                        case 'FINANCIAL':
                            return false;

                        case 'ACADEMIC':
                            return false;

                    }
                    break;
                
                
            }
            

        }

}
}