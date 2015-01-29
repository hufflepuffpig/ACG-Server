<?php
	$from=$_GET['from'];
	$now=0;
	$arr=array();
	$dbc=mysqli_connect('localhost','root','root','appdb')
	or die("connect failed");
	
	$query="SELECT * FROM comicnews ORDER BY time DESC";
	
	$result=mysqli_query($dbc,$query)
	or die("query failed");
	
	while($row=mysqli_fetch_array($result))
	{
		$now++;
		if($now<$from)
			continue;
		if($now>$from+3)
			break;
		else
		{
			$obj=new stdClass();
			$obj->id=$row['id'];
			$obj->img=$row['img'];
			$obj->heading=$row['heading'];
			$obj->texting=$row['texting'];
			$obj->link=$row['link'];
			$obj->curfloor=$row['curfloor'];
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
