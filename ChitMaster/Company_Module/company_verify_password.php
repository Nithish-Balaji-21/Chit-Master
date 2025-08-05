<?php
if (isset($_POST['submit'])) {
    $id = $_POST['username'];
    $branch = $_POST['branch'];

    // $servername = "localhost";
    // $username_db = "root";  
    // $password_db = "Nithish@21";  
    // $dbname = "chit_fund3";  

    // $conn = new mysqli($servername, $username_db, $password_db, $dbname);
$conn= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM admins WHERE id = ? AND branch = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $id, $branch);
    if ($stmt->execute() === false) {
        die("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        header("Location: company_reset_password.php?id=" . $id);
        exit(); // Ensure the script stops executing after the redirect
    } else {
        echo "<script>alert('Invalid username, Branch'); window.location.href = 'company_forget_password.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
