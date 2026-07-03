<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class CtaFeatures extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/cta-features.png';
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
            'info' => __('e.g., "Create stunning websites that fits your needs."')
        ]);

        $output .= Text::get([
            'name' => 'button_text',
            'label' => __('Button Text'),
            'value' => $widget_saved_values['button_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'button_url',
            'label' => __('Button URL'),
            'value' => $widget_saved_values['button_url'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'button_subtext',
            'label' => __('Button Subtext'),
            'value' => $widget_saved_values['button_subtext'] ?? null,
            'info' => __('Small text below button, e.g., "14-day trial, no credit card required."')
        ]);

        $output .= Image::get([
            'name' => 'image_light',
            'label' => __('Right Side Image (Light Mode)'),
            'value' => $widget_saved_values['image_light'] ?? null,
            'info' => __('SVG or PNG image for light mode. Recommended: charts.svg')
        ]);

        $output .= Image::get([
            'name' => 'image_dark',
            'label' => __('Right Side Image (Dark Mode)'),
            'value' => $widget_saved_values['image_dark'] ?? null,
            'info' => __('SVG or PNG image for dark mode. Recommended: charts-dark.svg')
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
            'button_text' => SanitizeInput::esc_html($this->setting_item('button_text')) ?? '',
            'button_url' => SanitizeInput::esc_html($this->setting_item('button_url')) ?? '',
            'button_subtext' => SanitizeInput::esc_html($this->setting_item('button_subtext')) ?? '',
            'image_light' => $this->setting_item('image_light') ?? '',
            'image_dark' => $this->setting_item('image_dark') ?? '',
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.common.cta-features', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('CTA (Features/Themes Page)');
    }
}

