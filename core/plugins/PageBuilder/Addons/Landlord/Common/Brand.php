<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class Brand extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/brand.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'section_title',
            'label' => __('Section Title (Optional)'),
            'value' => $widget_saved_values['section_title'] ?? null,
        ]);

        $output .= Select::get([
            'name' => 'display_style',
            'label' => __('Display Style'),
            'options' => [
                'default' => __('Grid with Background (Home)'),
                'slider' => __('Slider without Background (About)'),
                'slider-with-title' => __('Slider with Title (Contact/Pricing)'),
            ],
            'value' => $widget_saved_values['display_style'] ?? 'default',
            'info' => __('Choose display style for different pages')
        ]);

        // Repeater for Brand Images
        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'brand_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'repeater_image',
                    'label' => __('Brand Logo (Light Mode)'),
                    'info' => __('Logo for light mode / default')
                ],
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'repeater_image_dark',
                    'label' => __('Brand Logo (Dark Mode) - Optional'),
                    'info' => __('Optional: Logo for dark mode. Leave empty to use light version.')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title',
                    'label' => __('Brand Name (for alt text)')
                ]
            ]
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
            'section_title' => SanitizeInput::esc_html($this->setting_item('section_title')) ?? '',
            'display_style' => SanitizeInput::esc_html($this->setting_item('display_style')) ?? 'default',
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
            'repeater_data' => $this->setting_item('brand_repeater'),
        ];

        return self::renderView('landlord.addons.common.brand', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Brands (Home/Pricing/About/Contact)');
    }
}
