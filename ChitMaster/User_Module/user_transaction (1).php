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
<input type=submit name='mysubmit' id='hidden'>
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
    <title>Customer Login</title>
    
    
</head>
<body>
    <div class="login-container">
        <h1>Customer Login</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="log">Login</button>
            <a href="#">Forgot password?</a>
            <a href="user_signup_form.html" target="main_page.html">Don't have an account? <b>Register</b></a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
