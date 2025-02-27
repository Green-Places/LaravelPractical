<?php
// Minimal front controller for the take-home assignment

// Serve static files if they exist (for the built-in server)
$requested = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestedFile = __DIR__ . $requested;
if ($requested !== '/' && file_exists($requestedFile)) {
    return false; // Let the server handle the request
}

// Define a minimal view() function to load our Blade file.
function view($name) {
    $viewFile = __DIR__ . '/../resources/views/' . $name . '.blade.php';
    if (file_exists($viewFile)) {
        include $viewFile;
    } else {
        echo "View not found: " . $name;
    }
}

// For this minimal stub, always load the welcome view.
view('welcome');
