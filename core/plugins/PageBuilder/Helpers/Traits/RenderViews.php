<?php

namespace Plugins\PageBuilder\Helpers\Traits;

trait RenderViews
{
    public static function renderView($filename, $data = [], $moduleName = '')
    {
        try {
            // Check for active theme-specific widget views first (only for landlord)
            $active_theme = get_static_option('active_frontend_theme');
            
            if (!empty($active_theme) && $active_theme !== 'default' && is_null(tenant())) {
                // Convert path like 'landlord.addons.common.theme' to widget name
                $widget_name = basename(str_replace('.', '/', $filename));
                $theme_widget_path = 'themes.' . $active_theme . '.widgets.' . $widget_name;
                
                if (view()->exists($theme_widget_path)) {
                    // Render widget in isolated way using output buffering
                    $output = self::renderIsolated($theme_widget_path, $data);
                    return $output;
                }
            }
            
            // Fallback to default widget views
            $view_path = !empty($moduleName) ? strtolower($moduleName).'::addon-view.' : 'pagebuilder::';

            if(!view()->exists($view_path . $filename)){
                if(str_contains($filename,'theme_one') || str_contains($filename,'theme_two')){
                    $filename = str_replace(['theme_one','theme_two'],"hexfashion",$filename);
                }
            }
            
            // Render widget in isolated way using output buffering
            $output = self::renderIsolated($view_path . $filename, $data);
            return $output;
            
        } catch (\Exception $e) {
            // Log the error but don't break the page
            \Log::error('Widget render error in RenderViews: ' . $e->getMessage() . ' for view: ' . $filename);
            return '';
        }
    }
    
    /**
     * Render view in an isolated way that doesn't affect parent section stack
     */
    private static function renderIsolated($viewPath, $data): string
    {
        try {
            // Simply render the view and sanitize output - don't use include directly
            $output = view($viewPath, compact('data'))->render();
            
            // Sanitize output - remove all problematic Blade directives
            $output = self::sanitizeBladeDirectives($output);
            
            return $output;
            
        } catch (\Exception $e) {
            \Log::error('Widget isolated render error: ' . $e->getMessage() . ' for view: ' . $viewPath);
            return '';
        }
    }
    
    /**
     * Sanitize Blade directives from widget output
     * Handles both Blade syntax and compiled PHP code
     */
    private static function sanitizeBladeDirectives(string $output): string
    {
        if (empty($output)) {
            return $output;
        }
        
        // Remove all problematic Blade directives (case-insensitive, multiline, with optional whitespace)
        $directives = [
            // Blade syntax patterns
            '/@endsection\s*/i',
            '/@section\s*\([^)]+\)\s*/i',
            '/@endpush\s*/i',
            '/@push\s*\([^)]+\)\s*/i',
            '/@stack\s*\([^)]+\)\s*/i',
            '/@yield\s*\([^)]+\)\s*/i',
            '/@extends\s*\([^)]+\)\s*/i',
            '/@parent\s*/i',
            '/@stop\s*/i',
            '/@append\s*/i',
            '/@overwrite\s*/i',
            '/@endonce\s*/i',
            '/@once\s*/i',
            '/@endcomponent\s*/i',
            '/@component\s*\([^)]+\)\s*/i',
            // Compiled PHP patterns (Blade compiles directives to PHP) - handle various whitespace patterns
            '/<\?php\s*\$__env->stopSection\(\);\s*\?>/is',
            '/<\?php\s*\$__env->startSection\([^)]+\);\s*\?>/is',
            '/<\?php\s*\$__env->stopPush\(\);\s*\?>/is',
            '/<\?php\s*\$__env->startPush\([^)]+\);\s*\?>/is',
            '/<\?php\s*echo\s+\$__env->yieldContent\([^)]+\);\s*\?>/is',
            '/<\?php\s*echo\s+\$__env->yieldPushContent\([^)]+\);\s*\?>/is',
            '/<\?php\s*\$__env->startComponent\([^)]+\);\s*\?>/is',
            '/<\?php\s*\$__env->renderComponent\(\);\s*\?>/is',
        ];
        
        foreach ($directives as $pattern) {
            $output = preg_replace($pattern, '', $output);
        }
        
        // Also remove any standalone PHP tags that might have been left (multiline)
        $output = preg_replace('/<\?php\s*\?>\s*/m', '', $output);
        
        // Remove any remaining section/push related PHP code (more aggressive - handles cases where PHP tags were removed)
        $output = preg_replace('/\$__env->(stopSection|startSection|stopPush|startPush|yieldContent|yieldPushContent|startComponent|renderComponent)\([^)]*\);/', '', $output);
        
        return $output;
    }
}
