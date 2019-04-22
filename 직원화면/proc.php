<?php

if(!$_GET['date'])
{
	$_GET['date'] = date("Y-m-d H:i:s");
}


$data = array();
$date = $_GET['date'];


$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');

for($i=0; $i<80; $i++)
{
	$query="SELECT * FROM mainlist WHERE orderdate > '".$_GET['date']."'";
	$res = mysqli_query($connect, $query);

	if(mysqli_num_rows($res) > 0)
	{		
		while($v = mysqli_fetch_assoc($res))
		{
			$data[] = $v;
			$date = $v["orderdate"];
		}
		
		break;


	}
	
	usleep(250000);
}

echo json_encode(array('date' => $date, 'data' => $data));
?>