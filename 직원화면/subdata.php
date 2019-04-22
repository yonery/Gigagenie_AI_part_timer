<?php
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($conn, 'utf8');


$ordernum = $_POST["no"];
$subdata = array();

//echo "hi".$ordernum;

$query = "SELECT * FROM sublist  WHERE ordernum = '".$ordernum."'";
$res = mysqli_query($connect, $query);

if(mysqli_num_rows($res) > 0)
{		
	while($v = mysqli_fetch_assoc($res))
	{
		$subdata[] = $v;
		
	}
	
}
echo json_encode($subdata);
?>