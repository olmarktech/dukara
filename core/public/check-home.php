<?php
// Bootstrap Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

echo "=== HOME PAGE DIAGNOSTICS ===\n\n";

// Check home page ID
$home_page_id = get_static_option('home_page');
echo "1. Home Page ID: " . ($home_page_id ?? 'NOT SET') . "\n\n";

// Check if page exists
if ($home_page_id) {
    $page = \App\Models\Page::find($home_page_id);
    if ($page) {
        echo "2. Page Details:\n";
        echo "   - Title: " . $page->title . "\n";
        echo "   - Slug: " . $page->slug . "\n";
        echo "   - Status: " . ($page->status ? 'Active' : 'Inactive') . "\n\n";
        
        // Check PageBuilder content
        $builder_content = \Plugins\PageBuilder\PageBuilderSetup::get_frontend_pagebuilder_content_for_dynamic_page('dynamic_page', $page->id);
        echo "3. PageBuilder Content:\n";
        if (!empty($builder_content)) {
            echo "   - Content exists: YES\n";
            echo "   - Content length: " . strlen($builder_content) . " characters\n";
        } else {
            echo "   - Content exists: NO\n";
            echo "   - ERROR: No PageBuilder content found!\n";
        }
    } else {
        echo "2. ERROR: Page with ID {$home_page_id} not found in database!\n";
    }
} else {
    echo "2. ERROR: Home page is not configured!\n";
    echo "   Go to Admin Panel > General Settings > Set Home Page\n";
}

echo "\n=== END DIAGNOSTICS ===\n";
