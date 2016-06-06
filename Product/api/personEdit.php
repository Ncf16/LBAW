<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/person.php');
checkArgs();
$username=$_POST['username'];
unset($_POST['username']);
echo createUpdateQuery($_POST,$username,"username");

    function checkArgs(){
    	   $phonePattern = '/^[0-9]*$/';
    	  $nifPattern = '/^\d{9}$/'; 
         preg_match($nifPattern, $_POST['nif'],$nifMatch);
           
         preg_match($phonePattern, $_POST['phonenumber'],$phoneMatch);
    	//Username
    	 if(!isset($_POST['username'])|| empty($_POST['username']) || !is_numeric($_POST['username']) || 
            ($_POST['username'] !== $_SESSION['username']  && $_SESSION['account_type'] != "Admin")){
    		echo  " Invalid user";
            exit;
    	} //Name
    	else if(!isset($_POST['name'])|| empty($_POST['name']) ){
    		echo  " Please check the Name";
             exit;
    	}  //Addr
    	else if(!isset($_POST['address'])|| empty($_POST['address']) ){
    		echo " Please check the Address";
             exit;
    	} //Nationality
    	else if(!isset($_POST['nationality'])|| empty($_POST['nationality']) ){
    		echo " Please check the Nationality";
             exit;
    	}//PhoneNumber
    	else if(!isset($_POST['phonenumber'])|| empty($_POST['phonenumber']) || sizeof($phoneMatch) !=1){
    		echo " Please check the PhoneNumber";
             exit;
    	} //NIF
   		 else if(!isset($_POST['nif'])|| empty($_POST['nif']) || sizeof($nifMatch) !=1) {
   		 	echo " Please check NIF";

    	} //BirthDate
   		 else if(!isset($_POST['nif'])|| empty($_POST['nif'])) {
   		 	echo " Please check the BirthDate";
             exit;
    	}  //Password 
    } 

 
?>
