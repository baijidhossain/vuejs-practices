<?php
header("Access-Control-Allow-Origin: http://localhost:5174");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Send response for preflight request
    header("HTTP/1.1 200 OK");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $input = $_POST;
    
    // Log incoming request for debugging
    error_log(print_r($input, true));

    if (isset($input['email']) && isset($input['password'])) {
        $email = mysqli_real_escape_string($conn, $input['email']);
        $password = $input['password'];

        $sql = "SELECT id, password FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        // Prepare an array to hold user data
        $users = [];

        // Use a while loop to fetch all matching users
        while ($user = mysqli_fetch_assoc($result)) {
            $users[] = $user;  // Add each user to the array
        }

        // Check if we found any users
        if (count($users) > 0) {
            $foundUser = $users[0]; // Assuming we only want the first matched user

            if (password_verify($password, $foundUser['password'])) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Login successful",
                    "user_id" => $foundUser['id']
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Invalid email or password"
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Invalid email or password"
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Email and password are required"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method"
    ]);
}

mysqli_close($conn);
?>
