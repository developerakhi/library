<?php

include "dbconnect.php";
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($_POST['password']);
//User Credentials to be checked
/*
$user_id = "4";
$password = "12345";
//Key to decrypt
$key = "$1pUL5PdgUSTY
"; 
//Comparing with our hashed data
if(md5(md5($user_id . $password) . $key)=='$1pUL5PdgUSTY
')
  echo "<br>Username:".$user_id."<br>Password:".$password;
$pwd = $_POST['password'];
  if(CRYPT_MD5 == 1) {
      $encrypted_pwd = crypt($pwd, '$123456$hrd$reer');
  }
  $insert = "INSERT INTO  users (user_id, username, password) 
		  VALUES('', '$username', '$encrypted_pwd')";
  if($connection->query($insert)){
	echo 'Data inserted successfully';
  }
  else{
	echo 'Error '.$connection->error;  
  }
  //User Credentials to be checked
$user_id = "4";
$password = "123456";
//Key to decrypt
$key = "$1pUL5PdgUSTY
"; 
//Comparing with our hashed data
if(md5(md5($user_id . $password) . $key)=='$1pUL5PdgUSTY
')
  echo "<br>Username:".$user_id."<br>Password:".$password;
  */
$publish = "on";


if( (empty($username)) OR (empty($password)) )
{
	
	header ('Location: login.php?success=4');
	exit();
}


		if($publish=="on")
		{
			
			$sql = "SELECT * FROM users where  username='$username' AND   password='$password'";  
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			$user_type = $row['user_type'];
			$active_info = $row['active_info'];
		}

	if($row)
	{
			
					
								session_cache_limiter(FALSE);
								session_start(); 
								$_SESSION['username']=$_POST['username'];
			
			
								//header ('Location: main.php');
								
								?>
								<?php
								if($active_info=="1")
								{
								?>
								<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">
								<?php 
								}
								else
								if($active_info=="0")
								{
								?>
								<meta HTTP-EQUIV="REFRESH" content="0; url=login.php?success=5">
								<?php
								}
								?>

					
								
	<?php							
	exit();
	}
	
	
	else 
	{
 	header ('Location: login.php?success=2');
	exit();
	}

?>