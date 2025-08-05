<?php
if(isset($_POST['create_scheme']))
{
    $transaction_id=$_POST['transaction_id'];
}    

if(isset($_POST['create']))
{
    $con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster");
    $sec_con=mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster");

    $SchemeName=$_POST['schemename'];
    $TotalAMount=$_POST['totalamount'];
    $TotalMembers=$_POST['totalcount'];
    $SchemeDuration=$_POST['schemeduration'];
    $SchemeCommission=$_POST['schemecommission'];
    $StartingDate=$_POST['startingdate'];
    $TransactionId=$_POST['transactionid'];
    $random= uniqid('',true);
    $shortened_id = substr(md5($random), 0, 4); 
    $id="chit".$shortened_id;

    if($SchemeDuration!=$TotalMembers)
    {
        ?> <script> alert('Month and members should be equal');</script><?php
        exit();
    }
    $query=mysqli_query($con,"insert into schemes(chit_id,name,totalamount,totalcount,duration,commissionpercent,startingdate,transaction_id) values 
    ('$id','$SchemeName','$TotalAMount',' $TotalMembers','$SchemeDuration','$SchemeCommission','$StartingDate','$TransactionId')");
    $query=mysqli_query($con,"insert into scheme_slots(chit_id,opened,count,currentcount) values('$id',true,'$TotalMembers','0')");
    ?> 
    <script> alert('The scheme is successfully created ')</script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/company/style.css">
    <link rel="stylesheet" href="../assets/css/company/scheme-form.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Scheme - Chit Master</title>
    
</head>
<body>
<div class="scheme-form">
    <div class="form-header">
        <h1>Create New Scheme</h1>
        <p>Enter the scheme details below</p>
    </div>
    <form method="POST" class="create-scheme-form">
        <div class="form-grid">
            <div class="form-group">
                <label for="schemename">Scheme Name</label>
                <input type="text" id="schemename" name="schemename" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="totalamount">Total Amount</label>
                <input type="number" id="totalamount" name="totalamount" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="totalcount">Total Members</label>
                <input type="number" id="totalcount" name="totalcount" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="schemeduration">Duration (Months)</label>
                <input type="number" id="schemeduration" name="schemeduration" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="schemecommission">Commission (%)</label>
                <input type="number" id="schemecommission" name="schemecommission" class="form-control" step="0.01" min="0" max="100" required>
            </div>

            <div class="form-group">
                <label for="transactionid">Transaction ID</label>
                <input type="text" id="transactionid" name="transactionid" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="startingdate">Expected Starting Date</label>
                <input type="date" id="startingdate" name="startingdate" class="form-control" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" name="create" class="btn btn-primary">Create Scheme</button>
        </div>
    </form>
</div>
</body>
</html>
