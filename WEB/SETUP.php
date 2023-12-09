<?php


	

		
		
		$connect = new mysqli("localhost","root","","aidays_database");
		
		if($connect-> connect_error) {
			var_dump($connect->connect_error);
			die();
		}

			$sql2 = "
			CREATE TABLE IF NOT EXISTS  123(  
				ID INT(3) NOT NULL AUTO_INCREMENT,
				NAM VARCHAR(4) NOT NULL,  
				THANG VARCHAR(2) NOT NULL,  
				NGAY INT(2) NOT NULL,  
				Total_Time INT(4) NOT NULL,  
				PRIMARY KEY(ID)

			  
			)";
			mysqli_query($connect,$sql2);
	   


		$connect->close();
		
		
	

?>