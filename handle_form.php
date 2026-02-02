<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Your Feedback</title>
</head>
<body>
<?php // Script 3.4 handle_form.php #2

ini_set('display_errors', 1); // Let me learn from my mistakes!

//This page recieves the data from feedback.html
// It will recieve: title, first name, last name,
// email, response, comments, and submit in $_POST.

// Create shorthand versions of the variables:
$title = $_POST['title'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$response = $_POST['response'];
$comments = $_POST['comments'];

//Print the recieved data:
print "<p>Thank you, $title $first_name $last_name
for your comments.</p>
<p>You stated that you found this example to be '$response' and
added:<br>$comments</p>";

?>
</body>
</html>