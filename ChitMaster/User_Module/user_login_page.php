<?php
if (isset($_POST['log'])) {
    // $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("connection failed");
    $con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    $un = $_POST['username'];
    $pw = $_POST['password'];

    $query = "select * from users where username = '$un' and pass = '$pw'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
?>
<html>
<body>
<form method='post' action='user_main_page.php' id='hiddenform' target='main_page.html'>
<input type=hidden value='<?php echo $un; ?>' name=username>
<input type=hidden value='<?php echo $pw; ?>' name=password>
<input type="submit" name='mysubmit' id='hidden' >
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
    <link rel="stylesheet" href="../assets/css/user/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Chit Master</title>
    
</head>
<body>
    <div class="auth-form">
        <h1>Welcome Back</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-submit" name="log">Login</button>
            <div class="auth-links">
                <a href="user_forget_password.php">Forgot your password?</a>
                <a href="user_signup_formO.php">Don't have an account? <b>Register Now</b></a>
            </div>
        </form>
    </div>
</body>
</html>
