 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
    date_default_timezone_set('Asia/Dhaka');
	$date = date('Y-m-d H:i:s');

   if($_SERVER["REQUEST_METHOD"] == "GET") {
    


   				$upazila_id = 1;
   				$sql2 = "SELECT * FROM distribute_info WHERE date_of_distribution <= '$date' AND upazila_id='$upazila_id'";
				$result2 = mysqli_query($conn, $sql2);
				
				$sum_survival_no_of_family_till_today = 0;

				if (mysqli_num_rows($result2) > 0) {
					 while($row3 = $result2->fetch_assoc()) {

 					 	$sql4 = "SELECT * FROM welfare_data WHERE upazila_id='".$row3["upazila_id"]."'";
						$result4 = mysqli_query($conn,$sql4);
						$row4=mysqli_fetch_array($result4);

					 	$distribution_date = new DateTime($row3["date_of_distribution"]);
					 	$distribution_date->modify('+'.$row3["survival_day"].' day');
					 	$survival_date= $distribution_date->format('Y-m-d H:i:s');

					 	$total_no_of_population = $row4["no_of_population"];
					 	$total_no_of_family = $row4["no_of_population"];
					 	$total_no_of_poor_family= $row4["no_of_poor_people"];

					 	$sum_survival_no_of_family_till_today += $row3["no_of_family"];
					 	 

					 	if ($survival_date >= $date){
					 			 
							$data['distributed_survive_till'][] = [
		                		'upazila_id'=>$row3["upazila_id"],
 		                		'distribute_no_of_family'=>$row3["no_of_family"],
						        'distribute_survival_day'=>$row3["survival_day"],
						        'distribute_date_of_distribution'=>$row3["date_of_distribution"],
						        'survival_date_till '=>$survival_date,
		               		];
	               		}
	               	}
				}	

				$data['total_survival_family_till_today'] = $sum_survival_no_of_family_till_today;
				$data['total_no_of_poor_family']= $total_no_of_poor_family;

    


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

	$sql3 = "SELECT COUNT('id') FROM distribute_info WHERE date_of_distribution <= '$date'";
	$result3 = mysqli_query($conn, $sql3);
 	$row3 = mysqli_fetch_array($result3);
	$total_distributed = $row3[0];
 
 	$sql4 = "SELECT COUNT('id') FROM distribute_info WHERE date_of_distribution > '$date'";
	$result4 = mysqli_query($conn, $sql4);
 	$row4 = mysqli_fetch_array($result4);
	$total_to_be_distributed = $row4[0];
 

	$sql6 = "SELECT COUNT('id') FROM welfare_data WHERE avg_family_wise_monthly_earning <= 10000";
	$result6 = mysqli_query($conn, $sql6);
 	$row6 = mysqli_fetch_array($result6);
	$total_poor_upazila = $row6[0];


	$sql5 = "SELECT COUNT('id') as total_user FROM users WHERE type = 3";
	$result5 = mysqli_query($conn, $sql5);
 	$row5 = mysqli_fetch_array($result5);
	$total_govt_organization = $row5[0];

		    $data['dashboard'][] = [
	        'total_user'=>$total_user,
	        'total_private_welfare'=>$total_private_welfare,
	       	'total_govt_organization'=>$total_govt_organization,
	        'total_distributed'=>$total_distributed,
	        'total_to_be_distributed'=>$total_to_be_distributed,
	        'total_poor_upazila'=>$total_poor_upazila,  
            ];
		        	   
			$conn->close();

}
else{
	$data['status'] = "501";
	$data['msg']="method is not allowed";
}
	echo json_encode($data);
		
 
?>