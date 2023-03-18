<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "bank");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
global $acc_no, $password, $balance,$age;
$acc_no = $_POST['acc_no'];
$password = $_POST['password'];
$balance = $_POST['balance'];

$age = $_POST['age'];

// Insert data into table
$sql = "INSERT INTO account1 (account_no, password, balance, age) VALUES ('$acc_no', '$password','$balance', '$age')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Check balance and redirect to appropriate page
if ($balance < 1000000)
 {
    header("Location: silver.html");
} 
elseif ($balance >= 1000000 && $balance < 5000000) 
{
    header("Location: gold.html");

} elseif ($balance >= 5000000) 

{
    header("Location: platinum.html");
} 
else
{
    echo "Invalid balance amount.";
}

// Close connection
mysqli_close($conn);
?>
