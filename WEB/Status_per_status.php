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
	</style>
</head>
<body bgcolor="#CCFFCC">

	<div class="song"> 
     <a target="_self"  href ="Status.php" id="bien" title="Về trang chủ" target="_blank"  >X </a>
	 </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1>Danh Sách Thành Viên</h1>
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th> Ngày</th>
							<th>Họ & Tên</th>
							<th>Thời gian ra vào</th>
							<th>Ghi chú</th>
						</tr>
					</thead>
					<tbody>
<?php
$UID;
if (isset($_GET['UID'])){
    $UID=$_GET['UID'];
}
 $sql ="select * from history where UID =$UID";
//}
$studentList = exResult($sql);
$DATE=array();
$NAME=array();
$TIME=array();
$NOTE=array();
$coun=0;
$index = 1;
foreach($studentList as $std){
	$DATE[]=$std['DATE'];
	$NAME[]=$std['NAME'];
	$TIME[]=$std['TIME'];
	$NOTE[]=$std['NOTE'];
	$coun++;
}
for($i=$coun-1;$i>=0;$i--){
	echo '<tr>
			<td>'.$DATE[$i].'</td>
			<td>'.$NAME[$i].'</td>
			<td>'.$TIME[$i].'</td>
			<td>'.$NOTE[$i].'</td>
		</tr>';
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