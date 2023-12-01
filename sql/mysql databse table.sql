
Create database taskapp;
use taskapp;

CREATE TABLE `User` (
    `UserID` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `UserName` VARCHAR(255) NOT NULL,
    `Name` VARCHAR(255) NOT NULL,
    `Password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `image` VARCHAR(100) NOT NULL
);

CREATE TABLE `User_Task` (
    `Task_Id` INT NOT NULL AUTO_INCREMENT,
    `UserID` int NOT NULL,
    `Type_Id` INT NOT NULL,
    `Task_Name` VARCHAR(255) NOT NULL,
    `Start_Date` DATE NOT NULL,
    `End_Date` DATE NOT NULL,
    `Status` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Task_Id`),
    FOREIGN KEY (`UserId`) REFERENCES `User` (`UserID`)
);

CREATE TABLE `Folder` (
    `FolderID` INT NOT NULL AUTO_INCREMENT,
    `UserID` int NOT NULL,
    `FolderName` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`FolderID`),
    FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`)
);

CREATE TABLE `Types` (
    `Type_Id` INT NOT NULL AUTO_INCREMENT,
    `Task_Type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Type_Id`)
);

-- This is an example table for tasks within folders.
CREATE TABLE `Folder_Task` (
    `Task_Id` INT NOT NULL,
    `FolderID` INT NOT NULL,
    PRIMARY KEY (`Task_Id`, `FolderID`),
    FOREIGN KEY (`Task_Id`) REFERENCES `User_Task` (`Task_Id`),
    FOREIGN KEY (`FolderID`) REFERENCES `Folder` (`FolderID`)
);
