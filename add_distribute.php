 <?php
	header('Content-Type: application/json');

   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {

		if(isset($_FILES['photo'])){
			$target_dir = "images/";
			$target_file = $target_dir . basename(str_replace(" ", "", $_FILES["photo"]["name"]));
			if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
		  		$file_name = basename(str_replace(" ", "", $_FILES["photo"]["name"]));
		  	}else{
		  		$file_name = "";
		  	}
		}

		$user_id = $_REQUEST['user_id'];
		$upazila_id = $_REQUEST['upazila_id'];
		$no_of_family = $_REQUEST['no_of_family']; 

		$releife_items = $_POST['releife_items'];
		$survival_day = $_POST['survival_day'];
		$is_needed = $_POST['is_needed'];
		$is_needed_detials = $_POST['is_needed_detials'];
		$date_of_distribution = $_POST['date_of_distribution'];
		$address = $_POST['address'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$status = 1;
		$photo = $file_name;
      
      

		//$sql = "INSERT INTO distribute_info (user_id, upazila_id, no_of_family,releife_items,survival_day,is_needed,is_needed_detials,date_of_distribution)
		//VALUES ($user_id, '$upazila_id', $no_of_family,'$releife_items',$survival_day,$is_needed,'$is_needed_detials','$date_of_distribution')";
		$sql = "INSERT INTO distribute_info (user_id, upazila_id,no_of_family,releife_items,survival_day,is_needed,is_needed_detials,date_of_distribution,address,latitude,longitude, status, photo) VALUES ('".$user_id."','".$upazila_id."','".$no_of_family."','".$releife_items."','".$survival_day."','".$is_needed."','".$is_needed_detials."','".$date_of_distribution."','".$address."','".$latitude."','".$longitude."','".$status."','".$photo."')";

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