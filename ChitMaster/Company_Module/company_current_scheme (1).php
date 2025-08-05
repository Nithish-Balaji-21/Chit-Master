<?php
// $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster");

if ($con) {
    // Connection successful
} else {
    // Connection failed
}

$query = "SELECT * FROM schemes";
$result = mysqli_query($con, $query);
$schemes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <link rel="stylesheet" href="../assets/css/company/table-styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Schemes - Chit Master</title>
</head>
<body>
    <div class="schemes-container">
        <h1>Current Schemes</h1>
        <div class="table-responsive">
            <table class="schemes-table">
                <thead>
                    <tr>
                        <th>Chit ID</th>
                        <th>Chit Name</th>
                        <th>Duration</th>
                        <th>Total Members</th>
                        <th>Total Amount</th>
                        <th>Commission %</th>
                        <th>Expected Starting Date</th>
                        <th>Transaction ID</th>
                    </tr>
                </thead>
            <tbody>
                <?php if (!empty($schemes)) { ?>
                    <?php foreach ($schemes as $scheme) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($scheme['chit_id']); ?></td>
                            <td><?php echo htmlspecialchars($scheme['name']); ?></td>
                            <td><?php echo htmlspecialchars($scheme['duration']); ?> months</td>
                            <td><?php echo htmlspecialchars($scheme['totalcount']); ?></td>
                            <td>₹<?php echo number_format($scheme['totalamount'], 2); ?></td>
                            <td><?php echo htmlspecialchars($scheme['commissionpercent']); ?>%</td>
                            <td><?php echo date('d M Y', strtotime($scheme['startingdate'])); ?></td>
                            <td><?php echo htmlspecialchars($scheme['transaction_id']); ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="8" class="no-schemes">No schemes available at the moment.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>
