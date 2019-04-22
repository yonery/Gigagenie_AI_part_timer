<?php

$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($conn, 'utf8');

$ordernum = $_POST["dno"];
//echo $_POST["no"];

$query = "SELECT * FROM comorder WHERE ordernum = '".$ordernum."'";
$result = mysqli_query($connect, $query);


if(mysqli_num_rows($result) == 1){
	$row = mysqli_fetch_array($result);
	$query = "DELETE FROM comorder WHERE ordernum = '".$ordernum."'";
	$result = mysqli_query($connect, $query);

	echo 'ok';
	//userid에 해당하는 손님에게 알림 보내기 
}
else{
	echo '1';
}

?>