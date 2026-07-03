<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

echo "=== HOME PAGE WIDGETS ===\n\n";

$homeId = get_static_option('home_page');
echo "Home Page ID: " . $homeId . "\n\n";

$widgets = \Plugins\PageBuilder\Models\PageBuilder::where('addon_page_id', $homeId)
    ->orderBy('addon_order')
    ->get();

echo "Total Widgets: " . $widgets->count() . "\n\n";

foreach($widgets as $w) {
    echo "Order: " . $w->addon_order . "\n";
    echo "Name: " . $w->addon_name . "\n";
    echo "Namespace: " . $w->addon_namespace . "\n";
    echo "---\n";
}





















