<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class KeyFeaturesDark extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/key-features-dark.png';
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
            'info' => __('Use {h}text{/h} for highlighted text. e.g., "Review quickly using {h}Lexend.{/h}"')
        ]);

        //repeater for feature cards
        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'features_dark_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_icon',
                    'label' => __('Icon Class'),
                    'info' => __('Enter icon class. Unicon: unicon-document, unicon-model, unicon-layers, unicon-arrow-right. FontAwesome: fa fa-star, fa fa-rocket')
                ],
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
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_link_url',
                    'label' => __('Link URL (Optional)'),
                    'info' => __('Card will be clickable if provided')
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
            'repeater_data' => $this->setting_item('features_dark_repeater'),
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.common.key-features-dark', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Key Features Dark (Features/Themes Page)');
    }
}

