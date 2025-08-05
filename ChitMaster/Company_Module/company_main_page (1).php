<?php
if(isset($_POST['mysubmit'])) {
    $us = $_POST['username'];
    $pw = $_POST['password'];
    $transaction_id = $_POST['transaction_id'];
    // echo "The received username is " . $us;
    // echo "The received password is " . $pw;
    // echo "The received transaction is " . $transaction_id;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="../assets/css/company/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Chit Master</title>
</head>
<body>
    <nav class="navbar">
        <a href="../main_page.html" class="navbar-logo">
            <img src="../assets/images/logo.png" alt="Chit Master Logo">
            <span>Chit Master</span>
        </a>
    </nav>

    <div class="container">
        <div class="column left">
            <table class="table">
                <tr>
                    <td>ID: <?php echo $us; ?></td>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="company_create_scheme (2).php" target="displayframe"> 
                            <input type="hidden" value="<?php echo $transaction_id ?>" name="transaction_id">
                            <input type="submit" value="CREATE SCHEME" name="create_scheme" class="btn-primary">
                        </form> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="company_current_scheme (1).php" target="displayframe"> 
                            <input type="hidden" value="<?php echo $transaction_id ?>" name="transaction_id">
                            <input type="submit" value="SCHEMES" name="create_scheme" class="btn-primary">
                        </form> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <a target="displayframe" href="company_live_scheme (1).php" class="btn-primary">LIVE SCHEMES</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="dropdown">
                            <button class="btn-primary dropdown-toggle" type="button"><center>Manage Schemes</center>
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="company_start_scheme (3).php" target="displayframe">Start Schemes</a>
                                <a href="company_end_scheme (1).php" target="displayframe">End Schemes</a>
                                <a href="company_start_auction (2).php" target="displayframe">Start Auctions</a>
                                <a href="company_end_auction (1).php" target="displayframe">End Auctions</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="company_users_list (1).php" target="displayframe" class="btn-primary">CUSTOMER DETAILS</a>       
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="company_receipts (1).php" target="displayframe" class="btn-primary">RECEIPTS</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="company_transaction (1).php" target="displayframe" class="btn-primary">TRANSACTIONS</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="column right">
            <iframe name="displayframe" id="displayframe"></iframe>
        </div>
    </div>
</body>
</html>
