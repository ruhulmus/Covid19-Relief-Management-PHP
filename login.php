 <?php
	header('Content-Type: application/json');

   include("config.php");
    
  // $row=null; 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['username'];
      $password = $_POST['password']; 
      
      

    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password' and is_active = 1";
	$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    $data['status'] = "201";
	    	$data['msg']="success";
		    while($row = $result->fetch_assoc()) {
		    
		    if ($row['type'] ==1 ){
		    	$data['type']="Indivitual";
		    }
		    else if ($row['type'] ==2 ) {
				$data['type']="Private Welfare Organization";
		    }
		    else if ($row['type'] ==3 ) {
				$data['type']="Govt Organization";
		    }
		    
	        $data['name']=$row["name"];
	        $data['user_id']=$row["id"];
	        $data['phone']=$row["phone"];
	        $data['email']=$row["email"];
		    }
			} else {
			 $data['status'] = "401";
	         $data['msg']="username or password is invalid";
			}
			$conn->close();

}
else{
	$data['status'] = "501";
	$data['msg']="method is not allowed";
}
	echo json_encode($data);
		
 
?>