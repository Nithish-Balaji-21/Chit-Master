<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $userstatus = $_POST['userstatus'];
    $dob = $_POST['dob'];
    $aadhar = $_POST['aadhar'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $usergender = $_POST['usergender'];
    $phone = $_POST['phone'];
    $occupation = $_POST['occupation'];
    $retirement_year = $_POST['retirement_year'];
    $family_count = $_POST['family_count'];
    $account_no = $_POST['account_no'];
    $monthly_income = $_POST['monthly_income'];
    $savings = $_POST['savings'];
    $useremi = $_POST['useremi'];

    // Generate unique username
    $name_parts = explode(' ', $name);
    $longest_name = '';
    foreach ($name_parts as $part) {
        if (strlen($part) > strlen($longest_name)) {
            $longest_name = $part;
        }
    }
    $unique_code = substr(md5(uniqid(mt_rand(), true)), 0, 3);
    $username = $longest_name . "_" . $unique_code;
}
?>

<html>
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
    
</head>
<body>
    <div class="container">
        <div class="details-box">
             <center>Submitted Details</center>
            <table>
                    <tr>
                    <td>Name</td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td>Marital Status</td>
                    <td><?php echo $userstatus; ?></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                    <td>Aadhar No</td>
                    <td><?php echo $aadhar; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $address; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $usergender; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo $phone; ?></td>
                </tr>
                <tr>
                    <td>Occupation</td>
                    <td><?php echo $occupation; ?></td>
                </tr>
                <tr>
                    <td>Retirement Year</td>
                    <td><?php echo $retirement_year; ?></td>
                </tr>
                <tr>
                    <td>Family Member Count</td>
                    <td><?php echo $family_count; ?></td>
                </tr>
                <tr>
                    <td>Account No</td>
                    <td><?php echo $account_no; ?></td>
                </tr>
                <tr>
                    <td>Monthly Income</td>
                    <td><?php echo $monthly_income; ?></td>
                </tr>
                <tr>
                    <td>Savings</td>
                    <td><?php echo $savings; ?></td>
                </tr>
                <tr>
                    <td>Paying EMI or Loans</td>
                    <td><?php echo $useremi; ?></td>
                </tr>
                <tr>
                    <td>Generated Username</td>
                    <td><?php echo $username; ?></td>
                </tr>
            </table>
        </div>
        <div class="password-box">
            <div class="box-header">Set Your Password</div>
            <form action="user_signup_form_upload.php" method="POST">
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="userstatus" value="<?php echo $userstatus; ?>">
                <input type="hidden" name="dob" value="<?php echo $dob; ?>">
                <input type="hidden" name="aadhar" value="<?php echo $aadhar; ?>">
                <input type="hidden" name="address" value="<?php echo $address; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="usergender" value="<?php echo $usergender; ?>">
                <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                <input type="hidden" name="occupation" value="<?php echo $occupation; ?>">
                <input type="hidden" name="retirement_year" value="<?php echo $retirement_year; ?>">
                <input type="hidden" name="family_count" value="<?php echo $family_count; ?>">
                <input type="hidden" name="account_no" value="<?php echo $account_no; ?>">
                <input type="hidden" name="monthly_income" value="<?php echo $monthly_income; ?>">
                <input type="hidden" name="savings" value="<?php echo $savings; ?>">
                <input type="hidden" name="useremi" value="<?php echo $useremi; ?>">
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <table>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" name="confirm_password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
