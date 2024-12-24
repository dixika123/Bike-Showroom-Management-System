<?php
// Include necessary files
include('userclass.php');
include('../nav.php');
include('../config/constant.php');

// Initialize variables for form data
$name = $email = $phone = $add = $occ = $age = $model = '';

// Process form submission if POST method is used
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input fields
    $name = sanitize_input($_POST['Name']);
    $email = sanitize_input($_POST['Email']);
    $phone = sanitize_input($_POST['Phn']);
    $add = sanitize_input($_POST['Address']);
    $occ = sanitize_input($_POST['Occupation']);
    $age = isset($_POST['agegrp']) ? $_POST['agegrp'] : '';
    $model = isset($_POST['Bikemodel']) ? $_POST['Bikemodel'] : '';

    // Array to store validation errors
    $errors = array();

    // Validate each input field
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if (empty($phone)) {
        $errors['phone'] = "Phone number is required";
    } elseif (!preg_match("/^98\d{8}$/", $phone)) {
        $errors['phone'] = "Invalid phone number format. Must start with 98 and be 10 digits long";
    }

    if (empty($add)) {
        $errors['address'] = "Address is required";
    }

    if (empty($occ)) {
        $errors['occupation'] = "Occupation is required";
    }

    if (empty($age)) {
        $errors['age'] = "Please select an age group";
    }

    if ($model === '-') {
        $errors['model'] = "Please select a bike model";
    }

    // If there are no errors, proceed to send enquiry
    if (empty($errors)) {
        $fetch = new enquiry($conn);
        $query = $fetch->sendEnquiry($name, $email, $phone, $add, $occ, $age, $model);

        if ($query) {
            // Display success message and redirect
            echo "<script>alert('Enquiry sent successfully'); window.location.href = 'enquiry.php';</script>";
            exit();
        } else {
            echo "Enquiry not sent";
        }
    } else {
        // Display error alert if there are validation errors
        echo "<script>alert('Please correct the errors and try again');</script>";
    }
}

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- HTML form -->
<div class="header1">
    <h1>ENQUIRY FORM</h1>
    <div class="enquiry">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Name:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="Name" id="name" placeholder="Enter your name"
                        value="<?php echo htmlspecialchars($name); ?>" required>
                    <span class="error"><?php if(isset($errors['name'])) { echo $errors['name']; } ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Email:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="Email" id="email" placeholder="Enter your email"
                        value="<?php echo htmlspecialchars($email); ?>" required>
                    <span class="error"><?php if(isset($errors['email'])) { echo $errors['email']; } ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Licence">Mobile No.:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="Phn" id="phn" placeholder="Enter your mobile number"
                        value="<?php echo htmlspecialchars($phone); ?>" required>
                    <span class="error"><?php if(isset($errors['phone'])) { echo $errors['phone']; } ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Address:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="Address" id="address" placeholder="Enter your Address"
                        value="<?php echo htmlspecialchars($add); ?>" required>
                    <span class="error"><?php if(isset($errors['address'])) { echo $errors['address']; } ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Licence">Occupation:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="Occupation" id="licence" placeholder="Enter your occupation"
                        value="<?php echo htmlspecialchars($occ); ?>" required>
                    <span class="error"><?php if(isset($errors['occupation'])) { echo $errors['occupation']; } ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Licence">Age Group:</label>
                </div>
                <div class="col-75">
                    18-20 Years <input type="radio" name="agegrp" value="a" <?php if ($age === 'a') echo 'checked'; ?>>
                    &nbsp; &nbsp;
                    21-25 Years <input type="radio" name="agegrp" value="b" <?php if ($age === 'b') echo 'checked'; ?>>
                    &nbsp; &nbsp;
                    26-30 Years <input type="radio" name="agegrp" value="c" <?php if ($age === 'c') echo 'checked'; ?>>
                    &nbsp; &nbsp;
                    31-35 Years <input type="radio" name="agegrp" value="d" <?php if ($age === 'd') echo 'checked'; ?>>
                    &nbsp; &nbsp;
                    36-40 Years <input type="radio" name="agegrp" value="e" <?php if ($age === 'e') echo 'checked'; ?>>
                    &nbsp; &nbsp;
                    41-45 Years <input type="radio" name="agegrp" value="f" <?php if ($age === 'f') echo 'checked'; ?>>
                    &nbsp; &nbsp;
                    Above 45 Years <input type="radio" name="agegrp" value="g"
                        <?php if ($age === 'g') echo 'checked'; ?>> &nbsp; &nbsp;
                    <span class="error"><?php if(isset($errors['age'])) { echo $errors['age']; } ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="bikemodel">Bike Model:</label>
                </div>
                <div class="col-75">
                    <select id="bikemodel" name="Bikemodel" required>
                        <option value="-" <?php if ($model === '-') echo 'selected'; ?>>Select Model</option>
                        <option value="Jawa 350" <?php if ($model === 'Jawa 350') echo 'selected'; ?>>Jawa 350</option>
                        <option value="Jawa 42" <?php if ($model === 'Jawa 42') echo 'selected'; ?>>Jawa 42</option>
                        <option value="Perak" <?php if ($model === 'Perak') echo 'selected'; ?>>Perak</option>
                        <option value="Scrambler" <?php if ($model === 'Scrambler') echo 'selected'; ?>>Scrambler
                        </option>
                        <option value="Roadster" <?php if ($model === 'Roadster') echo 'selected'; ?>>Roadster</option>
                        <option value="Adventure" <?php if ($model === 'Adventure') echo 'selected'; ?>>Adventure
                        </option>
                    </select>
                    <span class="error"><?php if(isset($errors['model'])) { echo $errors['model']; } ?></span>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>

<?php
// Include footer file
include('../footer.php');
?>