<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use App\Models\Testimonial;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class FeedbackSplitSlider extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/feedback-split-slider.png';
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
            'info' => __('e.g., "What clients said:"')
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
        $testimonial = Testimonial::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        $data = [
            'title' => SanitizeInput::esc_html($this->setting_item('title')) ?? '',
            'testimonial' => $testimonial,
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.common.feedback-split-slider', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Feedback Split Slider (Features/Pricing Page)');
    }
}

