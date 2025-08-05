<?php
// $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("Connection Failed");
$con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");

if (isset($_POST['start'])) {
    $chitid = $_POST['chitid'];

    $check_scheme = "SELECT * FROM schemes WHERE chit_id = '$chitid'";
    $scheme_result = mysqli_query($con, $check_scheme);

    if (mysqli_num_rows($scheme_result) > 0) {
        $scheme = mysqli_fetch_assoc($scheme_result);

        $monthly_pay = ($scheme['totalamount'] / $scheme['totalcount']);//(($scheme['totalamount']/100)*$scheme['commissionpercent']);

        $totalmembers=$scheme['totalcount'];

        //Checking if the required members joined or not

        $slots=mysqli_query($con,"select currentcount,count from scheme_slots where chit_id='$chitid'");

        $result=mysqli_fetch_assoc($slots);
        //checking if the required members joined the schemes to start
        if($result['currentcount']!= $result['count'] )
        {
            echo "<script> alert('Required members havent joined yet') </script>";
            exit();
        }
        $kasar=0;   

        //Calucating the kasar amount
        //$kasar=($scheme['totalamount']/$scheme['totalcount'])-(($schemet['totalamount']/100)*$scheme['commissionpercent']);
        
        $insert = "INSERT INTO ongoing_scheme (chit_id, chit_name, auctionstatus, monthlypay, kasar, commission_percent, amount_bidded, current_month,total_members,totalamount)
                   VALUES ('{$scheme['chit_id']}', '{$scheme['name']}',0, '$monthly_pay','$kasar', '{$scheme['commissionpercent']}', 0 , 1,'$totalmembers','{$scheme['totalamount']}')";
      
        if (mysqli_query($con, $insert)) {
            echo "Scheme ID $chitid has been successfully added to the ongoing table.";
            //Closing the scheme slots
                $query=mysqli_query($con,"update scheme_slots set opened='0' where chit_id='$chitid'");
            
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo'<script> alert ("Scheme with ID $chitid does not exist in the schemes table.")</script>';
    }
}
mysqli_close($con);
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Scheme</title>
    <!-- Bootstrap CSS -->
    
    <!-- Custom CSS -->
    
</head>
<body>
    <div class="scheme-form">
        <h1>Start Scheme</h1>
        <form method="POST" action="">
            <label for="chitid">Enter the scheme id:</label>
            <input type="text" name="chitid" required>
            <br>
            <input type="submit" name="start" value="Start">
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

