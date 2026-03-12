<?php
// files.php - Display files in a directory
// Requirement: Display files in a directory

include('header.php');
?>

<h2>Event Information</h2>

<a href="dashboard.php" class="btn">Back to Dashboard</a>

<br><br>

<?php
// Requirement: Display files in a directory
// Point the directory variable at our images folder
$directory = "downloads/";

// Check if the directory exists
if (!is_dir($directory)) {
    echo "<div class='error'>Directory not found.</div>";
} else {
    // Get all files from the directory
    $files = scandir($directory);

    // Filter out the . and .. entries that scandir always includes
    $files = array_filter($files, function($file) {
        return $file !== '.' && $file !== '..';
    });

    // Check if there are any files to display
    if (count($files) == 0) {
        echo "<div class='error'>No files found in the images directory.</div>";
    } else {
        echo "<table>";
        echo "<tr>
                <th>File Name</th>
                <th>File Size</th>
                <th>File Type</th>
              </tr>";

        foreach ($files as $file) {
            // Build the full file path
            $filepath = $directory . $file;

            // Get file details
            $filesize = filesize($filepath);
            $filetype = pathinfo($filepath, PATHINFO_EXTENSION);

            // Convert file size to kilobytes for readability
            $filesize_kb = round($filesize / 1024, 2);

            echo "<tr>";
            echo "<td><a href='" .$directory . $file . "'>" . $file . "</a></td>";
            echo "<td>" . $filesize_kb . " KB</td>";
            echo "<td>" . strtoupper($filetype) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}
?>

<?php include('footer.php'); ?>