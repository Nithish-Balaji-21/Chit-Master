<?php

if (isset($_POST['userreceipts'])) {
    $username = $_POST['username'];
    echo "$username";
}

// Database connection
// $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch payment details
$query = "SELECT * FROM user_monthly_payments where user_id='$username'";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch all results into an array
$payments = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
    <title>Payment Receipt</title>
    
</head>
<body>
    <div class="receipt">
        <h2>Payment Receipt</h2>
        <?php if (!empty($payments)): ?>
        <table>
            <tr>
                <th>Payment ID</th>
                <th>User ID</th>
                <th>Chit ID</th>
                <th>Month</th>
                <th>Year</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Status</th>
            </tr>
            <?php foreach ($payments as $payment): ?>
            <tr>
                <td><?php echo $payment['payment_id']; ?></td>
                <td><?php echo $payment['user_id']; ?></td>
                <td><?php echo $payment['chit_id']; ?></td>
                <td><?php echo $payment['month']; ?></td>
                <td><?php echo $payment['year']; ?></td>
                <td><?php echo $payment['amount']; ?></td>
                <td><?php echo $payment['payment_date']; ?></td>
                <td><?php echo ucfirst($payment['payment_status']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>No payment receipts found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
