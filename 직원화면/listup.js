var init;

var upManager = new function(){

	var idle 		= true;
	var interval	= 500;
	var xmlHttp		= new XMLHttpRequest();
	var finalDate	= '';


	// Ajax Setting
	xmlHttp.onreadystatechange = function()
	{
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			// JSON 포맷으로 Parsing
			res = JSON.parse(xmlHttp.responseText);
			finalDate = res.date;
			
			// 채팅내용 보여주기
			upManager.show(res.data);
			
			// 채팅내용 가져오기
			upManager.proc();
		}
	}

	// 채팅내용 가져오기
	this.proc = function()
	{
		// Ajax 통신
		xmlHttp.open("GET", "proc.php?date=" + encodeURIComponent(finalDate), true);
		xmlHttp.send();
	}

	// 채팅내용 보여주기
	this.show = function(data)
	{
		var o = document.getElementById('order-list');
		var dr, dd, dc, dp, dn;

		var pa, pp;
		pa = document.getElementById('face');
		pp = document.getElementById('ordlist');
		var html;

		// 채팅내용 추가
		for(var i=0; i<data.length; i++)
		{
			
			dr = document.createElement('tr');

			dd = document.createElement('td');
			dd.appendChild(document.createTextNode(data[i].orderdate));
			dr.appendChild(dd);

			dc = document.createElement('td');
			dc.appendChild(document.createTextNode(data[i].content));
			dr.appendChild(dc);

			dp = document.createElement('td');
			dp.appendChild(document.createTextNode(data[i].price));
			dr.appendChild(dp);

			dn = document.createElement('td');
			dn.appendChild(document.createTextNode(data[i].ordernum));
			dr.appendChild(dn);
		
			o.appendChild(dr);

			if(init > 0){
				console.log(data[i].orderdate);
				pp.innerHTML = "<h2>"+data[i].orderdate+"<br/>"+data[i].content+"</h2>";
				pa.style.display="block";
				setTimeout(function(){
				pa.style.display="none";
					},1500);
			}



		}
		o.scrollTop = o.scrollHeight;
		init = 1;

	}

	//이전내용 가져오기
	this.pre = function(){
		xmlHttp.open("GET", "predata.php", true);
		xmlHttp.send();
		
		red = JSON.parse(xmlHttp.responseText);
		finalDate = red.date;
			
		// 채팅내용 보여주기
		upManager.show(red.data);
			
		// 채팅내용 가져오기
		upManager.proc(); 
	}
}

window.onload = function()
{
	console.log("hi");
	init = 0;
	console.log(init);
	upManager.pre();
//	upManager.proc();

};

