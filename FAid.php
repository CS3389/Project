<?php
session_start();

/**
 * Description of FAid
 *
 * @author SirJared
 */



class FAid 
{
       
        private $pdo;
        private $user = 'root';
        private $password = 'root';
        private $db = "TaylorU";
        private $host = 'localhost';
        private $port = 3306; 
        private $conn ="mysql:host=localhost;dbname=TaylorU";
        
        
         public function __construct()
         {
             $this->pdo = new PDO($this->conn, $this->user, $this->password);
             $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
         }
         
         
         
    /*
     * created by nick palmer query the DB for a student
     * and return a stuend object
     */
    
    function search($id,$fname,$lname)
    {
        if($id!=null)
        {
            $sql = 'SELECT from'.$db.'student WHERE student.studentId ='.$id;
           $result = $this->pdo->query($sql);
           $row = $result->fetch();
           $_SESSION['result'] = Student($row['studentFName'],$row['studentLName'],0,0,0,0);
        }
        else if($fname != null && $lname != null)
        {
             $sql = 'SELECT from'.$db.'student WHERE student.studentFName ='.$fname.' AND '.
                   'student.studentLName ='.$lname;
           $result = $this->pdo->query($sql);
           $row = $result->fetch();
           
           if($result->rowCount() > 1)
           {
               $_SESSION['result'] = 'Duplicate rows found';
           }
           else if($result === false || $result->rowCount() === 0)
           {
               $_SESSION['result'] = 'NO ROWS FOUND';
           }
           else
           {
               $_SESSION['result'] = Student($row['studentFName'],$row['studentLName'],0,0,0,0);
           }
        }
        else
        {
            return "";
        }
    }
}


$FAid = new FAid();

$studId = $_POST['ID'];
$studFName = $_POST['fname'];
$studLName = $_POST['lname'];

$FAid->search($studId, $studFName,$studLName);
