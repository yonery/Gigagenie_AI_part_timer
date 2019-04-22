<?php

session_start();
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');

if(isset($_SESSION["id"]))
{

	$time = date("Y-m-d H:i:s");
	$total = 0;

	$query = "SELECT * FROM mainlist";
	$result = mysqli_query($connect, $query);
	$ordernum = mysqli_num_rows($result) + 1;
	mysqli_free_result($result);

	$query = "SELECT * FROM tmplist";
	$result = mysqli_query($connect, $query);
	$content = "";
	$etc = "";

	if($result){

//		echo "total number : ". mysqli_num_rows($result)."<Br>";
		while($row = mysqli_fetch_assoc($result)){
//			$content += $row["menu"]. ", ";
			$total += $row["price"];
			$content = $content.$row["menu"];
			$content = $content."(".$row["cnt"].")"." ";
			$subquery = "INSERT INTO sublist ( ordernum, menu, cnt, price, etc) VALUES ('".$ordernum."' , '".$row["menu"]."' , '".$row["cnt"]."', '".$row["price"]."', '".$etc."')";
			mysqli_query($connect, $subquery);

			$allquery = "INSERT INTO allorder ( orderdate, menu, cnt, ID, price) VALUES ('".$time."' , '".$row["menu"]."','".$row["cnt"]."', '".$_SESSION["id"]."', '".$row["price"]."')";
			mysqli_query($connect, $allquery);
		}

		$mainquery = "INSERT INTO mainlist ( orderdate, content, price, ordernum) VALUES ('".$time."' , '".$content."' , '".$total."', '".$ordernum."')";
		mysqli_query($connect, $mainquery);

		$payquery = "INSERT INTO pay ( id, price, paydate) VALUES ('".$_SESSION["id"]."' , '".$total."' , '".$time."')";
		mysqli_query($connect, $payquery);

		$todayquery = "INSERT INTO today ( price, orderdate ) VALUES ('".$total."' , '".$time."')";
		mysqli_query($connect, $todayquery);



		//테이블 초기화
		$delquery = "TRUNCATE tmplist";
		mysqli_query($connect, $delquery);

		$_SESSION["status"] = 0;

		echo '2';

	}else{
		//데이터 베이스 처리 오류 
		echo '3';
	}

}
else{
	//사용자 정보 불일치 및 결제 오류 
	echo "4";
}
?>