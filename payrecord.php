

<!DOCTYPE html>
<html>
<head>
	<title>gini pos system</title>
	<meta charset='utf-8'>
	<style>
	th{
		background-color: gray;
		border : nond;
	}
	td{
		height: 25px;
		font-size: 14pt;
		background-color : #ffffff;
		border : 1px solid lightgray;
		text-align: center;
	}

	table{
		border : 1px solid black;
	}
	</style>

</head>
<body>

<?php


$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($conn, 'utf8');

$query = "SELECT * FROM pay";
$result = mysqli_query($connect, $query);


if($result){
	echo "<h1>Payment List</h1>
	<table>
		<tr>
			<th style='width: 300px'>결제 날짜</th>
			<th style='width: 200px'>결제 금액</th>
			<th style='width: 200px'>결제 정보</th>
		</tr>";

	while($row = mysqli_fetch_assoc($result)){
		echo "<tr><td>".$row["paydate"]."</td><td>".$row["price"]."</td><td>".$row["id"]."</td></tr>";

	}
	echo "</table>";
}

?>

</body>
</html>
