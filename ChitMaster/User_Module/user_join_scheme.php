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
    <form action="index1.php" method="POST">
        <div class="form-group">
            <label for="chit_id">Chit ID:</label>
            <input type="text" id="chit_id" name="chit_id" required>
        </div>
        <div class="form-group">
            <label for="customer_id">Customer ID:</label>
            <input type="text" id="customer_id" name="customer_id" required>
        </div>
        <button type="submit" name="submit">Join</button>
    </form>
</div>

</body>
</html>
