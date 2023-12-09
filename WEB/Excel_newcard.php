<?php

function register(){

	if(!empty($_COOKIE)){
		$cob=(int)$_COOKIE['cob']; 
		$nob=(int)$_COOKIE['nob']; 
			if($cob!=0){
		$Name =$_COOKIE[ 'Name'.$cob.''];
		$Sex =$_COOKIE[ 'Sex'.$cob.''];
		$Birth =$_COOKIE[ 'Birth'.$cob.''];
		$Email =$_COOKIE[ 'Email'.$cob.''];
		$Sdt =$_COOKIE[ 'Sdt'.$cob.''];
		$Nganh=$_COOKIE[ 'Nganh'.$cob.''];
		$Khoa =$_COOKIE[ 'Khoa'.$cob.''];
		$MSSV =$_COOKIE[ 'MSSV'.$cob.''];
		$UID =$_COOKIE[ 'UID'];
		$d =$_COOKIE[ 'Date'.$cob.''];
		$t =$_COOKIE[ 'Time'.$cob.''];
		
				echo $Name;
		
	
		
		
		
		$connect = new mysqli("localhost","root","","aidays_database");
		
		if($connect-> connect_error) {
			var_dump($connect->connect_error);
			die();
		}


		$query = "INSERT INTO member(FULLNAME,SEX,EMAIL,PHONE_NUMBER,BIRTH,
		NGANH,KHOA,MSSV,UID,DATE,TIME)
		VALUES('".$Name."','".$Sex."','".$Email."','".$Sdt."','".$Birth."',
		'".$Nganh."','".$Khoa."','".$MSSV."','".$UID."','".$d."','".$t."')";
		mysqli_query($connect,$query);
		setcookie("Name'.$cob.'",$Name,time()-3600);
		setcookie("Sex'.$cob.'",$Sex,time()-3600);
		setcookie("Birth'.$cob.'",$Birth,time()-3600);
		setcookie("Email'.$cob.'",$Email,time()-3600);
		setcookie("Sdt'.$cob.'",$Sdt,time()-3600);
		setcookie("Nganh'.$cob.'",$Nganh,time()-3600);
		setcookie("Khoa'.$cob.'",$Khoa,time()-3600);
		setcookie("MSSV'.$cob.'",$MSSV,time()-3600);
		setcookie("UID",$UID,time()-3600);
		

		$sql2="CREATE TABLE IF NOT EXISTS  $$UID (  
			NAM VARCHAR(4) NOT NULL,  
			THANG VARCHAR(2) NOT NULL,  
			NGAY VARCHAR(2) NOT NULL,  
			SOLAN INT(2) NOT NULL,
			Total_Time INT(4) NOT NULL,  
			Tg_Muon INT(4) NOT NULL,  
			Vang INT(1) NOT NULL
		  
		)";
		
				
		
		

		
		
		
		
		mysqli_query($connect,$sql2);
		$connect->close();
		
		
	}
}
}
?>