<?php
require_once('config.php');



if(isset($_POST)){


	 $fname = $_POST['fname'];
	 $email	= $_POST['email'];
	 $password = sha1($_POST['cpassword']);

	 $sql= "INSERT INTO user(email,fname,password) VALUES(?,?,?)";
	 $stminsert = $db->prepare($sql);
	 $result = $stminsert->execute([$email,$fname,$password]);
	 if($result){
		 echo 'successfully';
	 }else{
		 echo 'not saved';
	 }
	 
 }else{
 		echo 'no DATA';
 }


