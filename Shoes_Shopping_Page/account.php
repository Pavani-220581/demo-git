<!DOCTYPE html>
<html>
<head>
    <title>Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">
    <h2>ShoeShop</h2>
    <a href="home.html">Home</a>
    <a href="account.php">Account</a>
    <a href="cart_table.html">Cart</a>
    <a href="menu.html">Brands</a>
    <a href="wallet.html">Wallet</a>
</div>

<div class="main">
    <h1>Customer Registration</h1>

    <form action="register.php" method="POST" enctype="multipart/form-data">

        <label>Full Name *</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email *</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mobile Number *</label><br>
        <input type="text" name="mobile" required><br><br>

        <label>Password *</label><br>
        <input type="password" name="password" required><br><br>

        <label>Gender</label><br>
        <select name="gender">
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select><br><br>

        <label>Shipping Address *</label><br>
        <textarea name="address" required></textarea><br><br>

        <!-- FILE UPLOAD -->
        <label>Upload Document *</label><br>
        <input type="file" name="upload_file" required><br><br>

        <input type="checkbox" name="terms" required> I agree to Terms & Conditions<br><br>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>


