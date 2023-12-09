<?php

require_once ("Form_Newmember.php");

register();
?>
<!DOCTYPE html> 
<html>
<head>
<title>Thêm thẻ mới</title>
<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="abcd.css">
<style>

.custom-button {
      display: block;
      margin: 0 auto;
      background-color: #00CCFF;
      color: #fff;
      padding: 20px 50px;
      border-radius: 5px;
      font-size: 16px;
      text-decoration: none;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }
    
    .custom-button:hover {
      background-color: #45a049;
    }

.dangky {
	width: 400px;
	height : 300px;
	border: 1px solid gray;
	border-radius : 13px;
	text-align: center ;
	background-color:#FFFFFF;
	margin: auto;
	border-width: 5px;
  border-style: solid;
  border-color: #00CCFF;
	
}
</style>
</head>


<body>
<center>
<script type="text/javascript">
	function onclick1(){
		window.location="Homepage.php";	
	}
	
	setTimeout('onclick1()', 3000);
	
	
</script>

<body bgcolor="#EEEEEE" >
 <div class ="dangky">
 <h1> Xong</h1>
 

 <button class="custom-button"   onclick="onclick1()">Xong!!</button>

		
	</div>
</body>
</html>
