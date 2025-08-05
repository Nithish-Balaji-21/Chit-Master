<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Scheme - Chit Fund Management</title>
    
</head>
<body>
    <?php
    // $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection Failed");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    if (isset($_POST['start'])) {
        $chitid = $_POST['chitid'];

        $check_scheme = "SELECT * FROM schemes WHERE chit_id = '$chitid'";
        $scheme_result = mysqli_query($con, $check_scheme);

        if (mysqli_num_rows($scheme_result) > 0) {
            $scheme = mysqli_fetch_assoc($scheme_result);

            $monthly_pay = ($scheme['totalamount'] / $scheme['totalcount']);
            $totalmembers = $scheme['totalcount'];

            // Checking if the required members joined or not
            $slots = mysqli_query($con, "SELECT currentcount, count FROM scheme_slots WHERE chit_id='$chitid'");
            $result = mysqli_fetch_assoc($slots);

            if ($result['currentcount'] != $result['count']) {
                echo "<script> alert('Required members haven\'t joined yet') </script>";
                exit();
            }
            $kasar = 0;

            // Inserting into ongoing_scheme
            $insert = "INSERT INTO ongoing_scheme (chit_id, chit_name, auctionstatus, monthlypay, kasar, commission_percent, amount_bidded, current_month, total_members, totalamount)
                       VALUES ('{$scheme['chit_id']}', '{$scheme['name']}', 0, '$monthly_pay', '$kasar', '{$scheme['commissionpercent']}', 0, 1, '$totalmembers', '{$scheme['totalamount']}')";

            if (mysqli_query($con, $insert)) {
                echo "<script> alert('Scheme ID $chitid has been successfully started') </script>";
                // Closing the scheme slots
                $query = mysqli_query($con, "UPDATE scheme_slots SET opened='1' WHERE chit_id='$chitid'");
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Scheme with ID $chitid does not exist in the schemes table.";
        }
    }
    mysqli_close($con);
    ?>

    <form method="POST" action="">
        <label for="chitid">Enter the scheme ID:</label>
        <input type="text" name="chitid" required>
        <br>
        <input type="submit" name="start" value="Start">
    </form>
</body>
</html>
