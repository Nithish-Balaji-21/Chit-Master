<?php
$username = '';
if (isset($_POST['joinscheme'])) {
    $username = $_POST['username'];  
}
?>
<?php
if (isset($_POST['join'])) {
    $username = $_POST['customer_id'];
    // $con = mysqli_connect("localhost", "root", "Nithish@21", "chit_fund3") or die("connection failed");
    $con= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");
    $chit_id = $_POST['chit_id'];

    // checking whether scheme exist
    $query1 = "SELECT * FROM schemes WHERE chit_id = '$chit_id'";
    $result1 = mysqli_query($con, $query1);
    $count1 = mysqli_num_rows($result1);

    if ($count1 > 0) {   
        // if scheme exists
        $query2 = "SELECT * FROM scheme_slots WHERE chit_id = '$chit_id' AND opened = true";
        $result2 = mysqli_query($con, $query2);
        $count2 = mysqli_num_rows($result2);

        // check whether scheme exist and opened
        if ($count2 == 0) {
            // if not opened
            echo "<script> alert('The scheme slots is currently closed') </script>";
            exit;
        } else {
            // if opened
            $row = $result2->fetch_assoc();

            // Check if the scheme is already full
            if ($row['currentcount'] >= $row['count']) {
                echo "<script> alert('The scheme has reached its maximum count') </script>";
                exit;
            }

            // Check if the user is already enrolled in the scheme
            $isMember = false;
            for ($i = 1; $i <= 30; $i++) {
                $member = 'member' . $i;    
                if ($row[$member] == $username) {
                    $isMember = true;
                    break;
                }
            }

            if ($isMember) {
                echo "<script> alert('You have already joined this scheme') </script>";
                exit;
            } else {
                // Enroll the user if not already a member
                for ($i = 1; $i <= 30; $i++) {
                    $member = 'member' . $i;    
                    if (empty($row[$member])) {
                        $insert = "UPDATE scheme_slots SET $member = '$username' where chit_id = '$chit_id'";
                        $result3 = mysqli_query($con, $insert);
                        if ($result3) {
                            $new_current_count = $row['currentcount'] + 1;
                            $update_count = "UPDATE scheme_slots SET currentcount = $new_current_count WHERE chit_id = '$chit_id'";
                            $result4 = mysqli_query($con, $update_count);
                            
                            if ($result4) {
                                echo "Enrolled in the scheme.";
                            } else {
                                echo "Error occurred while updating the current count.";
                            }
                        } else {
                            echo "Error occurred while updating slot";
                        }
                        break;
                    }
                }
            }
        } 
    } else {
        // When the scheme itself doesn't exist
        echo "<script>alert('Invalid Scheme Id')</script>";
    }
    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Chit</title>
    
</head>
<body>

<div class="container">
    <h2>Join Scheme</h2>
    <form method="POST">
        <div class="form-group">
            <label for="chit_id">Chit ID:</label>
            <input type="text" id="chit_id" name="chit_id" required>
        </div>
        <div class="form-group">
            <input type="hidden" id="customer_id" value="<?php echo $username; ?>" name="customer_id" required>
        </div>
        <button type="submit" name="join">Join</button>
    </form>
</div>

</body>
</html>
