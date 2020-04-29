 <?php
	header('Content-Type: application/json');

   include("config.php");
   include("global.php");
  // $row=null; 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      
		$phone = $_REQUEST['phone'];
		$email = $_REQUEST['email'];
		$name = $_REQUEST['name'];
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password']; 
		$type = $_REQUEST['type']; 
		$address = $_REQUEST['address']; 
      
		if (!empty($username) || !empty($phone)){
				
				if(checkIfUserExist('username',$username)){
					$data['status']="301";
					$data['msg']="username is exist";
				}
				else if(checkIfUserExist('phone',$phone)){
					$data['status']="301";
					$data['msg']="Phone nubmer is exist";
				}
				else{
				 	if (!empty($email) && checkIfUserExist('email',$email)){
						 
							$data['status']="301";
							$data['msg']="Email is exist";
						 
					}
					else{
						$sql = "INSERT INTO users (name, username,email,phone,password,type,address,is_active,role) VALUES ('".$name."','".$username."','".$email."','".$phone."','".$password."','".$type."','".$address."',1,0)";	
					 	if (mysqli_query($conn, $sql)) {
					 		    $data['status'] = "201";
						    	$data['msg']="success";
						    	$data['username']=$username;
						    	$data['name']=$name;

						        $data['phone']=$phone;
						        $data['email']=$email;
							} else {
							    $data['status'] = "401";
						        $data['msg']=$conn->error;
						         
							}
								$conn->close();
						}
					
				}
		}
		
	else{
		$data['status']="302";
		$data['msg']="username or Phone Required";
	}
		 
}
else{
	$data['status'] = "501";
	$data['msg']="method is not allowed";
}
	echo json_encode($data);
?>