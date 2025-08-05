<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.location.href = 'company_reset_password.php?username=" . $username . "';</script>";
        exit();
    }

   
   $conn= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $stmt = $conn->prepare("UPDATE admins SET pass = ? WHERE id = ?");
    $stmt->bind_param("ss", $password, $username);

    if ($stmt->execute()) {
        echo "<script>alert('Password updated successfully.'); window.location.href = 'company_login (1).php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
