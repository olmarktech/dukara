<?php
/**
 * Laravel Deployment Diagnostic Script
 * 
 * Ye script check karega ki kya issues hain
 * Usage: https://yourdomain.com/diagnose.php
 */

echo "<h1>Laravel Deployment Diagnostic</h1>";
echo "<pre>";

$basePath = __DIR__ . '/core';
$issues = [];
$warnings = [];

// Check 1: .env file exists
echo "=========================================\n";
echo "Checking .env file...\n";
echo "=========================================\n";
$envPath = $basePath . '/.env';
if (file_exists($envPath)) {
    echo "✓ .env file exists\n";
    $envContent = file_get_contents($envPath);
    
    // Check required variables
    $requiredVars = ['APP_KEY', 'APP_ENV', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];
    foreach ($requiredVars as $var) {
        if (strpos($envContent, $var . '=') !== false) {
            echo "✓ $var is set\n";
        } else {
            $issues[] = "$var is missing in .env";
            echo "✗ $var is missing\n";
        }
    }
} else {
    $issues[] = ".env file not found";
    echo "✗ .env file NOT found at: $envPath\n";
}

// Check 2: Storage permissions
echo "\n=========================================\n";
echo "Checking storage permissions...\n";
echo "=========================================\n";
$storagePath = $basePath . '/storage';
if (is_dir($storagePath)) {
    echo "✓ Storage directory exists\n";
    if (is_writable($storagePath)) {
        echo "✓ Storage is writable\n";
    } else {
        $issues[] = "Storage directory is not writable";
        echo "✗ Storage is NOT writable\n";
    }
    
    // Check logs directory
    $logsPath = $storagePath . '/logs';
    if (is_dir($logsPath)) {
        echo "✓ Logs directory exists\n";
        if (is_writable($logsPath)) {
            echo "✓ Logs directory is writable\n";
        } else {
            $warnings[] = "Logs directory is not writable";
            echo "⚠ Logs directory is NOT writable\n";
        }
    }
} else {
    $issues[] = "Storage directory not found";
    echo "✗ Storage directory NOT found\n";
}

// Check 3: Bootstrap cache
echo "\n=========================================\n";
echo "Checking bootstrap cache...\n";
echo "=========================================\n";
$bootstrapCachePath = $basePath . '/bootstrap/cache';
if (is_dir($bootstrapCachePath)) {
    echo "✓ Bootstrap cache directory exists\n";
    if (is_writable($bootstrapCachePath)) {
        echo "✓ Bootstrap cache is writable\n";
    } else {
        $warnings[] = "Bootstrap cache directory is not writable";
        echo "⚠ Bootstrap cache is NOT writable\n";
    }
} else {
    $warnings[] = "Bootstrap cache directory not found";
    echo "⚠ Bootstrap cache directory NOT found\n";
}

// Check 4: Vendor directory
echo "\n=========================================\n";
echo "Checking vendor directory...\n";
echo "=========================================\n";
$vendorPath = $basePath . '/vendor';
if (is_dir($vendorPath)) {
    echo "✓ Vendor directory exists\n";
    $autoloadPath = $vendorPath . '/autoload.php';
    if (file_exists($autoloadPath)) {
        echo "✓ Autoload file exists\n";
    } else {
        $issues[] = "Vendor autoload.php not found - run 'composer install'";
        echo "✗ Autoload file NOT found\n";
    }
} else {
    $issues[] = "Vendor directory not found - run 'composer install'";
    echo "✗ Vendor directory NOT found\n";
}

// Check 5: PHP version
echo "\n=========================================\n";
echo "Checking PHP version...\n";
echo "=========================================\n";
$phpVersion = PHP_VERSION;
echo "PHP Version: $phpVersion\n";
if (version_compare($phpVersion, '8.0.0', '>=')) {
    echo "✓ PHP version is compatible (8.0+)\n";
} else {
    $issues[] = "PHP version must be 8.0 or higher";
    echo "✗ PHP version is too old (need 8.0+)\n";
}

// Check 6: Required PHP extensions
echo "\n=========================================\n";
echo "Checking PHP extensions...\n";
echo "=========================================\n";
$requiredExtensions = ['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'tokenizer', 'json', 'curl', 'xml', 'zip'];
foreach ($requiredExtensions as $ext) {
    if (extension_loaded($ext)) {
        echo "✓ $ext extension loaded\n";
    } else {
        $issues[] = "PHP extension '$ext' is not loaded";
        echo "✗ $ext extension NOT loaded\n";
    }
}

// Check 7: Artisan file
echo "\n=========================================\n";
echo "Checking artisan file...\n";
echo "=========================================\n";
$artisanPath = $basePath . '/artisan';
if (file_exists($artisanPath)) {
    echo "✓ Artisan file exists\n";
    if (is_executable($artisanPath)) {
        echo "✓ Artisan is executable\n";
    } else {
        echo "⚠ Artisan is not executable (may cause issues)\n";
    }
} else {
    $issues[] = "Artisan file not found";
    echo "✗ Artisan file NOT found\n";
}

// Summary
echo "\n=========================================\n";
echo "SUMMARY\n";
echo "=========================================\n";

if (empty($issues) && empty($warnings)) {
    echo "✓ All checks passed! No issues found.\n";
} else {
    if (!empty($issues)) {
        echo "\n❌ CRITICAL ISSUES:\n";
        foreach ($issues as $issue) {
            echo "  - $issue\n";
        }
    }
    
    if (!empty($warnings)) {
        echo "\n⚠️  WARNINGS:\n";
        foreach ($warnings as $warning) {
            echo "  - $warning\n";
        }
    }
}

echo "\n=========================================\n";
echo "Next Steps:\n";
echo "=========================================\n";
echo "1. Agar issues hain, to fix_deployment.php run karein\n";
echo "2. Ya SSH se fix_deployment.sh script run karein\n";
echo "3. Error logs check karein: core/storage/logs/laravel.log\n";
echo "</pre>";

