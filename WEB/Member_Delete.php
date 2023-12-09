<?php
 if (isset($_POST['UID'])){
	 $id=$_POST['UID'];
	 require_once('sql_connect.php');
	 
	 $sql ='delete from member where UID3 ='.$id;
	 execute($sql);
	 
	 echo'Đã xóa thành công';
 }