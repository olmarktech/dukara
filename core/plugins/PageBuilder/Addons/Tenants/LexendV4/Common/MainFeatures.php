<?php

namespace Plugins\PageBuilder\Addons\Tenants\LexendV4\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class MainFeatures extends PageBuilderBase
{
    public function preview_image()
    {
        return 'Tenant/common/main-features-13.png';
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
                'placeholder' => __('Automate processes, and {h}drive growth features{/h}'),
                'info' => __('Use {h}text{/h} to highlight text in primary color')
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $output .= Text::get([
            'name' => 'button_text',
            'label' => __('Button Text'),
            'value' => $widget_saved_values['button_text'] ?? null,
            'placeholder' => __('Start a free trial')
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
            'placeholder' => __('No credit card required!')
        ]);

        $output .= Repeater::get([
            'multi_lang' => true,
            'settings' => $widget_saved_values,
            'id' => 'features_repeater',
            'fields' => [
                [
                    'type' => Repeater::TEXT,
                    'name' => 'title',
                    'label' => __('Feature Title'),
                    'value' => $widget_saved_values['title'] ?? null,
                ],
                [
                    'type' => Repeater::TEXTAREA,
                    'name' => 'description',
                    'label' => __('Feature Description'),
                    'value' => $widget_saved_values['description'] ?? null,
                ],
                [
                    'type' => Repeater::IMAGE,
                    'name' => 'feature_image',
                    'label' => __('Feature Image'),
                    'value' => $widget_saved_values['feature_image'] ?? null,
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
        $button_text = $this->setting_item('button_text') ?? '';
        $button_url = $this->setting_item('button_url') ?? '';
        $button_subtext = $this->setting_item('button_subtext') ?? '';

        $settings = $this->get_settings();
        $features = $settings['features_repeater'] ?? [];

        // Process highlighted text
        $heading = str_replace(['{h}', '{/h}'], ['<span class="text-primary dark:text-quaternary">', '</span>'], $heading);

        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $data = [
            'heading' => $heading,
            'button_text' => $button_text,
            'button_url' => $button_url,
            'button_subtext' => $button_subtext,
            'features' => $features,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
        ];

        return self::renderView('tenant.lexend-v4.main-features', $data);
    }

    public function addon_title()
    {
        return __('Main Features (Home Page)');
    }
}



