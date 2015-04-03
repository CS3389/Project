<?php

/**
 * Student.php
 * @author johncochran
 * Created 24 February 2015
 */

class Student 
{
    
        private $firstName;
        private $lastName;
        private $dob;
        private $address;
        private $gender;
        private $actScore;
        private $phoneNum;
        private $highSchoolAtt;
        private $highSchoolGrad;
        private $highSchoolGPA;
        private $otherCollegeAtt;
        private $major;
        private $minor;
        
        private $currGPA;
        private $classification;

     

        
    public function __construct($fName, $lName, $dateOB, $addr, $gen, $phone, $actscr,
                         $hs="None", $hsGrad="N/A", $hsGPA="N/A",
                         $otherCol="None", $maj="Undecided", $min="Undecided") 
    {
        $this->setFirstName($fName);
        $this->setLastNAme($lName);
        $this->setDOB($dateOB);
        $this->setAddress($addr);
        $this->setGender($gen);
        $this->setACT($actscr);
        $this->setPhoneNum($phone);
        $this->setHighSchoolAtt($hs);
        $this->setHighSchoolGrad($hsGrad);
        $this->setHighSchoolGPA($hsGPA);
        $this->setOtherCollegeAtt($otherCol);
        $this->setMajor($maj);
        $this->setMinor($min);


    }// end constructor
    
    // get functions
    public function getFirstName(){return $this->firstName;}
    public function getLastName(){return $this->lastName;}
    public function getDOB(){return $this->dob;}
    public function getAddress(){return $this->address;}
    public function getGender(){return $this->gender;}
    public function getACT(){return $this->actScore;}
    public function getphoneNum(){return $this->phoneNum;}
    public function getHighSchoolAtt(){return $this->highSchoolAtt;}
    public function getHighSchoolGrad(){return $this->highSchoolGrad;}
    public function getHighSchoolGPA(){return $this->highSchoolGPA;}
    public function getOtherCollegeAtt(){return $this->otherCollegeAtt;}
    public function getMajor(){return $this->major;}
    public function getMinor(){return $this->minor;}
    public function getName(){return $this->firstName.' '.$this->lastName;}
    
    public function getCurrGPA(){return $this->currGPA;}
    public function getClassification(){return $this->classification;}
    
    
    //set functions
    public function setFirstName($firstName){$this->firstName=$firstName;}
    public function setLastNAme($lastName){$this->lastName=$lastName;}
    public function setDOB($dob){$this->dob=$dob;}
    public function setAddress($address){$this->address=$address;}
    public function setGender($gender){$this->gender=$gender;}
    public function setACT($act){$this->actScore=$act;}
    public function setPhoneNum($phone){$this->phoneNum=$phone;}
    public function setHighSchoolAtt($hsAtt){$this->highSchoolAtt=$hsAtt;}
    public function setHighSchoolGrad($hsGrad){$this->highSchoolGrad=$hsGrad;}
    public function setHighSchoolGPA($hsGPA){$this->highSchoolGPA=$hsGPA;}
    public function setOtherCollegeAtt($otherCol){$this->otherCollegeAtt=$otherCol;}
    public function setMajor($maj){$this->major=$maj;}
    public function setMinor($min){$this->minor=$min;}
    
    public function setCurrGPA($gpa){$this->currGPA=$gpa;}
    public function setClassification($class){$this->classification=$class;}
    
    // Insert application into database
    function apply()
    {
        date_default_timezone_set('America/Chicago');
        $date = date('m-d-Y H:i:s');
        
        $user = 'root';
        $password = 'root';
        $db = "TaylorU";
        $host = 'localhost';
        $port = 3306; 
        
        $conn ="mysql:host=localhost;dbname=TaylorU";
        $pdo = new PDO($conn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        
        $sql = "INSERT INTO ".$db.".Application (firstName, lastName, "
                . "dob, address, gender, actScore, phoneNumber, highSchoolAtt, "
                . "highSchoolGrad, highSchoolGPA, otherCollegeAtt, major, "
                . "minor, submissionDate) VALUES('".$this->firstName."', '".$this->lastName."', "
                . " '".$this->dob."', '".$this->address."', '".$this->gender."', '".$this->actScore."', '".$this->phoneNum."',"
                . " '".$this->highSchoolAtt."', '".$this->highSchoolGrad."', '".$this->highSchoolGPA."',"
                . " '".$this->otherCollegeAtt."', '".$this->major."', '".$this->minor."', "
                . " '".$date."');";
     
        $pdo->exec($sql);
        mysql_close($pdo);
       
        
        // Notify admin of new application?
        
    }// end function apply()
    
    function approve()
    {
        // creates Student Id
        // transfers data from Application table to Student table
        // deletes corresponding row from Application table?
        
    }// end function approve()
    
    function createUser()
    {
         // creates USER with Student role
        
    }// end function createUser()
    
    function search($first, $last, $id)
    {
        $user = 'root';
        $password = 'root';
        $db = "TaylorU";
        $host = 'localhost';
        $port = 3306; 
        
        $conn ="mysql:host=localhost;dbname=TaylorU";
        $pdo = new PDO($conn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="";
        
        if(strlen($id) !== 0)
        {
             $sql = "Select * from ".$db.".Student WHERE Student.studentId =".$id.";";
        }
        else if(strlen($first) !== 0 && count($last) !== 0)
       {
           
           $sql = "Select * from ".$db.".Student WHERE Student.firstName ='".$first."' AND ".
                   "Student.lastName='".$last."';";
       }
 else {
          return "INVALID SEARCH CRITERA"; 
       }
       
           
        
       $result = $pdo->query($sql);
       $row = $result->fetch();
       $row['classes'] = $this->getClasses($row['studentId']);
       
       return $row;
    }
    
    function getClasses($studID)
    {
        $user = 'root';
        $password = 'root';
        $db = "TaylorU";
        $host = 'localhost';
        $port = 3306; 
        
        $conn ="mysql:host=localhost;dbname=TaylorU";
        $pdo = new PDO($conn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "Select * from ".$db.".Schedule WHERE Schedule.studId =".$studID.";";
        
        $result = $pdo->query($sql);
       $resArray = $result->fetchAll();
       
        return $resArray;
    }
    
    
    
    
    
    
   
}// end class Student
