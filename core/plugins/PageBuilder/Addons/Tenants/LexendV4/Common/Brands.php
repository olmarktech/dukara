<?php

namespace Plugins\PageBuilder\Addons\Tenants\LexendV4\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class Brands extends PageBuilderBase
{
    public function preview_image()
    {
        return 'Tenant/common/brands-13.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'brands_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'brand_image',
                    'label' => __('Brand Logo'),
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'brand_alt',
                    'label' => __('Alt Text'),
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
        $settings = $this->get_settings();
        $repeater_data = $settings['brands_repeater'] ?? [];
        
        // Transform repeater data to proper format
        $brands = [];
        if (!empty($repeater_data['brand_image_'])) {
            $images = $repeater_data['brand_image_'];
            $alts = $repeater_data['brand_alt_'] ?? [];
            
            foreach ($images as $index => $image_id) {
                if (!empty($image_id)) {
                    $brands[] = [
                        'brand_image' => $image_id,
                        'brand_alt' => $alts[$index] ?? 'Brand'
                    ];
                }
            }
        }

        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $data = [
            'brands' => $brands,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
        ];

        return self::renderView('tenant.lexend-v4.brands', $data);
    }

    public function addon_title()
    {
        return __('Brands (Home Page)');
    }
}



