 <?php
	header('Content-Type: application/json');

   include("config.php");
   //include("get_data_by_field.php");
    
  // $row=null; 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
    
   	 $user_type = $_POST['user_type'];
	 
	    $sql = "SELECT * FROM users WHERE type = '$user_type'";
		$result = mysqli_query($conn, $sql);
	 

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    
			    while($row = $result->fetch_assoc()) {
			    	 
					if ($row['type'] ==1 ){
				    	$user_type="individual";
				    }
				    else if ($row['type'] ==2 ) {
						$user_type="Private Welfare Organization";
				    }
				    else if ($row['type'] ==3 ) {
						$user_type="Govt Organization";
				    }
 
			            $data['users_list'][] = [
		                'user_id'=>$row["id"],
		                'user_name'=>$row['name'],
		                'ueser_phone'=>$row["phone"],
		                'user_email'=>$row['email'],
		                'user_type'=>$user_type
		 		         
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