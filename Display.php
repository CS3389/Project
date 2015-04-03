<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Display
 *
 * @author SirJared
 */



include "User.php";




class Display {
    private $usr;
    
   function __construct()
   {
       $this->usr = new User($_SESSION["session_username"],null,$_SESSION["usr_role"]);
       
   }
    
    function displayMenu($role)
    {
        switch($role)
        {
            case 'admin':
               return $this->generateAdminMenu();
            break;
        
            case 'ADVISOR':
                return $this->generateAdvisorMenu();
            break;
        
            case 'STUDENT':
                return $this->generateStudentMenu();
            break;
        
            case 'FINANCIAL':
                return $this->generateFAIDMenu();
            break;
        
            case 'ACADEMIC':
                return $this->generateAcaFMenu();
            break;
        
            default:
                break;
        }
    }
    
    private function generateAdminMenu()
    {
        return'<table id="MenuTable">'.$this->generateMenuRow('Student').$this->generateMenuRow('Classes')
                .$this->generateMenuRow('Grades').$this->generateMenuRow('FinancialAid').'</table>';
    }
    
    private function generateStudentMenu()
    {
        return'<table id="MenuTable">'.$this->generateMenuRow('Student').$this->generateMenuRow('Classes')
                .$this->generateMenuRow('Grades').$this->generateMenuRow('FinancialAid').'</table>';
    }
    
    private function generateFAIDMenu()
    {
        return'<table id="MenuTable">'.$this->generateMenuRow('Student').$this->generateMenuRow('Classes')
                .$this->generateMenuRow('Grades').$this->generateMenuRow('FinancialAid').'</table>';
    }
    
    private function generateAdvisorMenu()
    {
        return'<table id="MenuTable">'.$this->generateMenuRow('Student').$this->generateMenuRow('Classes')
                .$this->generateMenuRow('Grades').$this->generateMenuRow('FinancialAid').'</table>';
    }
    
    private function generateAcaFMenu()
    {
        return'<table id="MenuTable">'.$this->generateMenuRow('Student').$this->generateMenuRow('Classes')
                .$this->generateMenuRow('Grades').$this->generateMenuRow('FinancialAid').'</table>';
    }
    
    
    
    private function generateMenuItem($str)
    {
        return '<div class="MenuItemClass"><button id="'.$str.'Button" class="menuButton" onClick="showSubWindow(this.id)">'.$str.'</button></div>';
    }
    
    private function generateMenuRow($str)
    {
        return '<tr><td>'.$this->generateMenuItem($str).'</td></tr>';
    }
    
    private function generateWindow($filename)
    {
        $filename = "templates/".$filename;
        $handle = fopen($filename, "r");
        // Retrieve the content of HTML file, and stocks it into $contents var
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        $output = str_replace(array("\r\n", "\r", "\n", "\s", "\t", "\0", "\x0B"), "", $contents);
        return $output;
    }
    
    private function generateStudentWindow()
    {
        
        $submit='';
        
        $output = '<div id="studentContainer"><div class="searchCluster"><div>'.
            '<form id="searchForm" action="dashboard.php?innPage=student" method="post">'.
            '<div class="LabelDiv"><label class="label">Student First Name:</label>'.
             '</div><div class="inputDiv"><input type="text" name="fname" id="fname">'.
              '</div><div class="LabelDiv"><label class="label">Student Last Name:</label>'.
              '</div><div class="inputDiv"><input type="text" name="lname" id="lname">'.
               '</div><div class="LabelDiv"><label class="label">Student ID:</label></div>'.
               '<div class="inputDiv"><input type="text" name="ID" id="studId"></div>'.
                '<input class="submit" type="submit"  value="submit"></form></div><div>'.
                '<div id="resContainer"><div class="resultsFieldGroup">';
        $output.='<form action="editStudentTables.php" method="POST">';
        if($this->usr->isAuthorizdToEdit('studentDem'))
        {
            $submit='<input type="submit" id="submitButton" value="Submit Changes">';
            $output.='<label class="label">Student First Name:</label>'.
                    '<input id="frsName" name="frsName" type="text" >'.
                    '<label class="label">Student Last Name:</label>'.
                        '<input id="lstName" name="lstName" type="text" >'.
                    '<label class="label">Student ID:</label>'.
                       ' <input id="idBox" name="idBox" type="text" ><br/><br/>';
        }
        else
        {
             //$submit='<input type="submit" id="submitButton" value="Submit Changes">';
            $output.='<label class="label">Student First Name:</label>'.
                    '<input id="frsName" name="frsName" type="text" disabled >'.
                    '<label class="label">Student Last Name:</label>'.
                        '<input id="lstName" name="lstName" type="text" disabled >'.
                    '<label class="label">Student ID:</label>'.
                        '<input id="idBox" name="idBox" type="text" disabled><br/><br/>';
        }
        $output.='</div><div class="resultsFieldGroup"><div class="labelDiv"><label class="label">Schedule</label>'.
                '<div id="gradesLabel"><label class="label">Grades</label></div></div><ul>';
        if($this->usr->isAuthorizdToEdit('courses'))
        {
             $submit='<input type="submit" id="submitButton" value="Submit Changes">';
            $gradesDisabled="";
            if(!$this->usr->isAuthorizdToEdit('Grades'))
            {
                $gradesDisabled =' disabled';
            }
            $output.='<li id="class1"><input id="course1id" type="text" name="course1id" ><input id="course1grades"'.
                   ' type="text" name="course1grades" '.$gradesDisabled.' ></li><br/>'.
                   '<li id="class2"><input id="course2id" type="text" name="course2id" ><input id="course2grades"'.
                   ' type="text" name="course2grades" '.$gradesDisabled.' ></li><br/>'.
                   '<li id="class3"><input id="course3id" type="text" name="course3id" ><input id="course3grades"'.
                   ' type="text" name="course3grades" '.$gradesDisabled.' ></li><br/>'.
                    '<li id="class4"><input id="course4id" type="text" name="course4id" ><input id="course4grades"'.
                   ' type="text" name="course4grades" '.$gradesDisabled.' ></li><br/>'; 
        }
        else 
        {
            $gradesDisabled="";
            if(!$this->usr->isAuthorizdToEdit('Grades'))
            {
                $gradesDisabled =' disabled';
            }
           $output.='<li id="class1"><input id="course1id" type="text" name="course1id" disabled><input id="course1grades"'.
                   ' type="text" name="course1grades" '.$gradesDisabled.'></li><br/>'.
                   '<li id="class2"><input id="course2id" type="text" name="course2id" disabled><input id="course2grades"'.
                   ' type="text" name="course2grades" '.$gradesDisabled.'></li><br/>'.
                   '<li id="class3"><input id="course3id" type="text" name="course3id" disabled><input id="course3grades"'.
                   ' type="text" name="course3grades" '.$gradesDisabled.'></li><br/>'.
                    '<li id="class4"><input id="course4id" type="text" name="course4id" disabled><input id="course4grades"'.
                   ' type="text" name="course4grades" '.$gradesDisabled.'></li><br/>'; 
        }
        $output.='</ul></div><div class="tuitionBox"><label class="label">Tuition Owed:</label>';
        if($this->usr->isAuthorizdToEdit('Finance'))
        {
             $submit='<input type="submit" id="submitButton" value="Submit Changes">';
            $output.='<input type="text" id="amountOwed" name="studentTuition">';
        }
   else {
             $output.='<input type="text" id="amountOwed" name="studentTuition" disabled>';
        }
        $output.='</div>';
        $output.='</div></div>'.$submit.'</form>';
        return $output;
    }
    
    function showWindow($str)
    {
        
        switch($str)
        {
            case 'student':
                return $this->generateStudentWindow();
                
            case 'grades':
                return $this->generateWindow("GradesWindow.html");
                
            case 'financialAid':
                return $this->generateWindow("FinAidWindow.html");
                
            case 'class':
                return $this->generateWindow("ClassWindow.html");
                
            default:
                break;
        }
    }
    
}
