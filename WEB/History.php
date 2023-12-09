<?php
require_once ('sql_connect.php');
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
	 width: 1000px;
	height : 300px;
	border: 1px solid gray;
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
#bien:hover {

	color: black;
	background-color: #EEEEEE ;
	
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
.anh {
width: 100%;
  margin: 0 auto;
  display: flex;
  justify-content: center; 
 margin-left :10px;
  margin-right: 10px;
}
	</style>
</head>
<body bgcolor="#CCFFCC">
<div class="nghiavu" >   <img style='height: auto ; width:450px ' style=" border-radius: 10px;" src="Img/3cslab_2.jpg" />  </div>


	<div class="song"> 
     <a target="_self"  href ="Homepage.php" id="bien" title="Về trang chủ" target="_blank"  >X </a>
	 </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
			<h1 style=" color: #000000; "> Lịch sử ra vào </h1>
			
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th> Ngày</th>
							<th>Họ & Tên</th>
							<th>Thời gian ra vào</th>
							<th>Ghi chú</th>
							<th width="100px"></th>
						</tr>
					</thead>
					<tbody>
<?php
	$sql = 'select * from history';
//}

$studentList = exResult($sql);

$index = 1;

$DATE=array();
$NAME=array();
$TIME=array();
$UID=array();
$NOTE=array();
$coun=0;
foreach ($studentList as $std) {
	$DATE[]=$std['DATE'];
	$NAME[]=$std['NAME'];
	$TIME[]=$std['TIME'];
	$NOTE[]=$std['NOTE'];
	$UID[]=$std['UID'];
	$coun++;
}

for($i=$coun-1;$i>=0;$i--){
	if($NOTE[$i]=="IN"){
	echo '<tr>
			<td>'.$DATE[$i].'</td>
			<td>'.$NAME[$i].'</td>
			<td>'.$TIME[$i].'</td>
			<td>'."Vào".'</td>
			<td><button class="btn btn-warning"
	onclick=\'window.open("History_Per_history.php?UID='.$UID[$i].'","_self")\'>Chi tiết</button></td>
		</tr>';
}
else if($NOTE[$i]=="OUT"){
	echo '<tr>
			<td>'.$DATE[$i].'</td>
			<td>'.$NAME[$i].'</td>
			<td>'.$TIME[$i].'</td>
			<td>'."Ra".'</td>
			<td><button class="btn btn-warning"
	onclick=\'window.open("History_Per_history.php?UID='.$UID[$i].'","_self")\'>Chi tiết</button></td>
		</tr>';
}

}
?>
					</tbody>
				</table>
				
			</div>
		</div>


	<script type="text/javascript">
	</script>
</body>
</html>