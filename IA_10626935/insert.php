<?php
  $name = $_POST['full name']
  $email = $_POST['email']
  $Student ID = $_POST['student_id']
  $username = $_POST['username']
  $password = $_POST['password']

if(!empty($fullname)|| !empty($email)|| !empty($student id)|| !empty($username)||!empty($password)){
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="studentdetails";
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if (mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		$SELECT = "SELECT email From register Where email=? Limit 1";
		$INSERT = "INSERT Into register(fullname,email,student_id,username,password) values(?,?,?,?,?)" 

		$stmt = $conn->prepare($SELECT);
		$stmt-> bind_param("s",$email);
		$stmt-> execute();
		$stmt-> bind_result($email);
		$stmt-> store_result();
		$rnum= $stmt->num_rows;

		if ($rnum==0)
		{
			$stmt-> close();
			$stmt-> $conn->prepare($INSERT);
			$stmt->bind_param("ssiss",$name,$email,$student_id,$username,$password);
			$stmt->execute();
			echo"Registration Successful"
		}
		else{
			echo"Email registered already"
		}
		$stmt->close();
		$conn->close();


	}

}
else{
	echo "All fields must be filled";
	die();
}




?>