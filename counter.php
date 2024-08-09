<?php
session_start();

// Check if the user has already been counted in this session
if (!isset($_SESSION['hasVisited'])) {
    // Set the session variable to mark this user as counted
    $_SESSION['hasVisited'] = true;

    // Open the counter file to read the current count
    $file = 'counter.txt';
    if (file_exists($file)) {
        $count = file_get_contents($file);
        $count = intval($count) + 1; // Increment the count
    } else {
        $count = 1; // Start at 1 if file doesn't exist
    }

    // Write the new count back to the file
    file_put_contents($file, $count);
}

// Display the current count
echo file_get_contents('counter.txt');
?>
