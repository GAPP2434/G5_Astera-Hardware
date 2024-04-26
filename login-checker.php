<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }

        .message {
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        .welcome {
            color: #4CAF50;
            font-size: 24px;
            font-weight: bold;
        }

        .info {
            color: red;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <a href="login.html">Back<br><br></a>

    <div class="message">
        <?php
        include 'dbcon.php';
        session_start();

        if(isset($_POST['login'])){
            date_default_timezone_set('Asia/Manila');
            $currentdate = date('Y-m-d H:i:s');

            $username = $_POST['username'];
            $password = $_POST['password'];

            // Retrieve the hashed password and fullname from the database for the given username (case-sensitive)
            $query = "SELECT dPassword, dUserType FROM tblusers WHERE BINARY dUsername = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $hashedPassword, $userType);

            $count = mysqli_stmt_num_rows($stmt);
            
            if ($count != 0) {
                mysqli_stmt_fetch($stmt);

                // Verify the entered password against the hashed password
                if (password_verify($password, $hashedPassword)) {
                    // Password is correct

                    // Insert login history
                    $insertLog = mysqli_query($conn, "INSERT INTO `tbllogs`(`dUsername`, `dType`, `dRemark`, `dDate`) 
                        VALUES ('".$username."','User','LOGIN','".$currentdate."')");

                    $_SESSION['username'] = $username;

                    // Redirect based on user type
                    if ($userType == 'user') {
                        header("Location: homepage-user.php");
                    } elseif ($userType == 'admin') {
                        header("Location: homepage-user.php");
                    }
                } else {
                    // Password is incorrect
                    echo "<p class='info'>Invalid username or password</p>";
                }
            } else {
                // Username not found in the database
                echo "<p class='info'>Invalid username or password</p>";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
