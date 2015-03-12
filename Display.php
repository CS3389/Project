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
class Display {
    
    
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
        
            case 'FINANCIAL AID':
                return $this->generateFAIDMenu();
            break;
        
            case 'ACADEMIC FAC':
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
    
    function showWindow($str)
    {
        
        switch($str)
        {
            case 'student':
                return $this->generateWindow("StudentWindow.html");
                
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
