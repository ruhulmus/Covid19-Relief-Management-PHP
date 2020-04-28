 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
  // $row=null; 
   if($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $sql = "SELECT * FROM upazilas ORDER BY id ASC";
	$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    $data['status'] = "201";
	    	$data['msg']="success";
		    while($row = $result->fetch_assoc()) {
 
		    	$data['upazila_list'][] = [
 		        'id'=>$row["id"],
		        'upazila_name'=>$row["name"],
		        'upazila_latitude'=>$row["latitude"],
		        'upazila_longitude'=>$row["longitude"]
            ];
		        
 			    }
			} else {
			 $data['status'] = "401";
	         $data['msg']="failed";
			}
			$conn->close();

}
else{
	$data['status'] = "501";
	$data['msg']="method is not allowed";
}
	echo json_encode($data);
		
 
?>