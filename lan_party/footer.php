<?php
// footer.php - Shared footer file included on every page
// Requirement: Use of the include() directive
// Requirement: Each page has a proper footer
// Requirement: Displays appropriate copyright and author information
?>

</div> <!-- closes the .container div that was opened in header.php -->

<div class="footer">
    <p>
        <?php
        // Requirement: Perform math using PHP code (using variables, not direct numbers)
        $current_year = date("Y");
        $start_year = 2024;
        $years_running = $current_year - $start_year;
        echo "Running for " . $years_running . " years!";
        ?>
    </p>
    <p>&copy; <?php echo date("Y"); ?> LAN Party Registration | Eli Werner | CSC211</p>
</div>

</body>
</html>