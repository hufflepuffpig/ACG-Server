<?php
	$username=$_GET['username'];
	$password=$_GET['password'];
	
	$dbc=mysqli_connect('localhost','root','root','appdb')
	or die("connect appdb failed");
	
	$query="SELECT * FROM usertable WHERE username='$username'";
	$result=mysqli_query($dbc,$query);
	if(mysqli_num_rows($result)==0)
	{
		mysqli_close($dbc);
		echo "3";//no this username
	}
	else
	{
		$row=mysqli_fetch_array($result);
		if($password==$row['password'])
		{
			echo "1";//login success
		}
		else
		{
			echo "2";//password is wrong
		}
	}
?>