 <?php
	header('Content-Type: application/json');

   $array = [];

   function get_data_by_field ($field,$value,$table_name){
	       include("config.php");

	    //$sql = "SELECT * FROM '".$table_name." WHERE '".$field."' = '".$value."'";
		$sql = "SELECT * FROM upazilas WHERE id=1";

		print_r($sql)
		
		$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
			    while ($row = mysql_fetch_array($result)) {
			        $array[]= $row['value'];
			    }
				return $array;
				}
	   }
?>