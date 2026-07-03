<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class ThemesShowcase extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/themes-showcase.png';
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
            'info' => __('e.g., "Amazing themes for your business."')
        ]);

        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'view_button_text',
            'label' => __('View Theme Button Text'),
            'value' => $widget_saved_values['view_button_text'] ?? 'View Theme',
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
        $subtitle = SanitizeInput::esc_html($this->setting_item('subtitle')) ?? '';
        $view_button_text = SanitizeInput::esc_html($this->setting_item('view_button_text')) ?: 'View Theme';
        $section_id = SanitizeInput::esc_html($this->setting_item('section_id')) ?? '';

        // Themes are fetched directly in blade using getAllThemeData() helper
        $data = [
            'title' => $title,
            'subtitle' => $subtitle,
            'view_button_text' => $view_button_text,
            'section_id' => $section_id,
        ];

        return self::renderView('landlord.addons.common.themes-showcase', $data);
    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Themes Showcase (Amazing Themes Page)');
    }
}
