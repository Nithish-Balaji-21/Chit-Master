<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        <form action="user_verify_password.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="date" name="dob" placeholder="Date of Birth" required>
            <input type="mail" name="mail" placeholder="Email" required>
            <input type="submit" name="submit" value="Verify">
        </form>
    </div>
</body>
</html>
