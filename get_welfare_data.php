 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
  // $row=null; 

    date_default_timezone_set('Asia/Dhaka');
	$date = date('Y-m-d H:i:s');

   if($_SERVER["REQUEST_METHOD"] == "GET") {




   				$sql_welfare = "SELECT welfare_data.id as id,bn_name,district_id, name,upazila_id,welfare_org_id,latitude,longitude,no_of_population,no_of_families,avg_no_of_each_family_member,avg_family_wise_monthly_earning,is_poor,no_of_poor_people FROM upazilas,welfare_data WHERE welfare_data.upazila_id = upazilas.id ORDER BY welfare_data.upazila_id ASC";
				$result_welfare = mysqli_query($conn,$sql_welfare);
 
				if (mysqli_num_rows($result_welfare) > 0) {
					while($row_welfare = $result_welfare->fetch_assoc()) {

					$upazila_id = $row_welfare["upazila_id"]; 	
					$sql8 = "SELECT * FROM distribute_info WHERE date_of_distribution <= '$date' AND upazila_id='$upazila_id'";
					$result8 = mysqli_query($conn, $sql8);
					
					$sql4 = "SELECT * FROM districts WHERE id='".$row_welfare["district_id"]."'";
					$result4 = mysqli_query($conn,$sql4);
					$row4=mysqli_fetch_array($result4);
						
 						
						$sum_survival_no_of_family_till_today = 0;
						if (mysqli_num_rows($result8) > 0) {
							 while($row8 = $result8->fetch_assoc()) {
			


 								 	$distribution_date = new DateTime($row8["date_of_distribution"]);
								 	$distribution_date->modify('+'.$row8["survival_day"].' day');
								 	$survival_date= $distribution_date->format('Y-m-d H:i:s');

							 		$sum_survival_no_of_family_till_today += $row8["no_of_family"];

							 		if ($row8["survival_day"] > 0 && $row8["survival_day"] <= 5){
							 			$map_status_zone_wise = 2;
							 		}
							 		else if ($row8["survival_day"] > 5 ){
							 			$map_status_zone_wise = 3;
							 		}
							 		else{
							 			$map_status_zone_wise = 1;
							 		}
								 	if ($survival_date >= $date){
				
										$data1['distributed_survive_till'][] = [
											'upazila_id'=>$row8["upazila_id"],
						                	'distribute_no_of_family'=>$row8["no_of_family"],
									        'distribute_survival_day'=>$row8["survival_day"],
									        'distribute_date_of_distribution'=>$row8["date_of_distribution"],
									        'survival_date_till'=>$survival_date,
					               		];
				               		}
							}
						}

						 
						$data['welfare_list'][] = [
							'id'=>$row_welfare["id"],
							'welfare_org_id'=>$row_welfare["welfare_org_id"],
		                	'upazila_id'=>$row_welfare["upazila_id"],
 		                	'upazila_name'=>$row4['name'] ." > ". $row_welfare["name"],
							'name_bn'=>$row4['bn_name'] ." > ". $row_welfare["bn_name"],
 		                	'no_of_population'=>$row_welfare["no_of_population"],
 		                	'no_of_families'=>$row_welfare["no_of_families"],

		                	'upazila_longitude'=>$row_welfare["longitude"],
		         			'upazila_latitude'=>$row_welfare["latitude"],
						    
 	       					'avg_no_of_each_family_member'=>$row_welfare["avg_no_of_each_family_member"],
	        				'avg_family_wise_monthly_earning'=>$row_welfare["avg_family_wise_monthly_earning"],
	        				'total_survival_family_till_today'=> $sum_survival_no_of_family_till_today,
							'no_of_poor_family'=>$row_welfare["no_of_poor_people"],
							'upazila_wise_map_status'=>$map_status_zone_wise,	        				
							//'distributed_survive_till'=>$data1['distributed_survive_till'],

		               		];

						/*
					 	$data['upazila_detials'][] = [
	                		'upazila_id'=>$row_welfare["upazila_id"],
		                	'distribute_no_of_family'=>$row_welfare["no_of_population"],
					        'total_no_of_family'=>$row_welfare["total_no_of_family"],
					        'no_of_poor_people'=>$row_welfare["no_of_poor_people"],
	       					'avg_no_of_each_family_member'=>$row_welfare["avg_no_of_each_family_member"],
	        				'avg_family_wise_monthly_earning'=>$row_welfare["avg_family_wise_monthly_earning"]
	               		];
 					 	 
						*/
 					 	

					 	
	               	}
				}








    $sql = "SELECT welfare_data.id as id, name,upazila_id,welfare_org_id,latitude,longitude,no_of_population,no_of_families,avg_no_of_each_family_member,avg_family_wise_monthly_earning,is_poor,no_of_poor_people FROM upazilas,welfare_data WHERE welfare_data.upazila_id = upazilas.id ORDER BY welfare_data.id ASC";
	$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    $data['status'] = "201";
	    	$data['msg']="success";
		    while($row = $result->fetch_assoc()) {
 
		    	$data['welfare_list_old'][] = [
 		        'id'=>$row["id"],
		        'welfare_org_id'=>$row["welfare_org_id"],
		        'upazila_id'=>$row["upazila_id"],
		        'upazila_name'=>$row["name"],
		        'no_of_population'=>$row["no_of_population"],
		        'no_of_families'=>$row["no_of_families"],
		        'upazila_longitude'=>$row["longitude"],
		         'upazila_latitude'=>$row["latitude"],
		         'no_of_poor_people'=>$row["no_of_poor_people"],
		        'avg_no_of_each_family_member'=>$row["avg_no_of_each_family_member"],
  		         'is_poor'=>$row["is_poor"]           
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