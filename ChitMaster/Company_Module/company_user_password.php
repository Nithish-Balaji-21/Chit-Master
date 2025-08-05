<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $email = $_POST['mail'];

$conn= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND branch = ? ");
    $stmt->bind_param("sss", $username, $branch);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: company_reset_password.php?username=" . $username);
    } else {
        echo "<script>alert('Invalid username,branch'); window.location.href = 'company_forget_password.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
