<!DOCTYPE html> 
<html>
<head>
<script src ="https://unpkg.com/read-excel-file@4.0.2/bundle/read-excel-file.min.js">	</script>
<title>Thêm thẻ mới</title>
<meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="">
<style>


.dangky {
	width: 400px;
	height : 600px;
	border: 1px solid gray;
	border-radius : 13px;
	text-align: center ;
	background-color:#FFFFFF;
	margin: auto;
	border-width: 5px;
  border-style: solid;
  border-color: #00CCFF;
	
}
.ex {
width:400px;
	height : 130px;
	border: 1px solid gray;
	border-radius : 10px;
	text-align: center ;
	background-color:#99FF99;
	margin: auto;
}
#male {
	width: 100px;
    }
#female {
width : 100px }
	
	
h1 {
	color :black;
	font-family : arial;
}
input {
	width: 280px;
	height: 30px;
	margin-bottom: 5px;
	border-radius: 10px;
	border : 2px solid gray;
	padding-left : 25px;
}

button {
	width: 170px;
	height: 50px;
	border-radius: 5px;
	color : black;
	background-color: #00CCFF;
	transition: color 0.5s , background 0.5s;
	
	
}
button:hover {
	color: black;
background-color:#EEEEEE ; }
.texxt {
	text-align: right;
	width :15%;
}
.song {
 text-align:right;
 }
 #bien {
 background-color:#CC0000	;
	color: #fff;
	padding: 4px 4px;
	border-radius : 50%;
	transition: color 0.5s , background 0.5s;
	text-decoration: none ;
}
#bien:hover {

	color: black;
	background-color: #fff ;
	
}
input[type="file"] {
display: none;
width: 200px;
	height: 100px;
	border-radius: 5px;
}
label {
width: 200px;
	height: 100px;
	border-radius: 5px;
	color : black;
	background-color: #fff;
	transition: color 0.5s , background 0.5s;
	
	}
h2 {
   color : black ;
	font-family : arial ; }
	
.a {
 background-color: #fff;
 width : 200px;
 height :50px;
 text-align: center;
 margin: auto;
 margin-bottom: 10px;
 }
 label {
 font-family: arial;
 }

 .nghiavu {
width: 1250px;
height: 200px;
background-color: #FFFFFF;
text-align: center;
margin:  auto;
  margin-left:280px;
	
	
	border-radius:15px;
}


 

</style>
</head>

<script type="text/javascript">



	var client = new Paho.MQTT.Client("broker.hivemq.com",8000,"web_" + parseInt(Math.random() * 100, 10));  
	client.onConnectionLost = onConnectionLost;  
    client.onMessageArrived = onMessageArrived; 
	var options = { useSSL: false,userName: "Vulcan121",password: "Vulcan121",onSuccess: onConnect , onFailure: doFail }  
    client.connect(options);  
	  
    function onConnect()
	{
        console.log("Connect Server broker.hivemq.com");
        client.subscribe("3CSLAB/AIDAYS/receive");	 // nhận dữ liệu		
    }  
	
	function doFail(e) {
       console.log(e);
    }
 
    function onConnectionLost(responseObject) 
	{
        if (responseObject.errorCode !== 0) 
		{
		console.log("error");
            console.log("onConnectionLost:" + responseObject.errorMessage);
        }
    } 
	
    function onMessageArrived(message) 
	{
        console.log("Data Server:" + message.payloadString);
		var DataServer = message.payloadString;
		//document.getElementById("datavdk").innerHTML = DataServer;
		
		var DataJson = JSON.parse(DataServer);
		//DataJson.UID.id="UID";
		//document.setcookie='UID='+DataJson.UID;
		//document.getElementById("UID").innerHTML = $UID;
		
  
		
		
	}
	function recform(){
		var Name = document.forms["myform"]["Name"].value;
		var sex = document.forms["myform"]["sex"].value;
		var Email = document.forms["myform"]["Email"].value;
		var Sdt = document.forms["myform"]["Sdt"].value;
		var Birth = document.forms["myform"]["Birth"].value;
		var Nganh = document.forms["myform"]["Nganh"].value;
		var Khoa = document.forms["myform"]["Khoa"].value;
		var MSSV = document.forms["myform"]["MSSV"].value;
		document.cookie = 'Name='+Name;
		document.cookie = 'sex='+sex;
		document.cookie = 'Email='+Email;
		document.cookie = 'Sdt='+Sdt;
		document.cookie = 'Birth='+Birth;
		document.cookie = 'Nganh='+Nganh;
		document.cookie = 'Khoa='+Khoa;
		document.cookie = 'MSSV='+MSSV;
	}
	
		
function onclick1()
{
	// điều khiển thiết bị 1 A0B , A1B
	 recform();
		var DataSend = "A09062023B";
		console.log(DataSend); 
		client.send("3CSLAB/AIDAYS/new", DataSend, 2, false);
		console.log("3CSLAB/AIDAYS/new:" + DataSend);
		//callback();
		
		 setTimeout('Redirect()', 100);
		
	 
	
}



function Redirect(){
	//window.location="SMR_Loading.php";
	document.getElementById('myform').submit();
}


</script>

<center>

<body bgcolor="#EEEEEE" >
         <div class="lamsao">  
		   <div class ="dangky">
 
 <div class="song"> 
     <a target="_self"  href ="Homepage.php" id="bien" title="Ve Trang Dau" target="_blank"  >X </a>
	 </div>
 <div class="a">
    <marquee> <h1> Đăng Kí Ngay</h1> </marquee> </div>
 

	

		<form action="Form_Loadingpage.php" method ="POST"  id="myform">
		<div class = "form-group">
		 <input type="text " placeholder="Họ và tên" class="form- control" name="Name">
			
				</div>
				
			<label for="male">Nam</label>: <input type="radio" id="male" name="sex" value="Nam"/> 
            <label for="female">Nữ</label>: <input type="radio" id="female" name="sex" value="Nữ" /> 
			
				<div class = "form-group">
			 <input type="email"  placeholder="Email" class="form- control" name="Email">
		

				</div>
		<div class = "form-group">
			<input type="text" placeholder="Số điện thoại" class="form- control" name="Sdt">
		</div>
		<div class = "form-group">
			<input type="date" placeholder="Ngày sinh" class="form- control" name="Birth">
		</div>
		<div class = "form-group">
			<input type="text" placeholder="Ngành học" class="form- control" name="Nganh">
		</div>
		
		<div class = "form-group">
			<input type="text" placeholder="Khóa" class="form- control" name="Khoa"/>
		</div>
		<div>
		   <input type="text" placeholder="Mã số sinh viên" class="form- control" name="MSSV">
		</div>
		<div>
		<button type ="button" class="btn btn-default" onclick="onclick1()">Submit</button>
		<button type ="reset" id="minh" > Reset</button>
		
		

		</div>
		</form>
		
	
	
	
	<div class = "form-group">
	<input type="file" id="fiex" accept="excel*"/>
	<label for="fiex">
	     <h2> Sử dụng file Excel</h2>
		  </label>
		  <button type ="button" class="btn btn-default" onclick="onclick2()">Submit</button>
	
		
	</div>
	</div>
				<script>
			var fiex = document.getElementById('fiex');
			fiex.addEventListener('change',function(){
				readXlsxFile(fiex.files[0]).then(function(data){
						console.log(data);
						var nob = data.length;
						document.cookie = 'nob='+nob;
						document.cookie = 'cob='+0;
						var i =1;
						for(i=1;i<nob;i++){
							document.cookie = 'Name'+i+'='+data[i][0];
							document.cookie = 'Sex'+i+'='+data[i][1];
							document.cookie = 'Email'+i+'='+data[i][2];
							document.cookie = 'Birth'+i+'='+data[i][4];
							document.cookie = 'Nganh'+i+'='+data[i][5];
							document.cookie = 'Khoa'+i+'='+data[i][6];
							document.cookie = 'MSSV'+i+'='+data[i][7];
							document.cookie = 'Sdt'+i+'='+data[i][3];
							document.cookie = 'Date'+i+'='+data[i][8];
							document.cookie = 'Time'+i+'='+data[i][9];
						}
	
						
						
			    });
			});
			
			function onclick2()
{

	 
		var DataSend = "A09062023B";
		console.log(DataSend); 
		client.send("Vulcan121/Sub", DataSend, 2, false);
		console.log("Vulcan121/Sub:" + DataSend);
		
		 setTimeout('Redirect2()', 100);
		
	 
	
}
function Redirect2(){
	window.location="Excel_Loadingpage.php";

}
			
					
		
		</script>
</body>
</html>