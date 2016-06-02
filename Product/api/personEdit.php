<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/person.php');

checkArgs()
$username=$_POST['username'];
unset($_POST['username']);
echo createUpdateQuery($_POST,$username,"username");

    function checkArgs(){
    	//Username
    	if(!isset($_POST['username'])|| !is_numeric($_POST['username'])){
    		echo "invalid user";
    	} //Name
    	else if{

    	}  //Addr
    	else if{

    	} //Nationality
    	else if{

    	}//PhoneNumber
    	else if{

    	} //NIF
   		 else if{

    	} //BirthData
   		 else if{

    	}  //Password
    	else if{

    	}
    
   
    
     
    
    
   
    } 
?>
