<?php
require_once ('sql_connect.php');
$sol="select * from realtime";
$soluong=0;
$UID=array();
$stun = exResult($sol);
foreach($stun as $stddd){
	if(!in_array($stddd['UID'],$UID)){
		$UID[$soluong]=$stddd['UID'];
$soluong++;
	}
}
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>InterFace</title>
     <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
     <script>
     function Dong_ho() {
         var gio = document.getElementById("gio");
         var phut = document.getElementById("phut");
         var giay = document.getElementById("giay");
         var Gio_hien_tai = new Date().getHours();
         var Phut_hien_tai = new Date().getMinutes();
         var Giay_hien_tai = new Date().getSeconds();
         gio.innerHTML = Gio_hien_tai;
         phut.innerHTML = Phut_hien_tai;
         giay.innerHTML = Giay_hien_tai;
		 
     }
    var Dem_gio = setInterval(Dong_ho, 1000);
	
 </script>
 
<link rel="stylesheet" href="">
<meta charset="UTF-8">
<style>
h1 {
text-align: center;
margin: auto;
margin-bottom:20px;
color: #00CCFF;
margin-top: 80px;
}
.anh {
width: 100%;
  margin: 0 auto;
  display: flex;
  justify-content: center; 
 margin-left :10px;
  margin-right: 10px;
}
.anhh {
width: 100%;
  margin: 0 auto;
  display: flex;
  justify-content: center; 
 margin-left :10px;
  margin-right: 10px;
  margin-bottom: 40px;
  margin-top: 15px;
}
.vu {
width :900px;
height: 600px;
background-color: #EEEEEE;
margin-right:20px;
margin-top : 22px;
}
.nghiaaa {
width :400px;
height: 565px;
margin-top:32px;
background-color: #EEEEEE;
//border-width: px;
//border-style: solid;
//border-color: #00CCFF;
//-webkit-border-radius: 15px;
//-moz-border-radius: 15px;
border-radius: 13px;

}
.nghia {
height :250px;
width :400px;
background-color: #fff;
margin-left : 30px;
margin-top:30px;
margin-bottom:30px;
margin-right: 30px;
border-radius: 25px;
text-align: center;
margin: auto;
background-image: url('');
background-repeat: no-repeat;
background-size: 350px 250px;
}
.dangki {
margin-top : 35px;
}
#danhsach {
	background-color:#00CCFF; 
	color: black;
	padding: 30px 60px;
	border-radius : 15px;
	transition: color 0.5s , background 0.5s;
	text-decoration: none ;
	margin-top:20px;
}
#danhsach:hover {
	color: black;
	background-color:#CCCCCC;}
  #danhsachh {
	background-color:#00CCFF; 
	color: black;
	padding: 30px 45px;
	border-radius : 15px;
	transition: color 0.5s , background 0.5s;
	text-decoration: none ;
	margin-top:20px;
}
#danhsachh:hover {
	color: black;
	background-color:#CCCCCC;}
.ai {
 margin: 0 auto;
  display: flex;
  justify-content: ; 
 margin-left :0px;
}
.sl {
margin-top:40px;
margin-left: 100px;
text-align: center;

}	
.dangkii {
margin-top: 113px;
margin-left:15px;
margin-right: 17px;
}
.nnghia {
height :565px;
width :auto;
background-color: #FFFFFF;
//margin-left : 30px;
//margin-top:40px;
border-radius: 10px;

}
a {
font-family: arial;
}
*{
     margin:0;
     padding:0;
     box-sizing: border-box;
     font-family: 'Open Sans', sans-serif;
 }

   #dong_ho h2{
     position: relative;
     display:block;
     color:#fff;
     text-align: center;
     margin:10px 0;
     font-weight: 100;
     text-transform: uppercase;
     letter-spacing: 0.4em;
 }
 #dong_ho #thoi_gian{
     display:flex;
 }
#dong_ho #thoi_gian div{
     position: relative;
     margin: 0 5px;
 }
 #dong_ho #thoi_gian div span{
     position: relative;
     display:block;
     width:50px;
     height: 30px;
     background: #2196f3;
     color: #fff;
     font-weight: 20;
     display:flex;
     justify-content: center;
     align-items: center;
     font-size: 2rem;
     z-index:3;
     box-shadow: 0 0 0 1px rgba(0,0,0,0.2);
 }
 #dong_ho #thoi_gian span:nth-child(2){
     height: 25px;
     font-size: 0.7rem;
     letter-spacing: 0.3rem;
     z-index: 2;
     box-shadow: none;
     background:#127fd6;
     text-transform: uppercase;
 }
 #dong_ho #thoi_gian div:last-child span {
     background: #ff006a;
 }
#dong_ho #thoi_gian div:last-child span:nth-child(2) {
     background: #ec0062;
 }
 #dong_ho #thoi_gian div{
     position: relative;
     margin: 0 5px;
     -webkit-box-reflect: below 10px linear-gradient(transparent, #0004);
 }
#datee {
	width: 300px;
	height :0px;
	color: black;
	
	font-size:1.5em;
	margin-left: 60px;
	margin-top: 100px;
}
.chutt {
	margin-top: 30px;
}
.vuhuu{
  margin-left: 10;
  display: flex;
  justify-content: center;
  text-align: center;
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
	function onclick1(){
		window.location="Form.php";	
	}
	function onclick2(){
		window.location="Member.php";	
	}
	function onclick3(){
		window.location="History.php";	
	}
	function onclick4(){
		window.location="Productivity.php";	
	}
  function onclick5(){
		window.location="Status.php";	
	}
	
</script>
<body  bgcolor="#EEEEEE">
 
 <div class="nghiavu" >   <img style='height: auto ; width:450px ' style=" border-radius: 10px;" src="Img/3cslab_2.jpg" />  </div>
    <div class="anh">
   
	
	<div class="vu">
	
	 <div class="anhh"> 
	<div class="nghia">
	<img style='height: 90px ; width:90px; margin-top:40px;' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvkFt-0DNC-fCcjKa3s97qe5rBOG6eiRl3vQ&usqp=CAU"/>
	
	<div class="dangki" style='margin-top:55px;'>
  <a  id="danhsach"  title="Dang ki ngay"  onclick="onclick1()" > Đăng Kí</a> 
  </div>
 </div>
 
	<div class="nghia">
<img style='height: 85px ; width:85px; margin-top:37px;' src="Img/326655_history_icon.png"/>
<div class="dangki" style='margin-top:62px;'>
  <a  id="danhsach" title="Xem lich su"  onclick="onclick3()" >Lịch Sử</a> 
  </div>
	</div>
	</div>
	<div class="anhh"> 
	 
	<div class="nghia">
<img style='height: 90px ; width:90px ; margin-top:30px;' src="https://cdn-icons-png.flaticon.com/512/2666/2666436.png"/>
	
	<div class="dangki" style='margin-top:62px;'>
  <a  id="danhsach" title="Danh sách thành viên"  onclick="onclick2()" >Danh Sách</a> 
  </div>
	</div>
	
	<div class="nghia">
	<img style='height: 110px ; width:110px ; margin-top:20px;' src="data:image/png;base64,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"/>
	
	<div class="dangki" style='margin-top:55px;'>
  <a  id="danhsach" title="Xem năng suất"  onclick="onclick4()" >Năng Suất </a> 
  </div>
	
	</div>
	</div>
	</div>
<div class="nghiaaa">
	
	<div class ="nnghia" >
	<div class="ai" >
	<img style='height: 170px ; width:170px' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHeodrG7rB8V1am1913vZZXByGLoh1mbzwpQ&usqp=CAU"/>
	<div class="chu"> 
    <h2 style="font-family: arial;" class ="chutt" >Trạng Thái </h2>
    <h3 style=" margin-top:15px;" >Số lượng hiện tại: <?php
    echo $soluong;
    ?> </h3>
 </div>

	</div>
	<div id="datee"> </div>
 <script> 
    var d = new Date();
	var ngay =["Chủ nhật","Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7"];
	var thang =["1","2","3","4","5","6","7","8","9","10","11","12"];
	document.getElementById("datee").innerHTML = "AI-DAYS," + ngay[d.getDay()] + "-" + d.getDate() + "/"
	+ thang[d.getMonth()] + "/" + d.getFullYear();
	</script>
  <div class="sl">
     <div id="dong_ho">
      
         <div id="thoi_gian">
             <div>
                 <span id="gio">00</span><span>Giờ</span>
             </div>
             <div>
                   <span id="phut">00</span><span>Phút</span>
             </div>
             <div>
                 <span id="giay">00</span><span>Giây</span>
             </div>
         </div>
     </div>
	</div>
  <div class="vuhuu">
	<div class="dangkii">
  <a  id="danhsachh" title="Cập nhật"  onclick="tai_lai()" >Cập Nhật</a> 
  </div>
  <div class="dangkii">
  <a  id="danhsachh" title="Xem chi tiết"  onclick="onclick5()" >Chi Tiết</a> 
  </div>
  <script>
    function tai_lai () {
      location.reload();
    }
    </script>
</div>
	</div>
	</div>
	
	</div>
	




</body>
</html>
