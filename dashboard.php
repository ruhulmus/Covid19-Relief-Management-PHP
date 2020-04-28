 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
    date_default_timezone_set('Asia/Dhaka');
	$date = date('Y-m-d H:i:s');

   if($_SERVER["REQUEST_METHOD"] == "GET") {
    
   				$total_survival_no_of_family_till_today = 0;
   				$total_no_of_poor_family = 0;

   				$sql_welfare = "SELECT * FROM welfare_data ORDER BY upazila_id ASC";
				$result_welfare = mysqli_query($conn,$sql_welfare);
 
				if (mysqli_num_rows($result_welfare) > 0) {
					
					while($row_welfare = $result_welfare->fetch_assoc()) {
					$upazila_id = $row_welfare["upazila_id"]; 	
					$sql2 = "SELECT * FROM distribute_info WHERE date_of_distribution <= '$date' AND upazila_id='$upazila_id'";
					$result2 = mysqli_query($conn, $sql2);
					
					$sum_upazila_survival_no_of_family_till_today = 0;

						if (mysqli_num_rows($result2) > 0) {
							 while($row3 = $result2->fetch_assoc()) {

								 	$distribution_date = new DateTime($row3["date_of_distribution"]);
								 	$distribution_date->modify('+'.$row3["survival_day"].' day');
								 	$survival_date= $distribution_date->format('Y-m-d H:i:s');


								 	if ($survival_date >= $date){

								 		$sum_upazila_survival_no_of_family_till_today += $row3["no_of_family"];


								 		 
				               		}
								 	 /*
							 		$sum_upazila_survival_no_of_family_till_today += $row3["no_of_family"];
					 		
					 				if ($row3["survival_day"] > 0 && $row3["survival_day"] <= 5){
							 			$map_status_zone_wise = 2;
							 		}
							 		else if ($row3["survival_day"] > 5 ){
							 			$map_status_zone_wise = 3;
							 		}
							 		else{
							 			$map_status_zone_wise = 1;
							 		}

									 	if ($survival_date >= $date){
					
											$data1['distributed_survive_till'][] = [
												'upazila_id'=>$row3["upazila_id"],
 						                		'distribute_no_of_family'=>$row3["no_of_family"],
										        'distribute_survival_day'=>$row3["survival_day"],
										        'distribute_date_of_distribution'=>$row3["date_of_distribution"],
										        'survival_date_till '=>$survival_date,
						               		];
					               		}
					               		*/
							}
						}
 						$total_survival_no_of_family_till_today += $sum_upazila_survival_no_of_family_till_today;
 						$total_no_of_poor_family += $row_welfare["no_of_poor_people"];

						$data2['upazila_welfare_detials'][] = [
							'id'=>$row_welfare["id"],
							'welfare_org_id'=>$row_welfare["welfare_org_id"],
		                	'upazila_id'=>$row_welfare["upazila_id"],
		                	'no_of_population'=>$row_welfare["no_of_population"],
						   // 'upazila_longitude'=>$row_welfare["longitude"],
						   // 'upazila_latitude'=>$row_welfare["latitude"],
 	       					'avg_no_of_each_family_member'=>$row_welfare["avg_no_of_each_family_member"],
	        				'avg_family_wise_monthly_earning'=>$row_welfare["avg_family_wise_monthly_earning"],
	        				'upazila_wise_survival_family_till_today'=> $sum_upazila_survival_no_of_family_till_today,
							'upazila_wise_no_of_poor_family'=>$row_welfare["no_of_poor_people"],
 							//'distributed_survive_till'=>$data1['distributed_survive_till'],

		               	];
 

					 	
	               	}
				}
 


    $sql = "SELECT COUNT('id') FROM users";
	$result = mysqli_query($conn, $sql);
 	$row = mysqli_fetch_array($result);
	$total_user = $row[0];

	$sql2 = "SELECT COUNT('id') FROM users WHERE type = 2";
	$result2 = mysqli_query($conn, $sql2);
 	$row2 = mysqli_fetch_array($result2);
	$total_private_welfare = $row2[0];

	$sql5 = "SELECT COUNT('id') FROM users WHERE type = 3";
	$result5 = mysqli_query($conn, $sql5);
 	$row5 = mysqli_fetch_array($result5);
	$total_govt_organization = $row5[0];

	$sql3 = "SELECT COUNT('id') FROM distribute_info WHERE status = 1";
	$result3 = mysqli_query($conn, $sql3);
 	$row3 = mysqli_fetch_array($result3);
	$total_distributed_pending = $row3[0];
 
 	$sql4 = "SELECT COUNT('id') FROM distribute_info WHERE status = 2";
	$result4 = mysqli_query($conn, $sql4);
 	$row4 = mysqli_fetch_array($result4);
	$total_distributed_done = $row4[0];
 

	$sql6 = "SELECT COUNT('id') FROM distribute_info WHERE status = 3";
	$result6 = mysqli_query($conn, $sql6);
 	$row6 = mysqli_fetch_array($result6);
	$total_distributed_cancel = $row6[0];


	$sql5 = "SELECT COUNT('id') as total_user FROM users WHERE type = 3";
	$result5 = mysqli_query($conn, $sql5);
 	$row5 = mysqli_fetch_array($result5);
	$total_govt_organization = $row5[0];


	$sql7 = "SELECT COUNT('id') FROM relief_request";
	$result7 = mysqli_query($conn, $sql7);
 	$row7 = mysqli_fetch_array($result7);
	$total_relief_request = $row7[0];

	$sql9 = "SELECT COUNT('id') FROM user_feedback";
	$result9 = mysqli_query($conn, $sql9);
 	$row9 = mysqli_fetch_array($result9);
	$total_feedback = $row9[0];

	$total_poor_family = $total_no_of_poor_family;
	$total_family_food_have = $total_survival_no_of_family_till_today;
	$total_family_food_needed = $total_poor_family - $total_family_food_have;

		    $data['dashboard'][] = [
	        'total_user'=>$total_user,
	        'total_private_welfare'=>$total_private_welfare,
	       	'total_govt_organization'=>$total_govt_organization,
	        'total_distributed_pending'=>$total_distributed_pending,
	        'total_distributed_done'=>$total_distributed_done,
	        'total_distributed_cancel'=>$total_distributed_cancel, 
	        'total_relief_request'=>$total_relief_request,
	        'total_feedback'=>$total_feedback,
	        'total_poor_family'=>$total_poor_family,
	        'total_family_food_have'=>$total_family_food_have,
	        'total_family_food_needed'=>$total_family_food_needed,
            ];
		        	   
			$conn->close();

}
else{
	$data['status'] = "501";
	$data['msg']="method is not allowed";
}
	echo json_encode($data);
		
 
?>