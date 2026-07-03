<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use App\Models\Testimonial;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class FeedbackGrid extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/feedback-grid.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'title',
            'label' => __('Section Title'),
            'value' => $widget_saved_values['title'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'link_text',
            'label' => __('View All Link Text (Optional)'),
            'value' => $widget_saved_values['link_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'link_url',
            'label' => __('View All Link URL'),
            'value' => $widget_saved_values['link_url'] ?? null,
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
            'name' => 'item_show',
            'label' => __('Number of Testimonials'),
            'value' => $widget_saved_values['item_show'] ?? 3,
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
        $title = SanitizeInput::esc_html($this->setting_item('title')) ?? '';
        $link_text = SanitizeInput::esc_html($this->setting_item('link_text')) ?? '';
        $link_url = SanitizeInput::esc_url($this->setting_item('link_url')) ?? '';
        $order_by = $this->setting_item('order_by') ?? 'id';
        $order = $this->setting_item('order') ?? 'desc';
        $item_show = $this->setting_item('item_show') ?? 3;
        $section_id = SanitizeInput::esc_html($this->setting_item('section_id')) ?? '';

        // Fetch testimonials
        $testimonials = Testimonial::query()
            ->where('status', 1)
            ->orderBy($order_by, $order)
            ->take($item_show)
            ->get();

        $data = [
            'title' => $title,
            'link_text' => $link_text,
            'link_url' => $link_url,
            'testimonials' => $testimonials,
            'section_id' => $section_id,
        ];

        return self::renderView('landlord.addons.common.feedback-grid', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Feedback Grid (About Page)');
    }
}

