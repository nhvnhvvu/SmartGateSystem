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
     <a target="_self"  href ="Productivity.php" id="bien" title="Ve Trang Dau" target="_blank"  >X </a>
	 </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 style=" color: #000000; "> Danh sách thành viên </h1>
		
			</div>
			<h1>Search Tool</h1>
			<form method="get" action="">
        <label for="search_column">Tìm kiếm theo:</label>
        <select id="search_column" name="column">
            <option value="id">ID</option>
            <option value="name">Tên</option>
            <option value="birth_year">Năm sinh</option>
            <option value="email">Email</option>
            <option value="uid">UID</option>
        </select>
        <input type="text" name="keyword" placeholder="Từ khóa tìm kiếm">
        <input type="submit" value="Tìm kiếm">
    </form>
    <br>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ & Tên</th>
							<th>Khóa</th>
							<th>Địa chỉ email</th>
							<th> Ngành</th>
							<th>Số Điện Thoại</th>
							<th>Thời gian làm việc</th>
							<th width="60px" >Chi tiết</th>

						</tr>
					</thead>
					<tbody>
<?php
//if (isset($_GET['s']) && $_GET['s'] != '') {
	//$sql = 'select * from smr_table where fullname like "%'.$_GET['s'].'%"';
//} else {

 // Xử lý tìm kiếm
//  $search_column = isset($_GET['column']) ? $_GET['column'] : '';
//  $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

//  $sql_SEARCH = "SELECT * FROM member";
//  if (!empty($keyword)) {
// 	 $sql_SEARCH .= " WHERE $search_column LIKE :keyword";
//  }
//  $stmt = exResult($sql_SEARCH);
//  if (!empty($keyword)) {
// 	 $stmt->bindValue(':keyword', "%$keyword%");
//  }
//  $stmt->execute();
//  $resultT = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // Hiển thị dữ liệu trong bảng


	$sql = 'select * from member';
//}

$studentList = exResult($sql);

$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['FULLNAME'].'</td>
			<td>'.$std['KHOA'].'</td>
			<td>'.$std['EMAIL'].'</td>
			<td>'.$std['NGANH'].'</td>
			<td>'.$std['PHONE_NUMBER'].'</td>
			
			<td><button class="btn btn-warning"
	onclick=\'window.open("Productivity_Member_Graph.php?UID='.$std['UID'].'","_self")\'>Chi tiết</button></td>
	</tr>';
}
?>
					</tbody>
				</table>
				
			</div>
		</div>


	<script type="text/javascript">
		function deleteStudent(UID) {
			option = confirm('Bạn có muốn xoá sinh viên này không?')
			if(!option) {
				return;
			}

			console.log(UID)
			$.post('Member_Delete.php', {
				'UID3': UID3
			}, function(data) {
				alert(data)
				location.reload()
			})
		}

		function graduatedStudent(UID) {
			option = confirm('Sinh viên này đã tốt nghiệp?')
			if(!option) {
				return;
			}

			console.log(UID)
			$.post('Member_Delete.php', {
				'UID': UID
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>