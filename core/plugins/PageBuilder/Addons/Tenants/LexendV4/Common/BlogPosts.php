<?php

namespace Plugins\PageBuilder\Addons\Tenants\LexendV4\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class BlogPosts extends PageBuilderBase
{
    public function preview_image()
    {
        return 'Tenant/common/blog-posts-13.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'heading',
            'label' => __('Section Heading'),
            'value' => $widget_saved_values['heading'] ?? null,
            'placeholder' => __('Latest from {h}our insights{/h}'),
            'info' => __('Use {h}text{/h} to highlight text in primary color')
        ]);

        // Repeater for Blog Posts
        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'blog_posts_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'post_image',
                    'label' => __('Post Image'),
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'post_category',
                    'label' => __('Category'),
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'post_title',
                    'label' => __('Post Title'),
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'post_url',
                    'label' => __('Post URL'),
                ],
            ]
        ]);

        // add padding option
        $output .= $this->padding_fields($widget_saved_values);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $heading = SanitizeInput::esc_html($this->setting_item('heading')) ?? '';
        
        // Get repeater data
        $settings = $this->get_settings();
        $repeater_data = $settings['blog_posts_repeater'] ?? [];
        
        // Transform repeater data to proper format
        $blog_posts = [];
        if (!empty($repeater_data['post_image_'])) {
            $images = $repeater_data['post_image_'];
            $categories = $repeater_data['post_category_'] ?? [];
            $titles = $repeater_data['post_title_'] ?? [];
            $urls = $repeater_data['post_url_'] ?? [];
            
            foreach ($images as $index => $image_id) {
                if (!empty($image_id) || !empty($titles[$index] ?? '')) {
                    $blog_posts[] = [
                        'image' => $image_id,
                        'category' => $categories[$index] ?? 'Blog',
                        'title' => $titles[$index] ?? '',
                        'url' => $urls[$index] ?? '#'
                    ];
                }
            }
        }

        // Process highlighted text
        $heading = str_replace(['{h}', '{/h}'], ['<span class="text-primary dark:text-quaternary">', '</span>'], $heading);

        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $data = [
            'heading' => $heading,
            'blog_posts' => $blog_posts,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
        ];

        return self::renderView('tenant.lexend-v4.blog-posts', $data);
    }

    public function addon_title()
    {
        return __('Blog Posts (Home Page)');
    }
}
