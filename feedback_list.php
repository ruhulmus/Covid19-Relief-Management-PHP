 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
  // $row=null; 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
    
   	  	$type = $_POST['type'];
   	  	if ($type == 1){
		 	$sql = "SELECT * FROM user_feedback ORDER BY id DESC LIMIT 5";
			$result = mysqli_query($conn, $sql);
   	  	}
	 	else{
	 		$sql = "SELECT * FROM user_feedback ORDER BY id DESC";
			$result = mysqli_query($conn, $sql);
	 
	 	}
	    



			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    
			    while($row = $result->fetch_assoc()) {
			    	 

			    		$sql2 = "SELECT * FROM users WHERE id='".$row["user_id"]."'";
						$result2 = mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_array($result2);

						$sql3 = "SELECT * FROM upazilas WHERE id='".$row["upazila_id"]."'";
						$result3 = mysqli_query($conn,$sql3);
						$row3=mysqli_fetch_array($result3);



						$sql4 = "SELECT * FROM districts WHERE id='".$row3["district_id"]."'";
						$result4 = mysqli_query($conn,$sql4);
						$row4=mysqli_fetch_array($result4);


					if ($row2['type'] ==1 ){
				    	$user_type="individual";
				    }
				    else if ($row2['type'] ==2 ) {
						$user_type="Private Welfare Organization";
				    }
				    else if ($row2['type'] ==3 ) {
						$user_type="Govt Organization";
				    }
 
 						$feedback_substring = substr($row["feedback"],0,35);

			            $data['feedback_list'][] = [
		                'id'=>$row["id"],
		                'user_id'=>$row['user_id'],
		                'user_name'=>$row2['name'],
		                'user_email'=>$row2['email'],
		                'user_phone'=>$row2['phone'],
		                'user_address'=>$row2['address'],
		                'feedback'=>$row["feedback"],
		                'feedback_substring'=>$feedback_substring."...",
		                'status'=>$row['status'],
		                'user_type'=>$user_type,
		                'upazila_id'=>$row['upazila_id'],
		                'upazila_name'=>$row3["name"],
		                'district'=>$row4['name'],
			       	 	'upazila_name_bn'=>$row4['bn_name'] ." > ". $row3["bn_name"],
			       	 	'created_at'=>$row['created_at'],
		 		         
		            ];

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