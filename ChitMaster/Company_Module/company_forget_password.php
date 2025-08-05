<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        <form action="company_verify_password.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="branch" placeholder="Branch" required>
            <input type="submit" name="submit" value="Verify">
        </form>
    </div>
</body>
</html>
