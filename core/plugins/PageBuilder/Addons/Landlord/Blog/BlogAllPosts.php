<?php

namespace Plugins\PageBuilder\Addons\Landlord\Blog;

use App\Facades\GlobalLanguage;
use App\Helpers\SanitizeInput;

use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogCategory;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class BlogAllPosts extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/home/blog.jpg';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();
            $output .= Text::get([
                'name' => 'title',
                'label' => __('Title'),
                'value' => $widget_saved_values['title'] ?? null,
            ]);
            $output .= Text::get([
                'name' => 'subtitle',
                'label' => __('Subtitle'),
                'value' => $widget_saved_values['subtitle'] ?? null,
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
            'label' => __('Items Per Page'),
            'value' => $widget_saved_values['items'] ?? null,
            'info' => __('enter how many items you want to show per page (default: 6)'),
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
        $order_by = SanitizeInput::esc_html($this->setting_item('order_by')) ?? 'created_at';
        $order = SanitizeInput::esc_html($this->setting_item('order')) ?? 'desc';
        $items = SanitizeInput::esc_html($this->setting_item('items')) ?? 6;
        $title = SanitizeInput::esc_html($this->setting_item('title'));
        $subtitle = SanitizeInput::esc_html($this->setting_item('subtitle'));
        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        // Automatically fetch all published blogs
        $blogs = Blog::with('category')
                    ->where('status', 1)
                    ->orderBy($order_by, $order)
                    ->paginate($items);

        $section_id = SanitizeInput::esc_html($this->setting_item('section_id')) ?? '';

        $data = [
            'title'=> $title,
            'subtitle'=> $subtitle,
            'blogs'=> $blogs,
            'padding_top'=> $padding_top,
            'padding_bottom'=> $padding_bottom,
            'section_id'=> $section_id,
            'order_by' => $order_by,
            'order' => $order
        ];

        return self::renderView('landlord.addons.blog.blog-style-one',$data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Blog Posts - All (Auto-fetch for Blog Page)');
    }
}
