<?php
//User Credentials to be checked
$user_id = "Codespeedy";
$password = "User123";
//Key to decrypt
$key = "qwertyuiop"; 
//Comparing with our hashed data
if(md5(md5($user_id . $password) . $key)=='6193eccf4cd9fba9894f093ca103c3f7')
  echo "<br>Username:".$user_id."<br>Password:".$password;
?>