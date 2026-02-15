<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css" media="screen">
		.error { color: red; font-weight: bold; }
		.success { color: green; font-weight: bold; }
	</style>
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
	print '<p class="error">Please enter your email address.</p>';
	$okay = false;
}

// Validate password:
if (empty($_POST['password'])) {
	print '<p class="error">Please enter your password.</p>';
	$okay = false;
}

// Validate confirm password and check if it matches:
if (empty($_POST['confirm'])) {
	print '<p class="error">Please confirm your password.</p>';
	$okay = false;
} elseif ($_POST['password'] != $_POST['confirm']) {
	print '<p class="error">Your passwords do not match.</p>';
	$okay = false;
}

// Validate year and check if it's numeric:
if (empty($_POST['year']) || $_POST['year'] == 'YYYY') {
	print '<p class="error">Please enter the year you were born.</p>';
	$okay = false;
} elseif (!is_numeric($_POST['year'])) {
	print '<p class="error">Please enter a valid numeric year.</p>';
	$okay = false;
}

// Validate color:
if (empty($_POST['color'])) {
	print '<p class="error">Please select your favorite color.</p>';
	$okay = false;
}

// Validate terms:
if (!isset($_POST['terms'])) {
	print '<p class="error">You must agree to the terms.</p>';
	$okay = false;
}
// If there were no errors, print a success message:
if ($okay) {
	print '<p class="success">You have been successfullly registered (but not really).</p>';
}
?>
</body>
</html>