<?php

session_start();
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($conn, 'utf8');

$tmenu = $_POST["menu"];
$tcnt = $_POST["cnt"];
$tadd = $_POST["add"];

/*
//제대로 된 id값을 받아오지 못 함 
if(!$tmenu || !$tcnt || !$tadd)
{
	echo '1';
}

$tmenu = mysqli_real_escape_string($connect, $tmenu);
$tcnt = mysqli_real_escape_string($connect, $tcnt);
$tadd = mysqli_real_escape_string($connect, $taa);

*/

//주문이 끝났을 경우 
if(strcmp($tmenu, "end")==0){
	$_SESSION["status"] = 2;
	echo '3';
}

else{
	$menuquery = "SELECT * FROM menu WHERE menu ='".$tmenu."'";
	$menuresult = mysqli_query($connect, $menuquery);

	//메뉴 상에 존재하지 않음 
	if(mysqli_num_rows($menuresult) != 1){
		echo '4';
	}
	//메뉴 존재 
	else{
		$row = mysqli_fetch_array($menuresult);
		$price = $row["price"] * $tcnt;
		$query = "SELECT * FROM tmplist WHERE menu = '".$tmenu."'";
		$result = mysqli_query($connect, $query);

		//tmplist에 존재 
		if(mysqli_num_rows($result) > 0)
		{
			//할당은 0 , 추가는 1 
			if($tadd > 0){
				$update = "UPDATE tmplist SET cnt=cnt+$tcnt WHERE menu = '".$tmenu."'";
				mysqli_query($connect, $update);
				$update2 = "UPDATE tmplist SET price=price+$price WHERE menu = '".$tmenu."'";
				mysqli_query($connect, $update2);

//				echo '2';
			}
			else{
				$update = "UPDATE tmplist SET cnt= $tcnt WHERE menu = '".$tmenu."'";
				mysqli_query($connect, $update);
				$update2 = "UPDATE tmplist SET price=$price WHERE menu = '".$tmenu."'";
				mysqli_query($connect, $update2);

//				echo '2';			
			}
		}
		//tmplist에 없음
		else
		{
			$menuquery = "SELECT * FROM menu WHERE menu ='".$tmenu."'";
			$resultmenu = mysqli_query($connect, $menuquery);
			$row = mysqli_fetch_array($resultmenu);
			$addquery = "INSERT INTO tmplist ( menu, cnt, price) VALUES ('".$row["menu"]."' , '".$tcnt."' , '".$price."')";
			mysqli_query($connect, $addquery);

//			echo '2';
		}
		echo '2';
	}

}
	
?>