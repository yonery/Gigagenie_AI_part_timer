<!DOCTYPE html>
<html>
<head>
	<title>gini pos system</title>
	<meta charset="utf-8">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<style>
	html, body { height: 100%; overflow: hidden; margin-left: -2px;
	text-overflow: ellipsis; }
	#head{
		height: 50px;
		width: 100%;
		top : 0px;
		position: fixed;
		border : none;
		background-color:#8FAADC;
		color : #ffffff;
		font-weight: bold;
		font-size : 22pt;
		padding-left: 15px;
		padding-top: 3px;

	}
	#left{
		padding-left: 5px;
		float: left;
		width: 1200px;
		height: 100%;
/*		background-color : lightgray; */
		border: none;
		padding-top: 50px;
		margin-left: 1%;
	}
	#right{
		float: right;
		width: 20%;
		height: 100%;
/*		background-color : yellow; */
		border: none;
		display: block;
		padding-top : 70px;

	}
	#left-top{
		width: 100%;
		height: 50px;
		font-size : 17pt;
		font-weight: normal;
		color: #000000;
	}
	.btn-sub{
		display: inline-block;
		height: 40px;
		color: #000000;
		background-color : #8FAADC;
		margin-left : 10px;
		margin-top : 5px;
		border : 0;
		outline: 0;
		border-radius: 2px;
	}

	.btn-main{
		background-color : #8FAADC;
		color: white;
		font-size : 17pt;
		display: block;
		width: 200px;
		height: 80px;
		margin: 0 auto;
		font-weight: bold;
		outline: 0;
		border: 0;
		border-radius: 20px;
		padding: 1em;
	}

	#left-main{
		height: 420px;
		width: 100%;
		padding: 0px;
		margin-bottom: 0px;
		overflow-y: scroll;
		overflow-x: hidden;
		border: 0;
	}
	#order-list{
		color : #000000;
		width: 100%;
	}
	#left-bottom-left{
		color : #000000;
		height: 220px;
		width: 850px;	
		padding: 0px;
		margin: 0px;
		float: left;
	}

	#sub-left-list{
		color : #000000;
		width: 100%;		
	}

	#left-bottom-right {
		width: 350px; 
		height: 220px;
		float:right;
		margin: 0px;
	}
	#left-bottom-right {
		width: 350px; 
		height: 220px;
		float:right;
		margin: 0px;
	}

	#left-bottom-right th {
		font-weight : bolder;
		font-size : 25pt;
		line-height: 200%;
		letter-spacing: 10px;
		width: 350px;
	}
	#sub-right-list td{
		width: 100%;
	}
	table{
		border : 0;
		font-size: 16pt;
	}
	th{
		background-color: gray;
		border : 0;
		font-weight: bold;

	}
	tr{
		border : 0;
	}
	td{
		height: 25px;
		font-size: 14pt;
		border : 1px solid lightgray;
		padding : 0.5em;
	}

	.boxdial{
		position: fixed;
		top : 20%;
		left: 30%;
		z-index: 5;
		width: 800px;
		height: 400px;
		border: 3px solid black;
		background-color: white;
		font-weight: bold;
		font-size : 15pt;
		display: none;
		text-align: center;
		padding-top: 1em;
		padding-left: 15px;
	}
	#comselect{
		font-size: 80pt;
		font-weight: bolder;
		line-height: 120%;
		letter-spacing: 20px;
		color : blue;
	}
	#comlist{
		font-size: 30pt;
		font-weight: bolder;
		line-height: 120%;
		color : blue;
	}
	span{
		margin-right : 1em;
	}
	.btn-com{
		width: 150px;
		height: 50px;
		color: white;
		background-color : #8FAADC;
		font-size: 20pt;
		font-weight: bold;
		outline: 0;
		border: 0;
		border-radius: 20px;
	}

	.selected{
		background-color: #D9E5FF;
	}

	</style>
</head>

<body>
<header id="head">
	Gini pos system (직원용)
</header>
<div id="left">
	<div id="left-top">
		영업일자 <?php echo date("Y-m-d H:i:s"); ?>
		<button class="btn-sub" style="margin-left:10px; float:right;" onclick="wait()">반품</button>
		<button class="btn-sub" style="width: 200px; float:right;" onclick="wait()">바코드 스캔</button>
		<button class="btn-sub" style="margin-left:10px; float:right;" onclick="wait()">영수증 재출력</button>
	</div>
	<div id="left-main" style="margin-bottom: 20px">
	<table id="order-list">
		<tr>
			<th style="width: 250px">거래 일시</th>
			<th style="width: 700px">품목</th>
			<th style="width: 150px">단가</th>
			<th style="width: 100px">번호</th>
		</tr>
		
	</table>
	</div>
	<div id="left-bottom">
		<div id="left-bottom-left">
		<table id="sub-left-list" style="width:800px; float:left;">
			<tr>
				<th style="width : 100px"> 번호 </th>
				<th style="width : 300px"> 품목 </th>
				<th style="width : 150px"> 수량 </th>
				<th style="width : 100px"> 할인 </th>
				<th style="width : 100px"> 비고 </th>
			</tr>
		</table>
		</div>
		<div id="left-bottom-right">
			<table>
				<tr>
					<th id="total" style="font-weight: 800;background-color : #EAEAEA;" >Total   0</th>
				</tr>
			</table>
		</div>
	</div>
</div>
<div id="right">

	<br>
	<button class="btn-main" id="rc"> 매출 현황 </button>
	<br>
	<button class="btn-main" id="ra" onclick="rec_list()"> 매출 분석 </button>
	<br>
	<button class="btn-main" id="al" onclick="complete_list()"> 완료 목록 </button>
	<br>
	<button class="btn-main" onclick="wait()"> 수동 결제 </button>
	<br>
	<button class="btn-main" id="co" style="background-color:orange" > 제품 준비 완료 </button>
</div>

<div id="wait" class ="boxdial">
	<br/>
	<h1> 준비중인 기능입니다. </h1> 
	<br/>
</div>
<div id="top" class = "boxdial">
	<h1> 해당 주문을 완료하시겠습니까? </h1>
	<br>
	<div id="comselect"></div>
	<br>
	<button class="btn-com" id="chk" onclick="btnchk()">확인</button>
	<button class="btn-com" id="cancel">취소</button>
</div>

<div id="mid" class = "boxdial">
	<h1> 주문 완료 목록 </h1>
	<br>
	<div id="comlist"></div>
	<br>
	<button class="btn-com" id="cancel2">취소</button>
</div>

<div id="bot" class = "boxdial">
	<iframe src="payrecord.php" name="record" scrolling="yes" marginwidth="0" marginheight="0" frameborder="0" height="300px", width="700px"></iframe>
	<button class="btn-com" id="cancel3">취소</button>
</div>


<div id="fut" class = "boxdial">
	<h1> 매출 분석 </h1>
	<br>
	<div id="reclist"></div>
	<br>
	<button class="btn-com" id="cancel4">취소</button>
</div>

<div id="face" class = "boxdial">
	<br>
	<div id="ordlist"></div><br/>
	<h1>주문이 들어왔습니다.</h1>
	<br>
</div>


<script>

	
function wait(){
	var d = document.getElementById('wait');
	d.style.display = 'block';
	p = setTimeout(function(){
			d.style.display = 'none';
		}, 1500);
}

$('#ra').click(function(){
	record.location.reload();
	$('#fut').css('display','block');
	$('#cancel4').click(function(){
			$('#fut').css('display','none');
		});

});


$('#rc').click(function(){
	record.location.reload();
	$('#bot').css('display','block');
	$('#cancel3').click(function(){
			$('#bot').css('display','none');
		});

});

$('#al').click(function(){
	$('#mid').css('display','block');
//	complete_list();
	$('#cancel2').click(function(){
			$('#mid').css('display','none');
		});

});



function btnchk(){
	var num = document.getElementById('comselect').innerHTML;
	order_complete(num);
}

$(document).off("click").on("click", "#order-list tr",function(){
	$('#order-list tr').each(function() {
            $(this).removeClass('selected');
        });
	$(this).addClass('selected');

	var tr = $(this);
	var td = tr.children();
	var no = td.eq(3).text();
	
	sub_update(no);
	$('#co').click(function(){
		$('#top').css('display','block');
		$('#comselect').text(no);
		$('#cancel').click(function(){
			$('#top').css('display','none');
		});
})	
	
});
$(document).mousedown(function(){ 
        $('.selected').removeClass('selected'); 
    });

function sub_update(no){
	//alert(no);
	$.ajax({
		url : "subdata.php",
		method: "POST",
		datatype : "json",
		data : {
			no : no
		},
		success : function(data){
			//alert(data);
			//json 데이터를 append로 파싱 
			var list = $.parseJSON(data);
			var len = list.length;
			var html=""; 
			var total = 0;
			for(var i=0; i<len; i++){
				total += parseInt(list[i].price, 10);
				html += "<tr><td>"+(i+1)+"</td><td>"+list[i].menu;
				html += "</td><td>";
				html += list[i].cnt;
				html += "</td><td></td><td></td></tr>";
			}
			//alert(total);
			$('#total').text("Total " + total);
			$('#sub-left-list *').remove();
			var init = "<tr><th style='width : 100px'>번호</th>"+
				"<th style='width : 300px'> 품목 </th>	<th style='width : 150px'> 수량 </th>"+
				"<th style='width : 100px'> 할인 </th>	<th style='width : 100px'> 비고 </th></tr>";
			$('#sub-left-list').append(init);
			$('#sub-left-list').append(html);
		}
	})
}

function order_complete(num){
	//alert(num);
	$.ajax({
				url: "complete.php",
				method : "POST",
				data : {
					no : num
				},
				success : function(data){
					if(data=='ok'){
						window.location.href="staff.php";
					}
					else{
						window.location.href="staff.php";
						alert("잘못된 주문정보 입니다."+data);
					}
				}

			});
}

function complete_list(){
	$.ajax({
		url : "comdata.php",
		method : "POST",
		datatype : "json",
		success : function(data){
			var cc = $.parseJSON(data);
			var clen = cc.length;
			var html=""; 
			for(var i=0; i<clen; i++){
				html += "<span>"+cc[i].ordernum;
				html += "</span>";
			$('#comlist *').remove();
			$('#comlist').append(html);
			}

		}
	});
}

$(document).on("click", "span",function(){
	var dno = $(this).text();
//	alert(dno);
	del_complete(dno);
});

function del_complete(dno){
	$.ajax({
		url : "del_list.php",
		method : "POST",
		data : {
			dno : dno
		},
		success : function(data){
			//alert(data);
			window.location.href="staff.php";
		}
		
	});
}

function rec_list(){
	$.ajax({
		url : "recdata.php",
		method : "POST",
		success : function(data){
			$('#reclist').text("");
			$('#reclist *').remove();
			$('#reclist').append(data);
		}
	});
}

</script>
<script type="text/javascript" src="listup.js"></script>
</body>
</html>