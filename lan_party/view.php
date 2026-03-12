<?php
// view.php - Display complete contents of database
// Requirement: Display complete contents of database in proper formatting

include('header.php');
include('db.php');
?>

<h2>All Registrants</h2>

<a href="dashboard.php" class="btn">Back to Dashboard</a>

<?php
// Query to get all records from the database
$sql = "SELECT * FROM registrants";
$result = mysqli_query($conn, $sql);

// Requirement: Use of a control structure
// Check if there are any records before trying to display them
if (mysqli_num_rows($result) == 0) {
    echo "<div class='error'>No registrants found in the database.</div>";
} else {
    // Display records in a table
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Phone</th>
            <th>Email</th>
          </tr>";

    // Loop through each record and display it as a table row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

<?php include('footer.php'); ?>