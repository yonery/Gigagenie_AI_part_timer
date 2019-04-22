<?php
$connect = mysqli_connect("localhost", "root", "genius", "ginialba");
mysqli_set_charset($conn, 'utf8');

$query = "select menu, max(cnt) from ( select menu, count(*) as cnt from allorder group by menu order by cnt desc )as counts";
$res = mysqli_query($connect, $query);

if(mysqli_num_rows($res) > 0)
{		
	$row = mysqli_fetch_assoc($res);
	$menu = $row["menu"];
	$cnt = $row["max(cnt)"];
	
}
echo "<h3>가장 많이 팔린 메뉴는 '".$menu."'이고, <br/><strong>".$cnt."</strong>잔 팔렸습니다.</h3>";

?>