<?php

if (empty($_FILES['myfile'])) {
	$errors['myfile'] = "A file is required";
	$data['errors'] = $errors;
	header("data-type: text/json");
	echo json_encode($data);

} else {

	$firstname = $_POST['firstname'];
	$lastname = $_POST['secondname'];
	$files = $_FILES['myfile'];

	uploadFile($files, $firstname, $lastname);

}

function uploadFile($files, $firstname, $lastname) {

	$errors = array();
	// array to hold validation errors
	$data = array();
	// array to pass back data

	// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

	if (empty($firstname)) {
		$errors['firstname'] = 'First Name is required.';
	}

	if (empty($lastname)) {
		$errors['secondname'] = 'Second Name is required.';
	}

	if (empty($files)) {
		$errors['myfile'] = "A file is required";
	}
	// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if (!empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors'] = $errors;
	} else {

		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Upload Successful';
	}

	// return all our data to an AJAX call
	echo json_encode($data);

}
?>