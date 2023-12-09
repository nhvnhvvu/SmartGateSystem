<?php


	 require_once('sql_connect.php');
	 
	 $Name;
	 $UID='';
 if (isset($_GET['UID'])){
	 $UID=$_GET['UID'];
	 $sql ="select * from smr_table where UID =$UID";
    $studentList = exResult($sql);
	
	foreach($studentList as $std){
	$Name=$std['FULLNAME'];
	$Email=$std['EMAIL'];
	$Sdt=$std['PHONE_NUMBER'];
	$Birth=$std['BIRTH'];
	$Nganh=$std['NGANH'];
	$Khoa=$std['KHOA'];
	$MSSV=$std['MSSV'];



	
	}


	$cookie_name = "UID";

// 86400 = 1 day
setcookie($cookie_name, $UID, time() + (86400 * 30), "/");
 }

 ?>
<!DOCTYPE html> 
<html>
<head>
<title>Sửa thông tin</title>
<meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="">
<style>
.dangky {
	width: 450px;
	height : 550px;
	border: 1px solid gray;
	border-radius : 14px;
	text-align: center ;
	background-color:#FFFFFF;
	margin: auto;
	border-width: 5px;
  border-style: solid;
  border-color: #00CCFF;
	
}
#male {
	width: 100px;
    }
#female {
width : 100px }
	
	
h1 {
	color :black  ;
	font-family : arial ;
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
	background-color: #EEEEEE ;
	
}
 

</style>
</head>
<script type="text/javascript">
	function onclick1(){
		window.location="SMR_fix.php";	
	}
	

	
	
</script>

<body>
<center>

<body bgcolor="#EEEEEE" >
 <div class ="dangky">
 <div class="song"> 
     <a target="_self"  href ="SMR_lis.php" id="bien" title="Ve Trang Dau" target="_blank"  >X </a>
	 </div>
 <h1> Sửa thông tin</h1>
 

	

		<form action="SMR_Done2.php" method ="POST"  >
		<div class = "form-group">
		<input type="number"  name="id" value="<?=$id?>" style ="display:none;">
		 <input type="text " placeholder="Họ và tên" class="form- control" name="Name" value="<?=$Name?>">
			
				</div>
				
			<label for="male">Nam</label>: <input type="radio" id="male" name="sex" value="Nam"/> 
            <label for="female">Nữ</label>: <input type="radio" id="female" name="sex" value="Nữ" /> 
			
				<div class = "form-group">
			 <input type="email"  placeholder="Email" class="form- control" name="Email" value="<?=$Email?>">
		

				</div>
		<div class = "form-group">
			<input type="text" placeholder="Số điện thoại" class="form- control" name="Sdt" value="<?=$Sdt?>">
		</div>
		<div class = "form-group">
			<input type="date" placeholder="Ngày sinh" class="form- control" name="Birth" value="<?=$Birth?>">
		</div>
		<div class = "form-group">
			<input type="text" placeholder="Ngành học" class="form- control" name="Nganh" value="<?=$Nganh?>">
		</div>
		
		<div class = "form-group">
			<input type="text" placeholder="Khóa" class="form- control" name="Khoa"/ value="<?=$Khoa?>">
		</div>
		<div>
		   <input type="text" placeholder="Mã số sinh viên" class="form- control" name="MSSV" value="<?=$MSSV?>">
		</div>
		<div class = "form-group">
			 <input type="hidden"   class="form- control" name="UID" value=".'$UID'.">
				</div>
		<div>
		<button type="submit" class="btn btn-default" onclick="onclick1()">Submit</button>
		<button type ="reset" id="minh" > Reset</button>
		</div>
		</form>
		
	</div>
</body>
</html>
