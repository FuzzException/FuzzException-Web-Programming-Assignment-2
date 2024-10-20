<?php

$dataFile = 'users.json'; // JSON file to store user data

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    
    // Check if file exists, else create new array
    if (file_exists($dataFile)) {
        $jsonData = file_get_contents($dataFile);
        $users = json_decode($jsonData, true);
    } else {
        $users = [];
    }
    
    // Append new user data
    $users[] = ['name' => $name, 'email' => $email];
    
    // Save updated data back to JSON file
    file_put_contents($dataFile, json_encode($users));
}

// Display stored users data
$usersData = '';
if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    $users = json_decode($jsonData, true);

    $usersData .= "<h3>Users List:</h3><div class='users-list'>";
    foreach ($users as $user) {
        $usersData .= "<div class='user'><strong>Name:</strong> " . $user['name'] . "<br>";
        $usersData .= "<strong>Email:</strong> " . $user['email'] . "<br><br></div>";
    }
    $usersData .= "</div>";
}

// Output user data to be shown in the HTML
echo $usersData;
?>
