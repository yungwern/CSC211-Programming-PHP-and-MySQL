<?php
// delete.php - Delete a single record from the database
// Requirement: Delete a single record

include('header.php');
include('db.php');

$error = "";
$success = "";

// Check if a delete request was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Make sure an ID was actually selected
    if (empty($id)) {
        $error = "Please select a registrant to delete.";
    } else {
        $sql = "DELETE FROM registrants WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $success = "Registrant successfully deleted.";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}

// Query all remaining records to display in the dropdown
$sql = "SELECT * FROM registrants";
$result = mysqli_query($conn, $sql);
?>

<h2>Delete a Registrant</h2>

<a href="dashboard.php" class="btn">Back to Dashboard</a>

<br><br>

<?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="success"><?php echo $success; ?></div>
<?php endif; ?>

<?php if (mysqli_num_rows($result) == 0): ?>
    <div class="error">No registrants found in the database.</div>
<?php else: ?>

    <p>Select a registrant from the list below to delete them.</p>

    <br>

    <form method="POST" action="delete.php">
        <label for="id">Select Registrant</label>
        <select name="id" id="id" style="width:100%; padding:9px 12px; margin-bottom:16px; border:1px solid #cccccc; border-radius:4px; font-size:15px;">
            <option value="">-- Select a Registrant --</option>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['first_name'] . " " . $row['last_name'] . " (ID: " . $row['id'] . ")"; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <button type="submit" class="btn btn-danger">Delete Registrant</button>
    </form>

<?php endif; ?>

<?php include('footer.php'); ?>