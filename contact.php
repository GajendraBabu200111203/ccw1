<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Form Validation (you can add more validation checks based on your requirements)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all the fields.";
    } else {
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'login_sample_db');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $message);
            if ($stmt->execute()) {
                echo "Message has been sent successful!
                Thanks for contacting us 🤝";
            } else {
                echo "Error: " . $conn->error;
            }
            $stmt->close();
            $conn->close();
        }
    }
}
?>
