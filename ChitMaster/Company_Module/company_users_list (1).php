<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<?php
// $connect = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection failed");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");

$sql = "SELECT * FROM users";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "";

    echo "<div class='table-container'><table>";
    echo "<tr><th>ID</th><th>Name</th><th>User Status</th><th>DOB</th><th>Aadhar</th><th>Address</th><th>Email</th><th>Gender</th><th>Phone</th><th>Occupation</th><th>Retirement Year</th><th>Family Count</th><th>Account No</th><th>Monthly Income</th><th>Savings</th><th>EMI</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["userstatus"]."</td>";
        echo "<td>".$row["dob"]."</td>";
        echo "<td>".$row["aadhar"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["usergender"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>".$row["occupation"]."</td>";
        echo "<td>".$row["retirement_year"]."</td>";
        echo "<td>".$row["family_count"]."</td>";
        echo "<td>".$row["account_no"]."</td>";
        echo "<td>".$row["monthly_income"]."</td>";
        echo "<td>".$row["savings"]."</td>";
        echo "<td>".$row["useremi"]."</td>";
        echo "</tr>";
    }
    echo "</table></div>";
} else {
    echo "0 results";
}

$connect->close();
?>
