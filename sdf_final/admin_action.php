<?php
session_start();

include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and validate admin's input
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id FROM tb_admin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        //authenticate if admin
        $admin = $result->fetch_assoc();
        $_SESSION['admin_id'] = $admin['id']; // Storing the admin's ID in session
        header("Location: admin_dashboard.php");
        exit();
    } else {
        header("Location: admin_reglog.php?error=Invalid credentials");
        exit();
    }
} else {
    header("Location: admin_reglog.php");
    exit();
}
$conn->close();
?>
