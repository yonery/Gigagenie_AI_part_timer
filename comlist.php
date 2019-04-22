<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<style>
	body, head{
		width: 100%;
		height: 100%;
		text-align: center;
		vertical-align: middle;
		padding : 0;
		margin : -1;
		overflow: hidden;
	}
	.box{
		margin: 0 auto;
		width: 30%;
		height: 100%;
		vertical-align: middle;
		text-align: center;
		border : 3px solid white;
		display: inline-block;
		background-color: #EAEAEA;
		border-radius: 20px;
		color : black;
	}
	span{
		font-size: 40pt;
		font-weight: 900;
		color : #8FAADC;		
	}
	</style>
</head>
<body>
<?php
	
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');

$query = "SELECT * FROM comorder";
$result = mysqli_query($connect, $query);

echo "<div class='box'><h1>제품 완료 목록</h1>";
while($row = mysqli_fetch_assoc($result)){
	echo "<span>".$row["ordernum"]."</span><br/>";
}
echo "</div>";

$query = "SELECT * FROM mainlist";
$result = mysqli_query($connect, $query);

echo "<div class='box'><h1>제품 준비중 목록</h1>";
while($row = mysqli_fetch_assoc($result)){
	echo "<span>".$row["ordernum"]."</span><br/>";
}
echo "</div>";
?>
<script>	
	window.onload = function(){
		var width = window.innerWidth;
		var height = window.innerHeight;
		$('.box').css('height', height*0.9);
		play = setInterval(function(){
			window.location.href="comlist.php";
		}, 2000);
	}
</script>
</body>
</html>