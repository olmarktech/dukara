<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;

use Plugins\PageBuilder\Fields\IconPicker;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Slider;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class WhyChooseUs extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/home/why_choose_us.jpg';
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
            'info' => __('To show the highlighted text, place your word between this code {h}YourText{/h}')
        ]);

        //repeater
        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'why_choose_us_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::ICON_PICKER,
                    'name' => 'repeater_icon',
                    'label' => __('Icon (Unicons class)')
                ],
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'repeater_image',
                    'label' => __('Or upload SVG Icon'),
                    'info' => __('Icon takes priority over image')
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
            ]
        ]);

        // CTA Button (Optional)
        $output .= Text::get([
            'name' => 'cta_button_text',
            'label' => __('CTA Button Text (Optional)'),
            'value' => $widget_saved_values['cta_button_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'cta_button_url',
            'label' => __('CTA Button URL'),
            'value' => $widget_saved_values['cta_button_url'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'cta_button_subtext',
            'label' => __('CTA Button Subtext (Optional)'),
            'value' => $widget_saved_values['cta_button_subtext'] ?? null,
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
        $repeater_data = $this->setting_item('why_choose_us_repeater');
        $section_id = SanitizeInput::esc_html($this->setting_item('section_id')) ?? '';
        $cta_button_text = SanitizeInput::esc_html($this->setting_item('cta_button_text')) ?? '';
        $cta_button_url = SanitizeInput::esc_url($this->setting_item('cta_button_url')) ?? '';
        $cta_button_subtext = SanitizeInput::esc_html($this->setting_item('cta_button_subtext')) ?? '';

        $data = [
            'title' => $title,
            'repeater_data' => $repeater_data,
            'section_id' => $section_id,
            'cta_button_text' => $cta_button_text,
            'cta_button_url' => $cta_button_url,
            'cta_button_subtext' => $cta_button_subtext,
        ];

        return self::renderView('landlord.addons.common.why-choose', $data);

    }

    public function enable(): bool
    {
        return (bool)is_null(tenant());
    }

    public function addon_title()
    {
        return __('Why Choose Us');
    }
}
