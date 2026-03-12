<?php
// dashboard.php - Post-registration dashboard page
// Requirement: Each page has a proper header and footer
// Requirement: Has a title
// Requirement: Displays appropriate copyright and author information

include('header.php');
include('db.php');
?>

<h2>Registration Dashboard</h2>

<p>Welcome! Use the options below to manage event registrations.</p>

<br>

<!-- Requirement: Working options/buttons -->

<!-- Display complete contents of database -->
<a href="view.php" class="btn">View All Registrants</a>

<!-- Add new data/record -->
<a href="add.php" class="btn">Add New Registrant</a>

<!-- Delete a single record -->
<a href="delete.php" class="btn btn-danger">Delete a Registrant</a>

<!-- Display files in a directory -->
<a href="files.php" class="btn">View Event Info</a>

<?php
// Requirement: Compare 2 data fields using substrings
// Check if the most recently added registrant looks similar to any previous record
$sql = "SELECT first_name, last_name FROM registrants ORDER BY id DESC LIMIT 2";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (count($rows) >= 2) {
    $newest = $rows[0];
    $previous = $rows[1];

    // Grab substrings to compare
    $new_first_sub = substr($newest['first_name'], 0, 3);
    $new_last_sub  = substr($newest['last_name'], 0, 3);
    $prev_first_sub = substr($previous['first_name'], 0, 3);
    $prev_last_sub  = substr($previous['last_name'], 0, 3);

    echo "<br>";
    if ($new_first_sub == $prev_first_sub && $new_last_sub == $prev_last_sub) {
        echo "<div class='error'>Warning: The new registrant looks similar to an existing record. Possible duplicate!</div>";
    } else {
        echo "<div class='success'>No duplicate registrants detected.</div>";
    }
}
?>

<?php include('footer.php'); ?>