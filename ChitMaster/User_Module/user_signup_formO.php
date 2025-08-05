<html>
<head>
    <link rel="stylesheet" href="../assets/css/user/style.css">
    
    <script>
        function updateSavingsLimit() {
            const monthlyIncome = document.getElementById("monthly_income").value;
            const savingsInput = document.getElementById("savings");
            if (monthlyIncome) {
                savingsInput.setAttribute("max", monthlyIncome - 1);
            }
        }
    </script>
</head>
<body>
    <form name="userForm" action="user_submit_formO.php" method="POST">
        <table>
            <tr>
                <th colspan="4"><center>PERSONAL INFORMATION</center></th>
            </tr>
            <tr>
                <td>Enter your name</td>
                <td><input type="text" name="name" pattern="^[A-Za-z]+(\s[A-Za-z]+)*$" title="Please enter your name followed by initials, separated by spaces" required></td>
                <td>Marital status</td>
                <td>
                    <div class="radio-container">
                        <label>Married</label>
                        <input type="radio" name="userstatus" value="Married" required>
                        <label>single</label>
                        <input type="radio" name="userstatus" value="Unmarried" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Date of birth</td>
                <td><input type="date" name="dob" required></td>
                <td>Aadhar no</td>
                <td><input type="text" name="aadhar" pattern="\d{12}" title="Aadhar number must be exactly 12 digits" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" required></td>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <div class="radio-container">
                        <label>Male</label>
                        <input type="radio" value="Male" name="usergender" required>
                        <label>Female</label>
                        <input type="radio" value="Female" name="usergender" required>
                        <label>Other</label>
                        <input type="radio" value="Other" name="usergender" required>
                    </div>
                </td>
                <td>Phone</td>
                <td><input type="text" name="phone" pattern="\d{10}" required></td>
            </tr>
            <tr>
                <th colspan="4"><center>ELIGIBILITY INFO</center></th>
            </tr>
            <tr>
                <td>Occupation</td>
                <td><input type="text" name="occupation" pattern="^[A-Za-z\s]+$" title="Please enter alphabetic characters only" required></td>
                <td>Retirement year</td>
                <td><input type="date" name="retirement_year" required></td>
            </tr>
            <tr>
                <td>Family member count</td>
                <td><input type="number" name="family_count" required></td>
                <td>Account no</td>
                <td><input type="text" name="account_no" pattern="\d{16}" title="Account number must be exactly 16 digits" required></td>
            </tr>
            <tr>
                <td>Monthly income</td>
                <td><input type="number" id="monthly_income" name="monthly_income" onchange="updateSavingsLimit()" required></td>
                <td>Saving over expenses</td>
                <td><input type="number" id="savings" name="savings" required></td>
            </tr>
            <tr>
                <td>Paying EMI or loans</td>
                <td>
                    <div class="radio-container">
                        <label>Yes</label>
                        <input type="radio" name="useremi" value="Yes" required>
                        <label>No</label>
                        <input type="radio" name="useremi" value="No" required>
                    </div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" value="PROCEED" name="submit1"></td>
            </tr>
        </table>
    </form>
</body>
</html>
