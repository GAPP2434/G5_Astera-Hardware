<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        .message-box {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <a href="login.html">Back<br><br><br></a>

    <?php
    include 'dbcon.php';

    date_default_timezone_set('Asia/Manila');
    $currentdate = date('Y-m-d H:i:s');

    $SFname = $_POST['Sfullname'];
    $SUsername = $_POST['Susername'];
    $SEmail = $_POST['Semail'];
    $SPassword = $_POST['Spassword'];
    $SCPassword = $_POST['Scpassword'];
    $SCourse = $_POST['Scourse'];
    $SYear = $_POST['Syear'];

    // Validation
    $errors = [];

    // Validate Full Name
    if (strlen($SFname) < 3 || strlen($SFname) > 50) {
        $errors[] = "Full Name must be between 3 and 50 characters long.";
    }

    // Validate Username
    if (strlen($SUsername) < 3 || strlen($SUsername) > 20) {
        $errors[] = "Username must be between 3 and 20 characters long.";
    }

    // Validate Email
    if (!filter_var($SEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate Password
    if (strlen($SPassword) < 4 || strlen($SPassword) > 20) {
        $errors[] = "Password must be between 4 and 20 characters long.";
    } elseif ($SPassword !== $SCPassword) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        echo "<div class='message-box'>";
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
        echo "</div>";
    } else {
        // If validation passes, encrypt the password
        $hashedPassword = password_hash($SPassword, PASSWORD_DEFAULT);

        // Proceed with database operations
        $selectuser = "SELECT * FROM tblusers WHERE BINARY dUsername = '".$SUsername."'";
        $selecteduser = mysqli_query($conn, $selectuser);
        $countentry = mysqli_num_rows($selecteduser);

        if ($countentry == 0) {
            $signup = mysqli_query($conn, "INSERT INTO `tblusers`(`dUsername`, `dPassword`, `dFullname`, `status`, `dCourse`, `dYear`, `dEmail`) 
            VALUES ('".$SUsername."','".$hashedPassword."','".$SFname."','active', '".$SCourse."','".$SYear."','".$SEmail."')");
            
            if ($signup) {
                $signuplog = mysqli_query($conn, "INSERT INTO `tblregisterlogs`(`dUsername`, `dRegisterDate`) 
                VALUES ('".$SUsername."','".$currentdate."')");
                echo "<div class='message-box'><p class='success'>Successfully Registered</p></div>";
                
            } else {
                echo "<div class='message-box'><p class='error'>Error: " . mysqli_error($conn) . "</p></div>";
            }
        } else {
            echo "<div class='message-box'><p class='error'>Username already exists</p></div>";
        }
    }
    ?>
</body>
</html>
