<?php
// index.php - Main registration form page
// Requirement: Use of index.php
// Requirement: Using a picture for a professional look

include('header.php');
include('db.php');

// Requirement: Demonstrate the use of a function
function formatPhone($phone) {
    // Strips everything except numbers and then formats as (xxx) xxx-xxxx
    $cleaned = preg_replace('/[^0-9]/', '', $phone);
    if(strlen($cleaned) == 10) {
        return '(' . substr($cleaned, 0, 3) . ') ' . substr($cleaned, 3, 3) . '-' . substr($cleaned, 6, 4);
    }
    return $phone; // return original if not 10 digits
}

// Requirement: Demonstrate the use of an array
$states = ["AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA",
           "HI","ID","IL","IN","IA","KS","KY","LA","ME","MD",
           "MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ",
           "NM","NY","NC","ND","OH","OK","OR","PA","RI","SC",
           "SD","TN","TX","UT","VT","VA","WA","WV","WI","WY"];

$success = "";
$error = "";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Grab and sanitize form values
    $first_name = trim($_POST["first_name"]);
    $last_name  = trim($_POST["last_name"]);
    $address    = trim($_POST["address"]);
    $city       = trim($_POST["city"]);
    $state      = trim($_POST["state"]);
    $phone      = formatPhone(trim($_POST["phone"]));
    $email      = trim($_POST["email"]);

    // Requirement: Use of a control structure
    // Validate that all fields are filled in and email is valid
    if (empty($first_name) || empty($last_name) || empty($address) ||
        empty($city) || empty($state) || empty($phone) || empty($email)) {
        $error = "All fields are required. Please fill out the entire form.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Requirement: Email address with validation of correct email formatting
        $error = "Please enter a valid email address.";
    } else {
        // Requirement: Work with concatenating a string
        $full_name = $first_name . " " . $last_name;

        // Requirement: Modify a string using string modify options
        $full_name = ucwords(strtolower($full_name));

        // Requirement: Save data to the database
        $sql = "INSERT INTO registrants (first_name, last_name, address, city, state, phone, email)
                VALUES ('$first_name', '$last_name', '$address', '$city', '$state', '$phone', '$email')";

        if (mysqli_query($conn, $sql)) {
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>

<!-- Requirement: Using a picture for a professional look -->
<img src="images/banner.jpg" alt="LAN Party Banner" style="width:100%; border-radius: 4px; margin-bottom:20px;">

<h2>Event Registration</h2>

<!-- Display error or success message -->
<?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<form method="POST" action="index.php">

    <!-- Requirement: First Name -->
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name"
           value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>"
           placeholder="Enter your first name">

    <!-- Requirement: Last Name -->
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name"
           value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>"
           placeholder="Enter your last name">

    <!-- Requirement: Address -->
    <label for="address">Address</label>
    <input type="text" name="address" id="address"
           value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>"
           placeholder="Enter your street address">

    <!-- Requirement: City -->
    <label for="city">City</label>
    <input type="text" name="city" id="city"
           value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>"
           placeholder="Enter your city">

    <!-- Requirement: State (dropdown using array) -->
    <label for="state">State</label>
    <select name="state" id="state" style="width:100%; padding:9px 12px; margin-bottom:16px; border:1px solid #cccccc; border-radius:4px; font-size:15px;">
        <option value="">-- Select State --</option>
        <?php foreach ($states as $s): ?>
            <option value="<?php echo $s; ?>"
                <?php echo (isset($_POST['state']) && $_POST['state'] == $s) ? 'selected' : ''; ?>>
                <?php echo $s; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Requirement: Phone Number -->
    <label for="phone">Phone Number</label>
    <input type="tel" name="phone" id="phone"
           value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"
           placeholder="Enter your phone number">

    <!-- Requirement: Email Address with validation -->
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email"
           value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"
           placeholder="Enter your email address">

    <button type="submit" class="btn">Register</button>

</form>

<?php include('footer.php'); ?>