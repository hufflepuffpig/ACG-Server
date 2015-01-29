<?php
	$username=$_GET['username'];
	$password=$_GET['password'];
	
	$dbc=mysqli_connect('localhost','root','root','appdb')
	or die('connect appdb failed');
	
	$query="SELECT * FROM usertable WHERE username='$username'";
	$result=mysqli_query($dbc,$query);
	if(mysqli_num_rows($result)!=0)
	{
		mysqli_close($dbc);
		echo "0";//This username has been registered
	}
	else
	{
		$query="INSERT INTO usertable(username,password) value('$username','$password')";
		mysqli_query($dbc,$query);
		mysqli_close($dbc);
		echo "1";//register success
	}
?>