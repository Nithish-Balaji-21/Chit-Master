<?php
// $connect = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection failed");
$connect= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
$sql = "SELECT 
            os.chit_id,
            os.chit_name,
            os.auctionstatus,
            os.monthlypay,
            os.kasar,
            os.commission_percent,
            os.amount_bidded,
            os.current_month,
            os.total_members,
            os.totalamount,
            ss.member1, ss.member2, ss.member3, ss.member4, ss.member5,
            ss.member6, ss.member7, ss.member8, ss.member9, ss.member10,
            ss.member11, ss.member12, ss.member13, ss.member14, ss.member15,
            ss.member16, ss.member17, ss.member18, ss.member19, ss.member20,
            ss.member21, ss.member22, ss.member23, ss.member24, ss.member25,
            ss.member26, ss.member27, ss.member28, ss.member29, ss.member30
        FROM 
            ongoing_scheme os
        LEFT JOIN 
            scheme_slots ss ON os.chit_id = ss.chit_id
        LIMIT 0, 1000";

$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongoing Schemes</title>
    
    
</head>
<body>
    <div class="container">
        <h1 class="heading">Ongoing Schemes</h1>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='mb-4'>";
                echo "<table class='table table-dark table-striped'>";
                echo "<tr><th>Chit ID</th><td>".$row["chit_id"]."</td></tr>";
                echo "<tr><th>Chit Name</th><td>".$row["chit_name"]."</td></tr>";
                echo "<tr><th>Auction Status</th><td>".($row["auctionstatus"] ? "Yes" : "No")."</td></tr>";
                echo "<tr><th>Monthly Pay</th><td>".$row["monthlypay"]."</td></tr>";
                echo "<tr><th>Kasar</th><td>".$row["kasar"]."</td></tr>";
                echo "<tr><th>Commission Percent</th><td>".$row["commission_percent"]."</td></tr>";
                echo "<tr><th>Amount Bidded</th><td>".$row["amount_bidded"]."</td></tr>";
                echo "<tr><th>Current Month</th><td>".$row["current_month"]."</td></tr>";
                echo "<tr><th>Total Members</th><td>".$row["total_members"]."</td></tr>";
                echo "<tr><th>Total Amount</th><td>".$row["totalamount"]."</td></tr>";
                echo "</table>";
               
                echo "<h3>Members in this Scheme</h3><br>";
               
                echo "<div class='member-table row'>";
               
                for ($col = 0; $col < 5; $col++) {
                    echo "<div class='member-column col-md-2'>";
                    echo "<table class='table table-dark table-bordered'>";
                    echo "<tr><th>Member</th><th>Name</th></tr>";
                    for ($row_num = 1; $row_num <= 6; $row_num++) {
                        $member_index = $col * 6 + $row_num;
                        $member = $row["member" . $member_index];
                        if (!empty($member)) {
                            echo "<tr><td>Member $member_index</td><td>$member</td></tr>";
                        }
                    }
                    echo "</table>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No ongoing schemes found.</p>";
        }
        $connect->close();
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
