<?php

namespace Plugins\PageBuilder\Addons\Tenants\LexendV4\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class Pricing extends PageBuilderBase
{
    public function preview_image()
    {
        return 'Tenant/common/pricing-13.png';
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
                'placeholder' => __('Scalable and affordable prices*')
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $output .= Text::get([
            'name' => 'disclaimer_text',
            'label' => __('Disclaimer Text'),
            'value' => $widget_saved_values['disclaimer_text'] ?? null,
            'placeholder' => __('Prices are subject to change at any time and under any circumstances, and discounts are only temporary.')
        ]);

        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'pricing_repeater',
            'fields' => [
                [
                    'type' => Repeater::TEXT,
                    'name' => 'plan_name',
                    'label' => __('Plan Name'),
                    'value' => $widget_saved_values['plan_name'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'plan_price',
                    'label' => __('Price (without currency)'),
                    'value' => $widget_saved_values['plan_price'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'plan_duration',
                    'label' => __('Duration (e.g., /mo)'),
                    'value' => $widget_saved_values['plan_duration'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'plan_description',
                    'label' => __('Plan Description'),
                    'value' => $widget_saved_values['plan_description'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'button_text',
                    'label' => __('Button Text'),
                    'value' => $widget_saved_values['button_text'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'button_url',
                    'label' => __('Button URL'),
                    'value' => $widget_saved_values['button_url'] ?? null,
                ],
                [
                    'type' => Repeater::TEXT,
                    'name' => 'button_subtext',
                    'label' => __('Button Subtext'),
                    'value' => $widget_saved_values['button_subtext'] ?? null,
                ],
                [
                    'type' => Repeater::SWITCHER,
                    'name' => 'is_popular',
                    'label' => __('Mark as Popular'),
                    'value' => $widget_saved_values['is_popular'] ?? null,
                ],
                [
                    'type' => Repeater::REPEATER,
                    'name' => 'features',
                    'label' => __('Plan Features'),
                    'value' => $widget_saved_values['features'] ?? null,
                    'fields' => [
                        [
                            'type' => Repeater::TEXT,
                            'name' => 'feature_text',
                            'label' => __('Feature Text'),
                            'value' => $widget_saved_values['feature_text'] ?? null,
                        ],
                    ]
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
        $disclaimer_text = $this->setting_item('disclaimer_text') ?? '';

        $settings = $this->get_settings();
        $pricing_plans = $settings['pricing_repeater'] ?? [];

        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top')) ?: '80px';
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom')) ?: '80px';

        $data = [
            'heading' => $heading,
            'disclaimer_text' => $disclaimer_text,
            'pricing_plans' => $pricing_plans,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
        ];

        return self::renderView('tenant.lexend-v4.pricing', $data);
    }

    public function addon_title()
    {
        return __('Pricing Plans (Home Page)');
    }
}



