<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
<h1>Mmm...soups</h1>
<?php // Script 7.1 - soups1.php
// This script creates and prints out an array.
// Address error management, if you want.

// Create the array:
$soups = [
	'Monday' => 'Clam Chowder',
	'Tuesday' => 'White Chicken Chili',
	'Wednesday' => 'Vegetarian',
	'Thursday' => 'Chicken Noodle',
];

// Add three items to the array:
$soups['Friday'] = 'Tomato';
$soups['Saturday'] = 'Broccoli Cheddar';
$soups['Sunday'] = 'French Onion';

// Print the contents of the array:
foreach ($soups as $day => $soup) {
	print "<p>$day: $soup</p>\n";
}

?>
</body>
</html>

