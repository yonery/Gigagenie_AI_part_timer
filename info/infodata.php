<?php
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');

$infodata = array();

//echo "hi".$ordernum;

$query = "SELECT * FROM information";
$res = mysqli_query($connect, $query);

if(mysqli_num_rows($res) > 0)
{		
	while($v = mysqli_fetch_assoc($res))
	{
		$infodata[] = $v;
		
	}
	
}
echo json_encode($infodata);
?>