 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
  // $row=null; 
   if($_SERVER["REQUEST_METHOD"] == "POST") {	
   		$url = sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $_SERVER['SERVER_NAME'],
		    $_SERVER['REQUEST_URI']
		  );

		$pieces = explode('/', $url);
		$base_url = implode('/', array_slice($pieces, 0, -1)); 
      
    	$distribute_status = $_POST['status'];
 	
 		if ($distribute_status == 1 || $distribute_status == 2 || $distribute_status == 3) {
      		$sql = "SELECT * FROM distribute_info WHERE status = '$distribute_status'";
      	} else {
      		$sql = "SELECT * FROM distribute_info ORDER BY status ASC";
      	}

    	//$sql = "SELECT * FROM distribute_info ORDER BY date_of_distribution DESC";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    $data['status'] = "201";
	    	$data['msg']="success";
		    while($row = $result->fetch_assoc()) {

		 	$sql2 = "SELECT * FROM upazilas WHERE id='".$row["upazila_id"]."'";
			$result2 = mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_array($result2);

			$sql3 = "SELECT * FROM users WHERE id='".$row["user_id"]."'";
			$result3 = mysqli_query($conn,$sql3);
			$row3=mysqli_fetch_array($result3);


			if ($row3['type'] ==1 ){
		    	$user_type="individual";
		    }
		    else if ($row3['type'] ==2 ) {
				$user_type="Private Welfare Organization";
		    }
		    else if ($row3['type'] ==3 ) {
				$user_type="Govt Organization";
		    }
		    
			
			if ($row['photo'] !=='') {
				$img_url = $base_url . '/images/' .$row['photo'];
			}else{
				$img_url = '';
			}

		    	$data['distribution_list'][] = [
                'user_id'=>$row["user_id"],
                'id'=>$row["id"],
                'user_name'=>$row3['name'],
                'user_type'=>$user_type,
 		        'upazila_id'=>$row["upazila_id"],
		        'upazila_name'=>$row2["name"],
		        'upazila_latitude'=>$row2["latitude"],
		        'upazila_longitude'=>$row2["longitude"],
		        'distribution_latitude'=>$row["latitude"],
		        'distributtion_longitude'=>$row["longitude"],
		        'no_of_family'=>$row["no_of_family"],
		        'releife_items'=>$row["releife_items"],
		        'survival_day'=>$row["survival_day"],
		        'is_needed'=>$row["is_needed"],
		        'status'=>$row["status"],
		        'is_needed_detials'=>$row["is_needed_detials"],
		        'date_of_distribution'=>$row["date_of_distribution"],
		        'address'=>$row["address"],
		        'status'=>$row["status"],
		        'photo'=>$img_url
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