<?php
// Simple direct check without Laravel bootstrap
echo "Direct PHP Check\n";
echo "PHP Version: " . phpversion() . "\n";
echo "Current Directory: " . __DIR__ . "\n";

// Check if vendor directory exists
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    echo "✓ Vendor autoload exists\n";
} else {
    echo "✗ Vendor autoload missing\n";
}

// Check if app.php exists
if (file_exists(__DIR__ . '/../bootstrap/app.php')) {
    echo "✓ Bootstrap app.php exists\n";
} else {
    echo "✗ Bootstrap app.php missing\n";
}

echo "End of check\n";
?>



















