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
                .$this->generateMenuRow('Grades').$this->generateMenuRow('FinancialAid').'</table>';
    }
    
    function generateMenuItem($str)
    {
        return '<div class="MenuItemClass"><button id="'.$str.'Button" class="menuButton" onClick="showSubWindow(this.id)">'.$str.'</button></div>';
    }
    
    function generateMenuRow($str)
    {
        return '<tr><td>'.$this->generateMenuItem($str).'</td></tr>';
    }
    
    function generateStudentWindow()
    {
        return include '';
    }
    
    function showWindow($str)
    {
        
        switch($str)
        {
            case 'StudentButton':
                return generateStudentWindow();
                
            case 'GradesButton':
                return generateGradesWindow();
                
            case 'FinancialAidButton':
                return generateFinancialAidWindow();
                
            case 'ClassButton':
                return generateClassWindow();
                
            default:
                break;
        }
    }
    
}
