<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

echo "=== PRICING SECTION DEBUG ===\n\n";

// Check home page ID
$homeId = get_static_option('home_page');
echo "1. Home Page ID: " . ($homeId ?? 'NOT SET') . "\n";

// Check if page exists
if ($homeId) {
    $page = \App\Models\Page::find($homeId);
    if ($page) {
        echo "2. Page Title: " . $page->title . "\n";
        echo "3. Page Status: " . ($page->status ? 'Active' : 'Inactive') . "\n\n";
    } else {
        echo "2. ERROR: Page with ID {$homeId} not found!\n\n";
        exit;
    }
} else {
    echo "2. ERROR: Home page not configured!\n\n";
    exit;
}

// Check widgets
echo "4. HOME PAGE WIDGETS:\n";
$widgets = \Plugins\PageBuilder\Models\PageBuilder::where('addon_page_id', $homeId)
    ->orderBy('addon_order')
    ->get();

echo "   Total Widgets: " . $widgets->count() . "\n\n";

foreach($widgets as $w) {
    echo "   Order: " . $w->addon_order . "\n";
    echo "   Name: " . $w->addon_name . "\n";
    echo "   Namespace: " . $w->addon_namespace . "\n";
    echo "   ---\n";
}

// Check pricing plans
echo "\n5. PRICING PLANS:\n";
try {
    $plans = \App\Models\PricePlan::where('status', 1)->get();
    echo "   Total Active Plans: " . $plans->count() . "\n\n";

    foreach($plans as $plan) {
        echo "   - " . $plan->title . " (" . $plan->price . ") - Type: " . $plan->type . "\n";
    }
} catch (Exception $e) {
    echo "   ERROR: " . $e->getMessage() . "\n";
}

// Check if PricePlan model exists
echo "\n6. PRICE PLAN MODEL CHECK:\n";
if (class_exists('\App\Models\PricePlan')) {
    echo "   ✓ PricePlan model exists\n";
} else {
    echo "   ✗ PricePlan model missing\n";
}

// Check if PageBuilder models exist
echo "\n7. PAGEBUILDER MODEL CHECK:\n";
if (class_exists('\Plugins\PageBuilder\Models\PageBuilder')) {
    echo "   ✓ PageBuilder model exists\n";
} else {
    echo "   ✗ PageBuilder model missing\n";
}

echo "\n=== END DEBUG ===\n";




















