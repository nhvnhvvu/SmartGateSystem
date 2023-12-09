<?php

 
require_once ('sql_connect.php');
// Xác định tháng mấy và số ngày trong tháng
if (isset($_GET['PICK_MONTH'])){
   $month_n=$_GET['PICK_MONTH'];
   
}
else {
$month_n=date('m', time());

}
$yeah=date('y', time());
$SNTT=0;
switch ($month_n) {
   case 1: 
       case 3:
       case 5:
       case 7:
       case 8:
       case 10:
       case 12:
       $SNTT=31;
      break;
      case 2:
       $SNTT=28;
      break;
   case 4: 
       case 6: 
       case 9:
       case 11: 
           $SNTT=30;
       break;
   default:
       31;
       break;
}

// lưu UID vào mảng r tí lấy ra dùng
$sql1 = "select * from member  ";
$dem=array();
$studentList1 = exResult($sql1);
$UID=array();
$Mname=array();
$Wtime=array();
$so_luong=0;


foreach ($studentList1 as $std1) {
   $UID[$so_luong]=$std1['UID'];
   $Mname[$so_luong]=$std1['FULLNAME'];
   $Wtime[$so_luong]=0;
   $so_luong+=1;
   
}

// bắt đầu lấy từng cái UID ra dùng
for($i=0;$i<$so_luong;$i++){
   $sql2 = "select * from $$UID[$i] where THANG =  $month_n";
   $studentList2 = exResult($sql2);
   foreach ($studentList2 as $std2) {
       $Wtime[$i]+=$std2['Total_Time'];
   }
}

// $dataPoints00=array();
$dataPoints = array();
for ($i = 0; $i<$so_luong;$i++){
   if($Wtime[$i]!=0){
               $dataPoints00=array("label"=> strval($Mname[$i]) , "y"=>number_format ($Wtime[$i]/60 , 1 ,'.' , '' ) );
       //print_r($dataPoints00);
                  $dataPoints[]=$dataPoints00;
          }
          else {
               $dataPoints00=array("label"=>  strval($Mname[$i]), "y"=>0 );
               $dataPoints[]=$dataPoints00;
          }
}
// print_r($dataPoints);

// $dataPoints = array(
// 	array("label"=> "Education", "y"=> 284935),
// 	array("label"=> "Entertainment", "y"=> 256548),
// 	array("label"=> "Lifestyle", "y"=> 245214),
// 	array("label"=> "Business", "y"=> 233464),
// 	array("label"=> "Music & Audio", "y"=> 200285),
// 	array("label"=> "Personalization", "y"=> 194422),
// 	array("label"=> "Tools", "y"=> 180337),
// 	array("label"=> "Books & Reference", "y"=> 172340),
// 	array("label"=> "Travel & Local", "y"=> 118187),
// 	array("label"=> "Puzzle", "y"=> 107530)
// );
//print_r($dataPoints);
?>




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
table {
font-size: 12 px;
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
				<h1 style=" color: #000000; "> Danh sách thành viên </h1>
		
			</div>


        <script>
        window.onload = function () {
         
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Năng suất thành viên"
            },
            axisY: {
                title: "Số giờ trên lab"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
         
        }
        </script>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>