<?php

class User
{
   private $username;
   private $password;
   private $role;
   
   public function __construct($uName,$pass,$r) 
   {
       $this->setUsername($uName);
       $this->setPassword($pass);
       $this->setRole($r);
       
   }
   
   public function getUsername(){return $this->username;}
   public function getPassword(){return $this->password;}
   public function getRole(){return $this->role;}
   
   public function setUsername($username){$this->username=$username;}
   public function setPassword($password){$this->password=$password;}
   public function setRole($role){$this->role=$role;}
   
  function saveUser()
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
    

  }
}
?>