<?php

session_start();
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($conn, 'utf8');

$userid = $_POST["userid"];
	if(!$userid)
	{
		//제대로 된 id값을 받아오지 못 함 
		echo '1';
	}
	else
	{
		$userid = mysqli_real_escape_string($connect, $userid);

		
		$query = "SELECT * FROM customer WHERE id = '".$userid."'";
		$result = mysqli_query($connect, $query);

		//해당 값이 1개이상 존재 
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_array($result);
			$query = "INSERT INTO tmplist (ID) values ('".$userid."')";
			$result = mysqli_query($connect, $query);
			//세션 설정
			$_SESSION["id"] = $row["id"];
//			$_SESSION["name"] = $row["name"];
			$_SESSION["status"] = 1;
			echo '2';
		}
		else
		{
			//회원 데이터 존재하지 않음
			echo '3';
		}

	}

?>
