<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;

use Plugins\PageBuilder\Fields\IconPicker;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Slider;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class FaqOne extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/home/faq.jpg';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Select::get([
            'name' => 'display_style',
            'label' => __('Display Style'),
            'options' => [
                'default' => __('Individual Cards (Home/Index-13)'),
                'boxed' => __('Boxed Container (Contact Page)'),
            ],
            'value' => $widget_saved_values['display_style'] ?? 'default',
            'info' => __('Select the FAQ display style')
        ]);

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
            'id' => 'faq_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title',
                    'label' => __('Question')
                ],
                [
                    'type' => RepeaterField::TEXTAREA,
                    'name' => 'repeater_description',
                    'label' => __('Answer')
                ],
            ]
        ]);

            $output .= Text::get([
                'name' => 'cta_button_text',
                'label' => __('CTA Button Text'),
                'value' => $widget_saved_values['cta_button_text'] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'cta_button_url',
                'label' => __('CTA Button URL'),
                'value' => $widget_saved_values['cta_button_url'] ?? null,
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
        $display_style = SanitizeInput::esc_html($this->setting_item('display_style')) ?? 'default';
        $title = SanitizeInput::esc_html($this->setting_item('title')) ?? '';
        $cta_button_text = SanitizeInput::esc_html($this->setting_item('cta_button_text')) ?? '';
        $cta_button_url = SanitizeInput::esc_url($this->setting_item('cta_button_url')) ?? '';
        $repeater_data = $this->setting_item('faq_repeater');
        $section_id = $this->setting_item('section_id') ?? '';

        $data = [
            'display_style' => $display_style,
            'title' => $title,
            'cta_button_text' => $cta_button_text,
            'cta_button_url' => $cta_button_url,
            'repeater_data' => $repeater_data,
            'section_id'=> $section_id,
        ];

        return self::renderView('landlord.addons.common.faq', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('FAQ Accordion (Pricing/Features/Contact Page)');
    }
}
