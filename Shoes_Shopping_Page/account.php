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
    <form action="register.php" method="POST">
      <label>Full Name *</label><br>
        <input type="text" id="name"><br><br>

        <label>Email *</label><br>
        <input type="email" id="email"><br><br>

        <label>Mobile Number *</label><br>
        <input type="text" id="mobile"><br><br>

        <label>Password *</label><br>
        <input type="password" id="password"><br><br>

        <!-- Profile Details -->
        <label>Gender</label><br>
        <select id="gender">
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select><br><br>

        <label>Shipping Address *</label><br>
        <textarea id="address"></textarea><br><br>

        <!-- Legal -->
        <input type="checkbox" id="terms"> I agree to Terms & Conditions<br><br>

        <button onclick="register()">Register</button>

        <p id="msg"></p>
    </form>
</div>

<script src="first.js"></script>
</body>
</html>
