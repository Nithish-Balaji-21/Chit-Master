<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
    <title>Available Chit Schemes</title>
    
</head>
<body>

<h1>Available Chit Schemes</h1>

<?php
// $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT chit_id, name, totalamount, totalcount, duration, commissionpercent, startingdate, transaction_id FROM schemes";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>Chit ID</th>
                <th>Name</th>
                <th>Total Amount</th>
                <th>Total Members</th>
                <th>Duration (Months)</th>
                <th>Commission (%)</th>
                <th>Starting Date</th>
                <th>Transaction ID</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['chit_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['totalamount']}</td>
                <td>{$row['totalcount']}</td>
                <td>{$row['duration']}</td>
                <td>{$row['commissionpercent']}</td>
                <td>{$row['startingdate']}</td>
                <td>{$row['transaction_id']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No schemes found.</p>";
}

mysqli_close($con);
?>

</body>
</html>
