<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class AboutStory extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/about-story.png';
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

        $output .= Textarea::get([
            'name' => 'paragraph_one',
            'label' => __('First Paragraph'),
            'value' => $widget_saved_values['paragraph_one'] ?? null,
        ]);

        $output .= Textarea::get([
            'name' => 'paragraph_two',
            'label' => __('Second Paragraph'),
            'value' => $widget_saved_values['paragraph_two'] ?? null,
        ]);

        // Counter 1
        $output .= Number::get([
            'name' => 'counter_1_number',
            'label' => __('Counter 1 Number'),
            'value' => $widget_saved_values['counter_1_number'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'counter_1_text',
            'label' => __('Counter 1 Text'),
            'value' => $widget_saved_values['counter_1_text'] ?? null,
        ]);

        // Counter 2
        $output .= Number::get([
            'name' => 'counter_2_number',
            'label' => __('Counter 2 Number'),
            'value' => $widget_saved_values['counter_2_number'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'counter_2_text',
            'label' => __('Counter 2 Text'),
            'value' => $widget_saved_values['counter_2_text'] ?? null,
        ]);

        // Counter 3
        $output .= Number::get([
            'name' => 'counter_3_number',
            'label' => __('Counter 3 Number'),
            'value' => $widget_saved_values['counter_3_number'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'counter_3_text',
            'label' => __('Counter 3 Text'),
            'value' => $widget_saved_values['counter_3_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'counter_3_suffix',
            'label' => __('Counter 3 Suffix (e.g., "k")'),
            'value' => $widget_saved_values['counter_3_suffix'] ?? null,
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
        $data = [
            'title' => SanitizeInput::esc_html($this->setting_item('title')) ?? '',
            'paragraph_one' => SanitizeInput::esc_html($this->setting_item('paragraph_one')) ?? '',
            'paragraph_two' => SanitizeInput::esc_html($this->setting_item('paragraph_two')) ?? '',
            'counter_1_number' => SanitizeInput::esc_html($this->setting_item('counter_1_number')) ?? '',
            'counter_1_text' => SanitizeInput::esc_html($this->setting_item('counter_1_text')) ?? '',
            'counter_2_number' => SanitizeInput::esc_html($this->setting_item('counter_2_number')) ?? '',
            'counter_2_text' => SanitizeInput::esc_html($this->setting_item('counter_2_text')) ?? '',
            'counter_3_number' => SanitizeInput::esc_html($this->setting_item('counter_3_number')) ?? '',
            'counter_3_text' => SanitizeInput::esc_html($this->setting_item('counter_3_text')) ?? '',
            'counter_3_suffix' => SanitizeInput::esc_html($this->setting_item('counter_3_suffix')) ?? '',
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.common.about-story', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('About Story (About Page)');
    }
}

