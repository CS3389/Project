-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tayloru
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema TaylorU
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema TaylorU
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TaylorU` ;
USE `TaylorU` ;

-- -----------------------------------------------------
-- Table `TaylorU`.`Major`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TaylorU`.`Major` (
  `majorId` INT(11) NOT NULL AUTO_INCREMENT,
  `majorName` VARCHAR(45) NOT NULL,
  `department` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`majorId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `TaylorU`.`MajorCourses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TaylorU`.`MajorCourses` (
  `majorID` INT(11) NOT NULL,
  `courseID` INT(11) NOT NULL,
  PRIMARY KEY (`majorID`, `courseID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `TaylorU`.`PreRec`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TaylorU`.`PreRec` (
  `courseID` VARCHAR(45) NOT NULL,
  `preRed` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`courseID`, `preRed`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `TaylorU`.`Schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TaylorU`.`Schedule` (
  `semesterId` INT(11) NOT NULL,
  `courseId` INT(11) NOT NULL,
  `day` VARCHAR(45) NOT NULL,
  `time` DATETIME NOT NULL,
  PRIMARY KEY (`semesterId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `TaylorU`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TaylorU`.`User` (
  `UsrID` INT(11) NOT NULL AUTO_INCREMENT,
  `UsrName` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Role` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`UsrID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
