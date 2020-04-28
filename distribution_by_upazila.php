 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
  // $row=null; 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
    
    $upazila_id = $_POST['upazila_id'];
 
      
 	date_default_timezone_set('Asia/Dhaka');
	$date = date('Y-m-d H:i:s');
 
	    $sql = "SELECT * FROM distribute_info WHERE upazila_id = '$upazila_id'";
		$result = mysqli_query($conn, $sql);

		$sql_detials = "SELECT bn_name,district_id,name,latitude,longitude,no_of_population,no_of_families,avg_no_of_each_family_member,avg_family_wise_monthly_earning,no_of_poor_people FROM upazilas,welfare_data WHERE welfare_data.upazila_id = upazilas.id AND upazilas.id ='$upazila_id'";
		$result_detials = mysqli_query($conn, $sql_detials);


		if (mysqli_num_rows($result_detials) > 0) {
		    // output data of each row
		    $data['status'] = "201";
	    	$data['msg']="success";
		    while($row = $result_detials->fetch_assoc()) {

		    	 

		    	$sql4 = "SELECT * FROM districts WHERE id='".$row["district_id"]."'";
				$result4 = mysqli_query($conn,$sql4);
				$row4=mysqli_fetch_array($result4);


		    	$data['upazila_detials'][] = [
                'name'=>$row4['name'] ." > ". $row["name"],
				'name_bn'=>$row4['bn_name'] ." > ". $row["bn_name"],
		        'latitude'=>$row["latitude"],
		        'longitude'=>$row["longitude"],
		        'no_of_population'=>$row["no_of_population"],
		        'no_of_families'=>$row["no_of_families"],
		        'no_of_poor_people'=>$row["no_of_poor_people"],
		        'avg_no_of_each_family_member'=>$row["avg_no_of_each_family_member"],
		        'avg_family_wise_monthly_earning'=>$row["avg_family_wise_monthly_earning"]
            	];

		        
 			}




			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    
			    while($row = $result->fetch_assoc()) {
			    	 


					$sql3 = "SELECT * FROM users WHERE id='".$row["user_id"]."'";
					$result3 = mysqli_query($conn,$sql3);
					$row3=mysqli_fetch_array($result3);


					if ($row3['type'] ==1 ){
				    	$user_type="Indivitual";
				    }
				    else if ($row3['type'] ==2 ) {
						$user_type="Private Welfare Organization";
				    }
				    else if ($row3['type'] ==3 ) {
						$user_type="Govt Organization";
				    }


			    	$data['distributed_list'][] = [
	                'user_id'=>$row["user_id"],
			         'user_name'=>$row3['name'],
                	'user_type'=>$user_type,
			        'no_of_family'=>$row["no_of_family"],
			        'releife_items'=>$row["releife_items"],
			        'survival_day'=>$row["survival_day"],
			        'is_needed'=>$row["is_needed"],	
			        'status'=>$row["status"],			
			        'is_needed_detials'=>$row["is_needed_detials"],
			        'date_of_distribution'=>$row["date_of_distribution"],
			        'address'=>$row["address"],
			        'distribution_latitude'=>$row["latitude"],
		        	'distributtion_longitude'=>$row["longitude"],
	            ];

			        
	 			    }
				}
				  
			}
			 else {
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