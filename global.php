<?php
   include("config.php");
		function checkIfUserExist($column,$value)
		{
			include("config.php");
		    $sql = "SELECT * FROM users WHERE  $column ='$value'";
			$result = mysqli_query($conn, $sql);
 
			if (mysqli_num_rows($result) > 0) {
				return true;
			}
			else{
				return false;
			}
			 
		}
?>