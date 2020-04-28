 <?php
	header('Content-Type: application/json');

   	include("config.php");
   	if($_SERVER["REQUEST_METHOD"] == "POST") {
   		if(isset($_FILES['nid'])){
			$target_dir = "images/";
			$target_file = $target_dir . basename(str_replace(" ", "", $_FILES["nid"]["name"]));
			if (move_uploaded_file($_FILES['nid']['tmp_name'], $target_file)) {
		  		$file_name = basename(str_replace(" ", "", $_FILES["nid"]["name"]));
		  	}else{
		  		$file_name = "";
		  	}
		}

		$user_id = $_REQUEST['user_id'];
		$upazila_id = $_REQUEST['upazila_id'];
		$type = $_REQUEST['type'];
		$name = $_REQUEST['name'];
		$address = $_POST['address'];
		$no_of_family = $_REQUEST['no_of_family']; 
		$releife_items = $_POST['releife_items'];
		$no_of_survival_day = $_POST['no_of_survival_day'];
		$details = $_POST['details'];
		$nid = $file_name;
		$status = 0;
		date_default_timezone_set('Asia/Dhaka');
		$created_at = date('Y-m-d H:i:s');
      
      

		$sql = "INSERT INTO relief_request (user_id, upazila_id, type, name, address, no_of_family, releife_items, no_of_survival_day, details, nid, status, created_at) VALUES ('".$user_id."','".$upazila_id."','".$type."','".$name."','".$address."','".$no_of_family."','".$releife_items."','".$no_of_survival_day."','".$details."','".$nid."','".$status."','".$created_at."')";

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