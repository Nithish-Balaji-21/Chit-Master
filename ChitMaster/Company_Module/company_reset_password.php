<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}
?>

<html>
<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <title>Reset Password</title>
    
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <form action="company_update_password.php" method="POST">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
            <input type="submit" name="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
