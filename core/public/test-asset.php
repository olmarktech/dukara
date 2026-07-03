<?php
// Bootstrap Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

// Test global_asset function
echo "Testing global_asset function:\n\n";

if (function_exists('global_asset')) {
    $test_path = 'assets/landlord/admin/css/style.css';
    echo "Input: " . $test_path . "\n";
    echo "Output: " . global_asset($test_path) . "\n\n";
    
    $test_path2 = 'landlord/admin/css/style.css';
    echo "Input: " . $test_path2 . "\n";
    echo "Output: " . global_asset($test_path2) . "\n";
} else {
    echo "global_asset function does not exist!\n";
    echo "Using asset() instead:\n";
    echo asset('assets/landlord/admin/css/style.css');
}

