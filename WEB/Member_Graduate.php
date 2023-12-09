<?php
 if (isset($_POST['UID'])){
	 $id=$_POST['UID'];
	 require_once('sql_connect.php');
	 $sql ='delete from smr_table where UID ='.$id;
	 execute($sql);
	 
	 echo'Đã xóa thành công';
 }