<?php 
	session_start();

	// initialize variables
	$name = "";
	$address = "";
	$id = "";
	$update = false;

	//database connection
	$db = mysqli_connect('localhost', 'root', '', 'crud');

    //save button is clicked
	if (isset($_POST['save'])) {
	    $id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (id,name, address) VALUES ('$id','$name', '$address')");
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

	// update record

    if (isset($_POST['update'])) {
	    $id = $_POST['id'];
	    $name = $_POST['name'];
	    $address = $_POST['address'];

	    mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
	    $_SESSION['message'] = "Address updated!";
	    header('location: index.php');
    }

    // delete record

    if (isset($_GET['del'])) {
	    $id = $_GET['del'];
	    mysqli_query($db, "DELETE FROM info WHERE id=$id");
	    $_SESSION['message'] = "Address deleted!";
	    header('location: index.php');
    }

    //retrieve record
	$results = mysqli_query($db, "SELECT * FROM info");

?>