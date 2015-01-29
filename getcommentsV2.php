<?php
	$news_id=$_GET['news_id'];
	$from=$_GET['from'];
	$now=0;
	$arr=array();
	
	$dbc=mysqli_connect('localhost','root','root','appdb')
	or die("connect appdb failed");
	$query="SELECT * FROM comments WHERE news_id=$news_id ORDER BY floor ASC";
	$result=mysqli_query($dbc,$query)
	or die("query failed");
	while($row=mysqli_fetch_array($result))
	{
		$now++;
		if($now<$from)
			continue;
		if($now>$from+10)
			break;
		else{
		$obj=new stdClass();
		$obj->news_id=$row['news_id'];
		$obj->nickname=$row['nickname'];
		$obj->comment=$row['comment'];
		$obj->floor=$row['floor'];
		array_push($arr,json_encode($obj));
		}
	}
	mysqli_close($dbc);
	echo "[";
	for($i=0;$i<count($arr);$i++)
	{
		echo $arr[$i];
		if($i<count($arr)-1)
			echo ",";
	}
	echo "]";
?>