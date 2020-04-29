 <?php
	header('Content-Type: application/json');

   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {

   		date_default_timezone_set('Asia/Dhaka');
		$date = date('Y-m-d H:i:s');
		 
		$user_id = $_REQUEST['user_id'];
		$upazila_id = $_REQUEST['upazila_id'];
		$feedback = $_REQUEST['feedback']; 
		$created_at = $date;
		$status = 1;
		 
  		$sql = "INSERT INTO user_feedback (user_id, upazila_id,feedback,status, created_at) VALUES ('".$user_id."','".$upazila_id."','".$feedback."','".$status."','".$created_at."')";

 		if (mysqli_query($conn, $sql)) {
 		    $data['status'] = "201";
	    	$data['msg']="success";
		} else {
		    $data['status'] = "401";
	         $data['msg']=$conn->error;
		}
			$conn->close();
	   }
	   else{
		$data['status'] = "501";
		$data['msg']="method is not allowed";
		}
	echo json_encode($data);
		
?>