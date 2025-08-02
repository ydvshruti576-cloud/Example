<?php
// DB Connection
$conn = new mysqli("localhost", "root", "", "ddgi_fees");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$amount = $_POST['amount'];

// Insert into DB
$sql = "INSERT INTO fee_payments (name, email, phone, course, amount) VALUES ('$name', '$email', '$phone', '$course', '$amount')";
if ($conn->query($sql) === TRUE) {
  // Redirect to payment gateway or success page
  header("Location: https://rzp.io/l/sample-payment-link");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
