<?php
// $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection Failed");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
if (isset($_POST['end_auction'])) {
    $chitid = $_POST['chitid'];

    $check_scheme = "SELECT * FROM ongoing_scheme WHERE chit_id = '$chitid'";
    $scheme_result = mysqli_query($con, $check_scheme);

    if (mysqli_num_rows($scheme_result) > 0) {
        $scheme = mysqli_fetch_assoc($scheme_result);
        $update_0 = "UPDATE ongoing_scheme SET auctionstatus = 0 WHERE chit_id = '$chitid'";

        if (mysqli_query($con, $update_0)) {
            $query = "SELECT customer_bidded, amount_bidded, current_month FROM ongoing_scheme WHERE chit_id ='$chitid'";
            $execute = mysqli_query($con, $query);
            $ongoingscheme_details = mysqli_fetch_assoc($execute);

            if ($ongoingscheme_details['current_month'] != 1) {
                $customer_id = $ongoingscheme_details['customer_bidded'];
                $current_month = $ongoingscheme_details['current_month'];
                $amount_bidded = $ongoingscheme_details['amount_bidded'];

                $query = "INSERT INTO customers_bidded(chit_id, customer_bidded, amount, on_month) 
                          VALUES ('$chitid', '$customer_id', '$amount_bidded', $current_month)";
                if (mysqli_query($con, $query)) {
                    echo "<script> alert('The winner of the auction is $customer_id') </script>";
                }
            }

            echo "<script> alert('Auction for scheme ID $chitid has been successfully ended') </script>";
        } else {
            echo "Scheme with ID $chitid does not exist ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>End Auction - Chit Fund Management</title>
    
</head>
<body>
    <form method="POST" action="">
        <label for="chitid">Chit ID</label>
        <input type="text" name="chitid" placeholder="CHIT ID" required>
        <br>
        <input type="submit" name="end_auction" value="End Auction">
    </form>
</body>
</html>
