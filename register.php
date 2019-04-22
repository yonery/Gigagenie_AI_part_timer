<?php
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($connect, 'utf8');
	
if(isset($_POST["sub"])){
	$id = $_POST["id"];
	$name = $_POST["name"];
	$sex = $_POST["sex"];
	$hp = $_POST["hp"];
	$old = $_POST["old"];
	
	echo $id." ".$name." ".$sex." ".$hp." ".$old."<br/>";

	$query = "INSERT INTO customer (id, name, sex, hp, old) VALUES ('".$id."','".$name."',".$sex.",".$hp.",".$old.")";
	$result = mysqli_query($connect, $query);
	echo "complete";

	header("location:login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<form method="post">
	<input type="text" name="id" placeholder="id" /><br/>
	<input type="text" name="name" placeholder="name" /><Br/>
	<input type="text" name="sex" placeholder="sex" /><br/>
	<input type="text" name="hp" placeholder="hp" /><br/>
	<input type="text" name="old" placeholder="old" /><br/>
	<input type="submit" name="sub" value="sub"/>
</form>
</body>
</html>