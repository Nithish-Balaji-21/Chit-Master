<?php
if(isset($_POST['mysubmit']))
{
    $us = $_POST['username'];
    $pw = $_POST['password'];
    echo "The received username is " . $us ;
    echo "The received password is " . $pw;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
    <title>Two Columns with Form Submission</title>
    
</head>
<body>
    <div class="container">
        <div class="column left">
            <table border="1">
                <tr>
                    <td>
                        ID: <?php echo $us; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="user_current_scheme.php" target="displayframe">
                            <input type="submit" value="SCHEMES" class="btn-primary">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="user_join_scheme.php" target="displayframe">
                            <input type="hidden" value="<?php echo $us; ?>" name="username">
                            <input type="submit" value="JOIN NEW SCHEME" name="joinscheme" class="btn-primary">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="user_scheme_search.php" target="displayframe">
                            <input type="submit" value="SEARCH CHIT" class="btn-primary">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="user_my_chits.php" target="displayframe">
                            <input type="hidden" value="<?php echo $us; ?>" name="username">
                            <input type="submit" value="CHITS ENROLLED" name="mychits" class="btn-primary">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="user_receipts.php" target="displayframe">
                            <input type="hidden" value="<?php echo $us; ?>" name="username">
                            <input type="submit" value="RECEIPTS" name="userreceipts" class="btn-primary">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="user_transaction.php" target="displayframe">
                            <input type="hidden" value="<?php echo $us; ?>" name="username">
                            <input type="submit" value="TRANSACTION" name="pay" class="btn-primary">
                        </form>
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
