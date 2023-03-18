<?php
// database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// fetch data from table
global $acc_no, $password;
$acc_no = $_POST['account-number'];
$password = $_POST['password'];
$sql = "SELECT * FROM account1 where account_no = '$acc_no' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: " . $row["account_no"] . "<br>";
        echo "Password: " . $row["password"] . "<br>";
        echo "Balance: " . $row["balance"] . "<br>";
        echo "Age: " . $row["age"] . "<br>";
        echo "<br>";
    }
} else {
    echo "NO RECORD FOUND IN THE DATABASE(kindly register an record)";
}

// close connection
mysqli_close($conn);
?>