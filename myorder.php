<?php


$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');

$myid = $_POST["myid"];


$query = "SELECT * FROM comorder WHERE ID='".$myid."'";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0){
	echo '1';
}
else{
	echo $myid;	
}
?>