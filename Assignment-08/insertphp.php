<?php
  	$host = 'localhost';
		$user = 'seddiqi_Admin';
		$password = ']DU7@Jb-,*dt';
		$dbname = 'seddiqi_Tamana';

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if(empty($conn))
			die("Connection Failed! ".mysqli_connect_error());

		$bookName = $_REQUEST['name'];
		$author = $_REQUEST['author'];
		$productionYear = $_REQUEST['year'];

		$query = "insert into tblLibrary (BookName, Author, ProductionYear) values ('$bookName', '$author', $productionYear);";
		$result = mysqli_query($conn, $query);

		if ($result > 0)
			header("Location:insert.php?result=success");
	 	else
			header("Location:insert.php?result=fail");
?>
