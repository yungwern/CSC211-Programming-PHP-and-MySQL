<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
</head>
<body>
<h1>Registration Results</h1>
<?php // Script 6.2 - handle_reg.php
/* This script receives seven values from register.html:
email, password, confirm, year, terms, color, submit */

// Address error management, if you want.

// Flag variable to track success:
$okay = true;

// Validate email:
if (empty($_POST['email'])) {
	print '<p>Please enter your email address.</p>';
	$okay = false;
}

// Validate password:
if (empty($_POST['password'])) {
	print '<p>Please enter your password.</p>';
	$okay = false;
}

// Validate confirm password and check if it matches:
if (empty($_POST['confirm'])) {
	print '<p>Please confirm your password.</p>';
	$okay = false;
} elseif ($_POST['password'] != $_POST['confirm']) {
	print '<p>Your passwords do not match.</p>';
	$okay = false;
}

// Validate year:
if (empty($_POST['year']) || $_POST['year'] == 'YYYY') {
	print '<p>Please enter the year you were born.</p>';
	$okay = false;
}

// Validate color:
if (empty($_POST['color'])) {
	print '<p>Please select your favorite color.</p>';
	$okay = false;
}

// Validate terms:
if (!isset($_POST['terms'])) {
	print '<p>You must agree to the terms.</p>';
	$okay = false;
}
// If there were no errors, print a success message:
if ($okay) {
	print '<p>You have been successfullly registered (but not really).</p>';
}
?>
</body>
</html>