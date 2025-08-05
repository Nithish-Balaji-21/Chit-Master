<?php
// Database connection
// $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user monthly payments
$query_user = "SELECT * FROM user_monthly_payments";
$result_user = mysqli_query($con, $query_user);

if (!$result_user) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch all user monthly payments into an array
$user_payments = mysqli_fetch_all($result_user, MYSQLI_ASSOC);

// Fetch company monthly payments
$query_company = "SELECT * FROM company_monthly_payments";
$result_company = mysqli_query($con, $query_company);

if (!$result_company) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch all company monthly payments into an array
$company_payments = mysqli_fetch_all($result_company, MYSQLI_ASSOC);

// Close the connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <title>Payment Receipts</title>
    
</head>
<body>
    <div class="receipt">
        <h2>User Monthly Payments</h2>
        <?php if (!empty($user_payments)): ?>
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
            <?php foreach ($user_payments as $payment): ?>
            <tr>
                <td><?php echo htmlspecialchars($payment['payment_id']); ?></td>
                <td><?php echo htmlspecialchars($payment['user_id']); ?></td>
                <td><?php echo htmlspecialchars($payment['chit_id']); ?></td>
                <td><?php echo htmlspecialchars($payment['month']); ?></td>
                <td><?php echo htmlspecialchars($payment['year']); ?></td>
                <td><?php echo htmlspecialchars($payment['amount']); ?></td>
                <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
                <td><?php echo ucfirst(htmlspecialchars($payment['payment_status'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>No user payment receipts found.</p>
        <?php endif; ?>
    </div>

    <div class="receipt">
        <h2>Company Monthly Payments</h2>
        <?php if (!empty($company_payments)): ?>
        <table>
            <tr>
                <th>Payment ID</th>
                <th>User ID</th>
                <th>Chit ID</th>
                <th>Month</th>
                <th>Year</th>
                <th>Amount</th>
                <th>Payment Date</th>
            </tr>
            <?php foreach ($company_payments as $payment): ?>
            <tr>
                <td><?php echo htmlspecialchars($payment['payment_id']); ?></td>
                <td><?php echo htmlspecialchars($payment['user_id']); ?></td>
                <td><?php echo htmlspecialchars($payment['chit_id']); ?></td>
                <td><?php echo htmlspecialchars($payment['month']); ?></td>
                <td><?php echo htmlspecialchars($payment['year']); ?></td>
                <td><?php echo htmlspecialchars($payment['amount']); ?></td>
                <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>No company payment receipts found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
