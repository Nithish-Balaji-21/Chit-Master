<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Auction - Chit Fund Management</title>
    
</head>
<body>
    <?php
    // $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection Failed");
    $con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");

    if (isset($_POST['start_auction'])) {

        $chitid = $_POST['chitid'];

        // Check if the scheme exists
        $query = mysqli_query($con, "SELECT * FROM schemes WHERE chit_id ='$chitid'");
        if (mysqli_num_rows($query) == 0) {
            echo "<script> alert('Invalid scheme id') </script>";
            exit();
        }
        $schemedata = mysqli_fetch_assoc($query);

        // Check if the scheme is already ongoing
        $check_scheme = "SELECT * FROM ongoing_scheme WHERE chit_id = '$chitid'";
        $execute = mysqli_query($con, $check_scheme);
        $ongoingdata = mysqli_fetch_assoc($execute);

        if ($schemedata['duration'] == $ongoingdata['current_month']) {
            echo "<script> alert('Auctions has limit reached for this scheme') </script>";
            exit();
        }

        // Incrementing month
        $execute = mysqli_query($con, "SELECT duration FROM schemes WHERE chit_id ='$chitid'");
        $schemedata = mysqli_fetch_assoc($execute);

        $increment_month = mysqli_query($con, "UPDATE ongoing_scheme SET current_month = current_month + 1 WHERE chit_id = '$chitid'");

        // Setting minimum bidding amount
        $query = "SELECT totalamount, commissionpercent, totalcount FROM schemes WHERE chit_id='$chitid' ";
        $execute = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($execute);

        $monthly_pay = ($data['totalamount'] / $data['totalcount']);
        $minimum_bid = $data['totalamount'] - (($data['totalamount'] / 100) * $data['commissionpercent']);

        // Resetting the bid amount and bidded customer
        $query = "UPDATE ongoing_scheme SET amount_bidded = '$minimum_bid', customer_bidded = 'null' WHERE chit_id = '$chitid' ";
        $execute = mysqli_query($con, $query);

        $placeholder = "NO ONE STARTED";

        $scheme_result = mysqli_query($con, $check_scheme);

        if (mysqli_num_rows($scheme_result) > 0) {
            $scheme = mysqli_fetch_assoc($scheme_result);

            $update_1 = "UPDATE ongoing_scheme SET auctionstatus = 1, customer_bidded='$placeholder', amount_bidded='$minimum_bid', monthlypay='$monthly_pay' WHERE chit_id = '$chitid'";

            if (mysqli_query($con, $update_1)) {
                echo "<script> alert('Auction for scheme ID $chitid has been successfully started') </script>";
            } else {
                echo "Error updating auction status: " . mysqli_error($con);
            }
        } else {
            echo "Scheme with ID $chitid does not exist";
        }
    }

    mysqli_close($con);
    ?>

    <form method="POST" action="company_start_auction (2).php">
        <label for="chitid">Chit ID</label>
        <input type="text" name="chitid" placeholder="CHIT ID" required>
        <br>
        <input type="submit" name="start_auction" value="Start Auction"> 
    </form>
</body>
</html>
