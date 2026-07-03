<?php

namespace Plugins\PageBuilder\Addons\Landlord\Header;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class FeaturesHeader extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/header/features-header.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'title',
            'label' => __('Page Title'),
            'value' => $widget_saved_values['title'] ?? null,
            'info' => __('e.g., "What separates you from others."')
        ]);

        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);

        //repeater for feature cards
        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'features_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title',
                    'label' => __('Feature Title')
                ],
                [
                    'type' => RepeaterField::TEXTAREA,
                    'name' => 'repeater_description',
                    'label' => __('Feature Description')
                ],
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'repeater_image',
                    'label' => __('Feature Image/SVG'),
                    'info' => __('Recommended: SVG illustration')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_link_text',
                    'label' => __('Link Text (Optional)'),
                    'info' => __('e.g., "See all integrations"')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_link_url',
                    'label' => __('Link URL (Optional)')
                ],
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
            'title' => SanitizeInput::esc_html($this->setting_item('title')) ?? '',
            'subtitle' => SanitizeInput::esc_html($this->setting_item('subtitle')) ?? '',
            'repeater_data' => $this->setting_item('features_repeater'),
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.header.features-header', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Features Header (Features Page)');
    }
}

