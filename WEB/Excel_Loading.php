<?php

require_once ("Excel_newcard.php");

register();
?>
<!DOCTYPE html> 
<html>
<head>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="progressing_bar.css">
  <script src="main.js"></script>
<title>Thêm thẻ mới</title>
<style>

 
body {
  height: 500px;
}
 
@keyframes progress {
  0% {
    transform: scaleX(0);
  }
  100% {
    transform: scaleX(1);
  }
}
 
div.loading {
  position: relative;
  width: 100%;
  height: 100%;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 23;
  margin-top:10px;
}
 
div.bar {
  position: relative;
  height: 50px;
  width: 500px;
  border: 2px solid #3366CC;
  background-color: transparent;
   
}
 
div.bar::before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  transform-origin: left;
  background-color: #00CCFF;
  animation: progress 5s infinite;
}
 
div.bar::after {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  content: 'Thêm dấu vân tay mới...';
  text-align: center;
  mix-blend-mode: difference;
  color: white;
  text-transform: uppercase;
  font-weight: 800;
  font-family: arial;
}
.song {
 text-align:right;
 }
 #bien {
 background-color:#CC0000	;
	color: #fff;
	padding: 3px 3px;
	border-radius : 50%;
	transition: color 0.5s , background 0.5s;
	text-decoration: none ;
}
#bien:hover {

	color: black;
	background-color: #fff ;
	
}
</style>
<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<script type="text/javascript">

var client = new Paho.MQTT.Client("broker.hivemq.com",8000,"web_" + parseInt(Math.random() * 100, 10));  
	client.onConnectionLost = onConnectionLost;  
    client.onMessageArrived = onMessageArrived; 
	var options = { useSSL: false,userName: "Vulcan121",password: "Vulcan121",onSuccess: onConnect , onFailure: doFail }  
    client.connect(options);  
	  
    function onConnect()
	{
        console.log("Connect Server mqtt.ngoinhaiot.com");
        client.subscribe("Vulcan121/topic__pub_");	 // nhận dữ liệu		
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
	function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function onclick2()
{

	 
		var DataSend = "A1B";
		console.log(DataSend); 
		client.send("Vulcan121/topic__sub_", DataSend, 2, false);
		console.log("Vulcan121/topic__sub_:" + DataSend);
		
    	 setTimeout('Redirect2()', 100);
		
	 
	
}
function Redirect2(){
	window.location="SMR_excel_Loading_2.php";

}
function onclick3()
{

	 
		var DataSend = "A1B";
		console.log(DataSend); 
		client.send("Vulcan121/quat", DataSend, 2, false);
		console.log("Vulcan121/quat:" + DataSend);
		
    	 setTimeout('Redirect3()', 100);
		
	 
	
}
function Redirect3(){
	window.location="SMR_excel_next.php";

}
 
    function onMessageArrived(message) 
	{
        console.log("Data Server:" + message.payloadString);
		var DataServer = message.payloadString;
		//document.getElementById("datavdk").innerHTML = DataServer;
		
		var DataJson = JSON.parse(DataServer);
		
		
		document.cookie = 'UID='+DataJson.UID;
		   var cob = readCookie('cob');
	console.log(cob);
	var nob = readCookie('nob');
	console.log(nob);
	cob=parseInt(cob);
	cob=cob+1;
		if(cob<nob-1){
			document.cookie = 'cob='+cob;
			
		onclick2();
		}
		else if(cob>=nob-1) {
			document.cookie = 'cob='+cob;
			onclick3();
		}
	}
  
		
	
		


</script>
<body>
    
	
	 
 <div>
 <div class="song"> 
     <a target="_self"  href ="SMR_Interface_ver2.php" id="bien" title="Ve Trang Dau" target="_blank"  >X </a>
	 </div>
  </div>
 <div class="loading">
    <div class="bar"></div>
 </div>

	

		
	
</body>
</html>