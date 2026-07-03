<?php

namespace Plugins\PageBuilder\Addons\Tenants\LexendV4\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class Testimonials extends PageBuilderBase
{
    public function preview_image()
    {
        return 'Tenant/common/testimonials-13.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        $all_languages = GlobalLanguage::all_languages();

        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);

            $output .= Text::get([
                'name' => 'heading_'.$lang->slug,
                'label' => __('Section Heading'),
                'value' => $widget_saved_values['heading_'.$lang->slug] ?? null,
                'placeholder' => __('See what clients says:')
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $output .= Repeater::get([
            'multi_lang' => true,
            'settings' => $widget_saved_values,
            'id' => 'testimonials_repeater',
            'fields' => [
                [
                    'type' => Repeater::TEXT,
                    'name' => 'client_name',
                    'label' => __('Client Name'),
                    'value' => $widget_saved_values['client_name'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'client_position',
                    'label' => __('Client Position/Company'),
                    'value' => $widget_saved_values['client_position'] ?? null,
                ],
                [
                    'type' => Repeater::TEXTAREA,
                    'name' => 'testimonial_text',
                    'label' => __('Testimonial Text'),
                    'value' => $widget_saved_values['testimonial_text'] ?? null,
                ],
                [
                    'type' => Repeater::IMAGE,
                    'name' => 'client_image',
                    'label' => __('Client Image'),
                    'value' => $widget_saved_values['client_image'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'video_url',
                    'label' => __('Video URL (optional)'),
                    'value' => $widget_saved_values['video_url'] ?? null,
                    'info' => __('Leave empty if no video testimonial')
                ],
            ]
        ]);

        // add padding option
        $output .= $this->padding_fields($widget_saved_values);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $current_lang = GlobalLanguage::user_lang_slug();
        $heading = $this->setting_item('heading_'.$current_lang) ?? '';

        $settings = $this->get_settings();
        $testimonials = $settings['testimonials_repeater'] ?? [];

        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top')) ?: '80px';
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom')) ?: '80px';

        $data = [
            'heading' => $heading,
            'testimonials' => $testimonials,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
        ];

        return self::renderView('tenant.lexend-v4.testimonials', $data);
    }

    public function addon_title()
    {
        return __('Client Testimonials (Home Page)');
    }
}



