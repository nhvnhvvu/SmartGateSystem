<?php

function register(){
	
	if(!empty($_COOKIE)){
		$Name =$_COOKIE['Name'];
		$Sex =$_COOKIE['sex'];
		$Birth =$_COOKIE['Birth'];
		$Email =$_COOKIE['Email'];
		$Sdt =$_COOKIE['Sdt'];
		$Nganh=$_COOKIE['Nganh'];
		$Khoa =$_COOKIE['Khoa'];
		$MSSV =$_COOKIE['MSSV'];
		$UID =$_COOKIE['UID'];

		
		
		
		$connect = new mysqli("localhost","root","","aidays_database");
		
		if($connect-> connect_error) {
			var_dump($connect->connect_error);
			die();
		}
		date_default_timezone_set('Asia/Jakarta');
			$d = date("Y-m-d");
			$t = date("H:i:s");

			$sql2 = "
			CREATE TABLE IF NOT EXISTS  $$UID (  
				ID INT(3) NOT NULL AUTO_INCREMENT,
				NAM VARCHAR(4) NOT NULL,  
				THANG VARCHAR(2) NOT NULL,  
				NGAY INT(2) NOT NULL,  
				Total_Time INT(4) NOT NULL,  
				PRIMARY KEY(ID)

			  
			)";
			mysqli_query($connect,$sql2);
	   

		$query = "INSERT INTO member(FULLNAME,SEX,EMAIL,PHONE_NUMBER,BIRTH,
		NGANH,KHOA,MSSV,UID,DATE,TIME)
		VALUES('".$Name."','".$Sex."','".$Email."','".$Sdt."','".$Birth."',
		'".$Nganh."','".$Khoa."','".$MSSV."','".$UID."','".$d."','".$t."')";

		
		
		setcookie("Name",$Name,time()-3600);
		setcookie("Sex",$Sex,time()-3600);
		setcookie("Birth",$Birth,time()-3600);
		setcookie("Email",$Email,time()-3600);
		setcookie("Sdt",$Sdt,time()-3600);
		setcookie("Nganh",$Nganh,time()-3600);
		setcookie("Khoa",$Khoa,time()-3600);
		setcookie("MSSV",$MSSV,time()-3600);
		setcookie("UID",$UID,time()-3600);

		
		
		

		
		
		
		
		mysqli_query($connect,$query);
		$connect->close();
		
		
	}
}
?>