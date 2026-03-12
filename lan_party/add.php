<?php
// add.php - Add a new registrant to the database
// Requirement: Add new data (record) as in main/index page

include('header.php');
include('db.php');

// Reuse the same formatPhone function from index.php
function formatPhone($phone) {
    $cleaned = preg_replace('/[^0-9]/', '', $phone);
    if(strlen($cleaned) == 10) {
        return '(' . substr($cleaned, 0, 3) . ')' . substr($cleaned, 3, 3) . '-' . substr($cleaned, 6, 4);
    }
    return $phone;
}

// Reuse the same states array from index.php
$states = ["AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA",
           "HI","ID","IL","IN","IA","KS","KY","LA","ME","MD",
           "MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ",
           "NM","NY","NC","ND","OH","OK","OR","PA","RI","SC",
           "SD","TN","TX","UT","VT","VA","WA","WV","WI","WY"];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = trim($_POST["first_name"]);
    $last_name  = trim($_POST["last_name"]);
    $address    = trim($_POST["address"]);
    $city       = trim($_POST["city"]);
    $state      = trim($_POST["state"]);
    $phone      = formatPhone(trim($_POST["phone"]));
    $email      = trim($_POST["email"]);

    if (empty($first_name) || empty($last_name) || empty($address) ||
        empty($city) || empty($state) || empty($phone) || empty($email)) {
        $error = "All fields are required. Please fill out the entire form.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
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

<h2>Add New Registrant</h2>

<a href="dashboard.php" class="btn">Back to Dashboard</a>

<br><br>

<?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<form method="POST" action="add.php">

    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name"
           value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>"
           placeholder="Enter first name">

    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name"
           value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>"
           placeholder="Enter last name">

    <label for="address">Address</label>
    <input type="text" name="address" id="address"
           value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>"
           placeholder="Enter street address">

    <label for="city">City</label>
    <input type="text" name="city" id="city"
           value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>"
           placeholder="Enter city">

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

    <label for="phone">Phone Number</label>
    <input type="tel" name="phone" id="phone"
           value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"
           placeholder="Enter phone number">

    <label for="email">Email Address</label>
    <input type="email" name="email" id="email"
           value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"
           placeholder="Enter email address">

    <button type="submit" class="btn">Add Registrant</button>

</form>

<?php include('footer.php'); ?>