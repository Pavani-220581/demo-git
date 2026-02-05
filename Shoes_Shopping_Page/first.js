alert("javascript is sucessfully completed");
let walletBalance = 1000;
document.getElementById("balance").innerText = walletBalance;
function addMoney() {
    let amount = prompt("Enter amount to add:");

    amount = Number(amount);

    if (amount > 0) {
        walletBalance += amount;
        document.getElementById("balance").innerText = walletBalance;
        alert("Money added successfully!");
    } else {
        alert("Invalid amount");
    }
}
function pay() {
    let confirmPay = confirm("Do you want to pay for the shoe?");

    if (confirmPay) {
        let payAmount = prompt("enter the amount you have to pay");
        if (walletBalance >= payAmount) {
            walletBalance -= payAmount;
            document.getElementById("balance").innerText = walletBalance;
            document.getElementById("message").innerText = "Payment successful";
        } else {
            document.getElementById("message").innerText = "Insufficient balance ";
        }
    }
}



// Customer account object
let customer = {
    name: "",
    email: "",
    mobile: "",
    gender: "",
    address: "",
    isRegistered: false,

    registerUser: function (name, email, mobile, gender, address) {
        this.name = name;
        this.email = email;
        this.mobile = mobile;
        this.gender = gender;
        this.address = address;
        this.isRegistered = true;
    }
};

// Registration function
function register() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let mobile = document.getElementById("mobile").value;
    let password = document.getElementById("password").value;
    let gender = document.getElementById("gender").value;
    let address = document.getElementById("address").value;
    let terms = document.getElementById("terms").checked;

    // Validation
    if (name === "" || email === "" || mobile === "" || password === "" || address === "") {
        alert("Please fill all required fields");
        return;
    }

    if (!terms) {
        alert("Please accept Terms & Conditions");
        return;
    }

    // Call object method
    customer.registerUser(name, email, mobile, gender, address);

    // Store data
    localStorage.setItem("customerName", customer.name);

    document.getElementById("msg").innerText =
        "Registration successful.... Welcome " + customer.name;

    console.log(customer); // PDF requirement
}

