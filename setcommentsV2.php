<?php
	$news_id=$_GET['news_id'];
	$nickname=$_GET['nickname'];
	$comment=$_GET['comment'];
	$floor=$_GET['floor'];
	
	$dbc=mysqli_connect('localhost','root','root','appdb')
	or die("appdb connect failed");
	$query="INSERT INTO comments(`news_id`, `nickname`, `comment`, `floor`) VALUES ($news_id,'$nickname','$comment',$floor)";
	$result=mysqli_query($dbc,$query) or die("INSERT failed");
	$floor++;
	$query="UPDATE comicnews SET curfloor=$floor WHERE id=$news_id";
	$result=mysqli_query($dbc,$query) or die("UPDATE failed");
	mysqli_close($dbc);
?>