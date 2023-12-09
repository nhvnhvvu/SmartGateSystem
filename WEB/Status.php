<?php
require_once ('sql_connect.php');
$sol="select * from realtime";
$soluong=0;
$UIDV=array();
$stun = exResult($sol);
foreach($stun as $stddd){
	if(!in_array($stddd['UID'],$UIDV)){
		$UIDV[$soluong]=$stddd['UID'];
$soluong++;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
	h1 {
	color: #663399}
	.container {
	 text-align: center ;
	 wUIDth: 1000px;
	height : 300px;
	border: 1px solUID gray;
	border-radius : 10px;
	background-color: #fff;	
	margin: auto; }
	.song {
 margin-top: 20px;
 margin-left: 1450px;
 }
 #bien {
 background-color:#CC0000	;
	color: #fff;
	padding: 5px 15px;
	border-radius : 5px;
	transition: color 0.5s , background 0.5s;
	text-decoration: none ;
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
#bien:hover {

	color: black;
	background-color: #EEEEEE ;
	
}
	</style>
</head>
<body bgcolor="#CCFFCC">
<div class="nghiavu" >   <img style='height: auto ; width:450px ' style=" border-radius: 10px;" src="Img/3cslab_2.jpg" />  </div>

	<div class="song"> 
     <a target="_self"  href ="Homepage.php" id="bien" title="Ve Trang Dau" target="_blank"  >X </a>
	 </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
			<h1 style=" color: #000000; "> Trạng thái </h1>
				<h5>Thành viên hiện tại: <?php
				echo $soluong;
				?></h5>
			
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ & Tên</th>
							<th>Số điện thoại</th>
							<th width="100px">Chi tiết</th>
						</tr>
					</thead>
					<tbody>
<?php
	$UID_rt=array();
	$UID=array();
	$SDT=array();
	$Namee=array();


$sq="select *from member";
$student = exResult($sq);
$index = 1;
$solg=0;
foreach ($student as $std5) {

	if(in_array($std5['UID'],$UIDV)){
		$UID[$solg] = $std5['UID'];
		$SDT[$solg]=$std5['PHONE_NUMBER'];
		$Namee[$solg]=$std5['FULLNAME'];
		$solg++;
	
	}
}
for($i=0;$i<$solg;$i++){
	
	
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$Namee[$i].'</td>
			<td>'.$SDT[$i].'</td>
			<td><button class="btn btn-warning"
	onclick=\'window.open("Status_per_status.php?UID='.$UID[$i].'","_self")\'>Chi tiết</button></td>
		</tr>';

}

?>
					</tbody>
				</table>
				
			</div>
		</div>


	
</body>
</html>