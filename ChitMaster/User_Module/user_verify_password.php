<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $email = $_POST['mail'];

    // $servername = "localhost";
    // $username_db = "root";  
    // $password_db = "Nithish@21";  
    // $dbname = "chit_fund3";  

    // $conn = new mysqli($servername, $username_db, $password_db, $dbname);
$conn= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND dob = ? AND email = ?");
    $stmt->bind_param("sss", $username, $dob, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: user_reset_password.php?username=" . $username);
    } else {
        echo "<script>alert('Invalid username, date of birth, or email.'); window.location.href = 'user_forget_password.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
