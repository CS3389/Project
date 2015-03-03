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
                return generateAdvisorMenu();
            break;
        
            case 'STUDENT':
                return generateStudentMenu();
            break;
        
            case 'FINANCIAL AID':
                return generateFAIDMenu();
            break;
        
            case 'ACADEMIC FAC':
                return generateAcaFMenu();
            break;
        
            default:
                break;
        }
    }
    
    function generateAdminMenu()
    {
        return'<table id="MenuTable">'.$this->generateMenuRow('Student').$this->generateMenuRow('Classes')
                .$this->generateMenuRow('Grades').'</table>';
    }
    
    function generateMenuItem($str)
    {
        return '<div class="MenuItemClass"><button id="'.$str.'Button" class="menuButton" onClick="showSubWindow()">'.$str.'</button></div>';
    }
    
    function generateMenuRow($str)
    {
        return '<tr><td>'.$this->generateMenuItem($str).'</td></tr>';
    }
}
