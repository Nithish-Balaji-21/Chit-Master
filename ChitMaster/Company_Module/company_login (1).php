<?php
if (isset($_POST['log'])) {
    // $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection failed");
    $con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    $un = $_POST['username'];
    $pw = $_POST['password'];

    $query = "SELECT * FROM admins WHERE id = '$un' AND pass = '$pw'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $Admindetails = mysqli_fetch_assoc($result);
        $transaction_id = $Admindetails['transactionid'];
        echo '<script>alert("Login successful.")</script>';
        ?>
        <html>
        <body>
        <form method="post" action="company_main_page (1).php" id="hiddenform" target="_self">
            <input type="hidden" value="<?php echo $un; ?>" name="username">
            <input type="hidden" value="<?php echo $pw; ?>" name="password">
            <input type="hidden" value="<?php echo $transaction_id; ?>" name="transaction_id">
            <input type="submit" name="mysubmit" id="hidden" style="display:none">
        </form>
        <script>
            document.getElementById('hidden').click();
        </script>
        </body>
        </html>
        <?php
    } else {
        echo '<script>alert("Incorrect username or password")</script>';    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Chit Master</title>
    
</head>
<body>

<nav class="navbar">
        <a href="../main_page.html" class="navbar-logo">
            <img src="../assets/images/logo.png" alt="Chit Master Logo">
            <span>Chit Master</span>
        </a>
</nav>

<div class="login-form">
    <div class="form-header">
        <h1>Admin Login</h1>
        <p>Welcome back! Please enter your credentials.</p>
    </div>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Admin ID</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your admin ID" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <input type="submit" value="Login" class="btn btn-primary" name="log">
        <div class="form-footer">
            <a href="company_forget_password.php">Forgot password?</a>
            <a href="../main_page.html">Back to Home</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
