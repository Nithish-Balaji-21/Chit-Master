<?php
// $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection Failed");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
if (isset($_POST['end'])) {
    $chit_id = $_POST['chit_id'];

    $query = "SELECT chit_name, commission_percent, total_members, totalamount, current_month FROM ongoing_scheme WHERE chit_id = '$chit_id'";
    $execute = mysqli_query($con, $query);
    $chit_details = mysqli_fetch_assoc($execute);

    $chit_name = $chit_details['chit_name'];
    $commission_percent = $chit_details['commission_percent'];
    $totalmembers = $chit_details['total_members'];
    $totalamount = $chit_details['totalamount'];
    $current_month = $chit_details['current_month'];

    $execute = mysqli_query($con, "SELECT duration FROM schemes WHERE chit_id = '$chit_id'");
    $scheme_data = mysqli_fetch_assoc($execute);
    $total_months = $scheme_data['duration'];

    if ($total_months == $current_month) {
        $query = "INSERT INTO ended_scheme (chit_id, chit_name, commission_percent, total_members, total_amount) 
                  VALUES ('$chit_id', '$chit_name', '$commission_percent', '$totalmembers', '$totalamount')";

        if (mysqli_query($con, $query)) {
            echo "<script>alert('Scheme ended successfully');</script>";
        } else {
            echo "<script>alert('Error occurred while closing the scheme');</script>";
        }
    } else if ($current_month < $total_months) {
        echo "<script>alert('Total duration of the scheme hasn\'t completed yet');</script>";
    } else if ($current_month > $total_months) {
        echo "<script>alert('CLOSE THE SCHEME MANUALLY IN THE DATABASE (DURATION CROSSED)');</script>";
    }
}
?>
<body>
    <head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Schemes to be Ended</h1>
    </head>
    <form method="post">
        <label for="chit_id">Enter the chit ID:</label>
        <input type="text" id="chit_id" name="chit_id" required>
        <input type="submit" name="end" value="End">
    </form>

    <h2>Ended Schemes</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Chit ID</th>
                    <th>Chit Name</th>
                    <th>Commission Percent</th>
                    <th>Total Members</th>
                    <th>Total Amount</th>
                    <th>Ended Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Your PHP code to generate rows goes here
                $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3");
                $query = "SELECT * FROM ended_scheme";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['chit_id']}</td>";
                    echo "<td>{$row['chit_name']}</td>";
                    echo "<td>{$row['commission_percent']}</td>";
                    echo "<td>{$row['total_members']}</td>";
                    echo "<td>{$row['total_amount']}</td>";
                    echo "<td>{$row['ended_date']}</td>";
                    echo "</tr>";
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div> </body>
