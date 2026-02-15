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

// Count and print the current number of elements:
$count1 = count($soups);
print "<p>The soups array originally had $count1 elements.</p>";

// Add three items to the array:
$soups['Friday'] = 'Tomato';
$soups['Saturday'] = 'Broccoli Cheddar';
$soups['Sunday'] = 'French Onion';

// Count and print the number of elements again:
$count2 = count($soups);
print "<p>After adding 3 more soups, the array now has $count2 elements.</p>";

// Print the contents of the array:
print_r($soups);

?>
</body>
</html>

