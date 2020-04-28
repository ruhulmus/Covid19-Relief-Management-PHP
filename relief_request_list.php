<?php
	header('Content-Type: application/json');

    include("config.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    	$url = sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $_SERVER['SERVER_NAME'],
		    $_SERVER['REQUEST_URI']
		  );

		$pieces = explode('/', $url);
		$base_url = implode('/', array_slice($pieces, 0, -1));


      	$request_type = $_REQUEST['type'];
 		
 		if ($request_type == 1 || $request_type == 2) {
      		$sql = "SELECT * FROM relief_request WHERE type = '$request_type'";
      	} else {
      		$sql = "SELECT * FROM relief_request";
      	}

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    $data['status'] = "201";
	    	$data['msg']="success";
		    while($row = $result->fetch_assoc()) {
		    	$sql2 = "SELECT * FROM users WHERE id = '".$row["user_id"]."'";
		    	$result2 = mysqli_query($conn,$sql2);
				$row2=mysqli_fetch_array($result2);

				$sql3 = "SELECT * FROM upazilas WHERE id = '".$row["upazila_id"]."'";
		    	$result3 = mysqli_query($conn,$sql3);
				$row3=mysqli_fetch_array($result3);

				if ($row['nid'] !=='') {
					$img_url = $base_url . '/images/' .$row['nid'];
				}else{
					$img_url = '';
				}

		    	$data['detials'][] = [
	                'id'=>$row["id"],
	                'user_id'=>$row["user_id"],
	                'user_full_name'=>$row2["name"],
	                'upazila_id'=>$row['upazila_id'],
	                'upazila_name'=>$row3['name'],
	                'type'=>$row["type"],
	                'name'=>$row['name'],
	                'address'=>$row['address'],
	                'no_of_family'=>$row['no_of_family'],
	                'releife_items'=>$row['releife_items'],
	                'no_of_survival_day'=>$row['no_of_survival_day'],
	                'details'=>$row['details'],
	                'nid'=> $img_url,
	                'status'=>$row['status'],
	                'created_at'=>$row['created_at'],	 		         
	            ];
		    }
		}
		else {
			$data['status'] = "401";
	        $data['msg']="failed";
		}
		$conn->close();
	}else{
		$data['status'] = "501";
		$data['msg']="method is not allowed";
	}
	
	echo json_encode($data);
		
?>