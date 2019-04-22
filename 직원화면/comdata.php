<?php
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');

$comdata = array();

//echo "hi".$ordernum;

$query = "SELECT * FROM comorder";
$res = mysqli_query($connect, $query);

if(mysqli_num_rows($res) > 0)
{		
	while($v = mysqli_fetch_assoc($res))
	{
		$comdata[] = $v;
		
	}
	
}
echo json_encode($comdata);
?>