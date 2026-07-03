<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Modules\Blog\Entities\Blog;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class ContactBlogPosts extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/blog/contact-blog-posts.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'section_title',
            'label' => __('Section Title'),
            'value' => $widget_saved_values['section_title'] ?? null,
        ]);

        $output .= Select::get([
            'name' => 'order_by',
            'label' => __('Order By'),
            'options' => [
                'id' => __('ID'),
                'created_at' => __('Date'),
            ],
            'value' => $widget_saved_values['order_by'] ?? null,
            'info' => __('set order by')
        ]);

        $output .= Select::get([
            'name' => 'order',
            'label' => __('Order'),
            'options' => [
                'asc' => __('Accessing'),
                'desc' => __('Decreasing'),
            ],
            'value' => $widget_saved_values['order'] ?? null,
            'info' => __('set order')
        ]);

        $output .= Number::get([
            'name' => 'items',
            'label' => __('Number of Posts'),
            'value' => $widget_saved_values['items'] ?? 3,
            'info' => __('How many blog posts to show')
        ]);

        // add padding option
        $output .= $this->section_id_and_class_fields($widget_saved_values);
        $output .= $this->padding_fields($widget_saved_values);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $section_title = SanitizeInput::esc_html($this->setting_item('section_title')) ?? '';
        $order_by = SanitizeInput::esc_html($this->setting_item('order_by')) ?? 'created_at';
        $order = SanitizeInput::esc_html($this->setting_item('order')) ?? 'desc';
        $items = SanitizeInput::esc_html($this->setting_item('items')) ?? 3;
        $section_id = SanitizeInput::esc_html($this->setting_item('section_id')) ?? '';

        // Fetch blog posts
        $blogs = Blog::query()
            ->where('status', 'publish')
            ->orderBy($order_by, $order)
            ->take($items)
            ->get();

        $data = [
            'section_title' => $section_title,
            'blogs' => $blogs,
            'section_id' => $section_id,
        ];

        return self::renderView('landlord.addons.common.contact-blog-posts', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Contact Blog Posts (Lexend)');
    }
}

