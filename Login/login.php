<?php
ob_start();
session_start();

$userName = strtolower($_POST['usr']);
$pswd = $_POST['pswd'];
$user = 'root';
$password = 'root';
$db = "TaylorU";
$host = 'localhost';
$port = 3306;
$loginDest = 'http://localhost:8888/Project/dashboard.php';
$attempt = 1;

$conn ="mysql:host=localhost;dbname=TaylorU";

try{
                
                
                $pdo = new PDO($conn, $user,$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "select * from ".$db.".User where User.UsrName = '".$userName."';";
                $result = $pdo->query($sql);
                if($result->rowCount() == 0){
                    
                    header('Location: login.html?attempt='.$attempt);
                    
                    
                }
                
                While($row = $result->fetch())
                {
                    if($row['Password']==$pswd)
                    {
                        session_regenerate_id();
                        $_SESSION['sess_user_id'] = $row['UsrID'];
                        $_SESSION['sess_username'] = $row['UsrName'];
                        $_SESSION['usr_role'] = $row['Role'];
                        session_write_close();
                        header('Location: '.$loginDest);
                        
                    }
                    else
                    {
                        header('Location: login.html?attempt='.$attempt);
                        
                    }
                }
                
            } catch (Exception $ex) {
                
                echo($e->getMessage());

            }