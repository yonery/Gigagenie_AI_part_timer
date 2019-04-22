<?php

$predata = array();


$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');


$query="SELECT * FROM mainlist";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{		
	while($p = mysqli_fetch_assoc($result))
	{
		$predata[] = $p;
		
	}

}
echo json_encode(array('date' => '', 'data' => $predata));
?>