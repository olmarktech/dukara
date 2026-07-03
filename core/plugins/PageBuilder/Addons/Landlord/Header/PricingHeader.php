<?php

namespace Plugins\PageBuilder\Addons\Landlord\Header;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class PricingHeader extends PageBuilderBase
{

    public function preview_image()
    {
       return 'Landlord/header/pricing-header.png';
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
        ]);

        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'monthly_text',
            'label' => __('Monthly Tab Text'),
            'value' => $widget_saved_values['monthly_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'yearly_text',
            'label' => __('Yearly Tab Text'),
            'value' => $widget_saved_values['yearly_text'] ?? null,
        ]);

        // add padding option
        $output.= $this->section_id_and_class_fields($widget_saved_values);
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
            'monthly_text' => SanitizeInput::esc_html($this->setting_item('monthly_text')) ?? '',
            'yearly_text' => SanitizeInput::esc_html($this->setting_item('yearly_text')) ?? '',
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.header.PricingHeader',$data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Pricing Header (Pricing Page)');
    }
}

