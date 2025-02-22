<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Database connection details
$servername = "localhost";
$username = "u473389979_SARWAN"; // Your database username
$password = "Sarwan@67"; // Your database password
$dbname = "u473389979_wp_esports_reg"; // Your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File Upload Handling
    $paymentScreenshot = '';
    if (!empty($_FILES['payment_screenshot']['name'])) {
        $targetDir = "uploads/";
        $paymentScreenshot = basename($_FILES['payment_screenshot']['name']);
        $targetFilePath = $targetDir . $paymentScreenshot;

        if (move_uploaded_file($_FILES['payment_screenshot']['tmp_name'], $targetFilePath)) {
            echo "File uploaded successfully!";
        } else {
            echo "File upload failed!";
        }
    }

    // Prepare & Execute SQL Query
    $stmt = $conn->prepare("
        INSERT INTO registrations (
            team_name, leader_name, email, leader_WA, game, leader_UID, 
            player_2_UID, player_3_UID, player_4_UID, previous_Participation, 
            agree_Rules, agree_Fair_Play, joined_Platforms, agree_Terms, 
            registration_date, payment_screenshot
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)
    ");

    $stmt->bind_param(
        "sssssssssiisis",
        $_POST['team_name'], $_POST['leader_name'], $_POST['email'],
        $_POST['leader_WA'], $_POST['game'], $_POST['leader_UID'],
        $_POST['player_2_UID'], $_POST['player_3_UID'], $_POST['player_4_UID'],
        $_POST['previous_Participation'], $_POST['agree_Rules'],
        $_POST['agree_Fair_Play'], $_POST['joined_Platforms'],
        $_POST['agree_Terms'], $paymentScreenshot
    );

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
