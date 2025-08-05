<?php
$chit = null;
$error = null;

if (isset($_POST['submit'])) {
    // $conn = new mysqli("localhost", "root", "Nithish@21", "chit_fund3");
    $conn= mysqli_connect("sql211.infinityfree.com","if0_39630032","Nithish21","if0_39630032_chitmaster") or die("Connection Failed");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $chit_id = isset($_POST['chit_id']) ? $_POST['chit_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $totalamount = isset($_POST['totalamount']) ? $_POST['totalamount'] : '';
    $totalcount = isset($_POST['totalcount']) ? $_POST['totalcount'] : '';
    $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
    $commissionpercent = isset($_POST['commissionpercent']) ? $_POST['commissionpercent'] : '';
    $startingdate = isset($_POST['startingdate']) ? $_POST['startingdate'] : '';

    
    $sql = "SELECT * FROM schemes WHERE (chit_id = ? OR ? = '') AND (name = ? OR ? = '') AND (totalamount = ? OR ? = '') AND (totalcount = ? OR ? = '') AND (duration = ? OR ? = '')
            AND (commissionpercent = ? OR ? = '') AND (startingdate = ? OR ? = '')";
  
  // $sql = "SELECT * FROM schemes WHERE (chit_id = '$chit_id' OR '$chit_id' = '') AND(name = '$name' OR '$name' = '') AND(totalamount = '$totalamount' OR '$totalamount' = '') AND(totalcount = '$totalcount' OR '$totalcount' = '') AND
  //  (duration = '$duration' OR '$duration' = '') AND (commissionpercent = '$commissionpercent' OR '$commissionpercent' = '') AND (startingdate = '$startingdate' OR '$startingdate' = '')";
  // without using bindparams function--

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssssss',$chit_id, $chit_id,$name, $name,$totalamount, $totalamount,$totalcount, $totalcount,$duration, $duration,$commissionpercent, $commissionpercent,$startingdate, $startingdate);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $chit = $result->fetch_assoc();
        } else {
            $error = "No results found.";
        }
    } else {
        $error = "Query error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<html>
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
</head>
    <title>Search Chit Fund</title>
    
</head>
<body>
    <div class="container">
        <h1>Search Chit Fund</h1>
        <form id="searchForm" method="post">
            <label for="chit_id">Chit ID:</label>
            <input type="text" id="chit_id" name="chit_id" value="<?php echo isset($_POST['chit_id']) ? $_POST['chit_id'] : ''; ?>">
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
            
            <label for="totalamount">Total Amount:</label>
            <input type="text" id="totalamount" name="totalamount" value="<?php echo isset($_POST['totalamount']) ? $_POST['totalamount'] : ''; ?>">
            
            <label for="totalcount">Total Count:</label>
            <input type="text" id="totalcount" name="totalcount" value="<?php echo isset($_POST['totalcount']) ? $_POST['totalcount'] : ''; ?>">
            
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" value="<?php echo isset($_POST['duration']) ? $_POST['duration'] : ''; ?>">
            
            <label for="commissionpercent">Commission Percent:</label>
            <input type="number" id="commissionpercent" name="commissionpercent" value="<?php echo isset($_POST['commissionpercent']) ? $_POST['commissionpercent'] : ''; ?>">
            
            <label for="startingdate">Starting Date:</label>
            <input type="date" id="startingdate" name="startingdate" value="<?php echo isset($_POST['startingdate']) ? $_POST['startingdate'] : ''; ?>">
            
            <button type="submit" name="submit">Search</button>
        </form>
        <?php if ($chit || $error): ?>
        <div class="results-box">
            <h2>Chit Fund Details</h2>
            <table id="chitTable">
                <thead>
                    <tr>
                        <th>Chit ID</th>
                        <th>Name</th>
                        <th>Total Amount</th>
                        <th>Total Count</th>
                        <th>Duration</th>
                        <th>Commission Percent</th>
                        <th>Starting Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($chit): ?>
                        <tr>
                            <td><?php echo $chit['chit_id']; ?></td>
                            <td><?php echo $chit['name']; ?></td>
                            <td><?php echo $chit['totalamount']; ?></td>
                            <td><?php echo $chit['totalcount']; ?></td>
                            <td><?php echo $chit['duration']; ?></td>
                            <td><?php echo $chit['commissionpercent']; ?></td>
                            <td><?php echo $chit['startingdate']; ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="error"><?php echo $error; ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
