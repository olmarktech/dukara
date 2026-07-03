<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class CtaIndex13 extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/cta-index13.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'title',
            'label' => __('Title (First Line)'),
            'value' => $widget_saved_values['title'] ?? null,
            'info' => __('e.g., "Automate Repetitive Tasks,"')
        ]);

        $output .= Text::get([
            'name' => 'title_highlight',
            'label' => __('Title Highlight (Second Line)'),
            'value' => $widget_saved_values['title_highlight'] ?? null,
            'info' => __('This text will be highlighted. e.g., "Collaborate Seamlessly"')
        ]);

        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'button_text',
            'label' => __('Button Text'),
            'value' => $widget_saved_values['button_text'] ?? null,
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
        ]);

        $output .= Image::get([
            'name' => 'cta_image',
            'label' => __('Dashboard/Product Image'),
            'value' => $widget_saved_values['cta_image'] ?? null,
            'info' => __('Optional. Leave empty to use default dashboard image. Recommended: 1200x800px')
        ]);

        // add padding option
        $output .= $this->section_id_and_class_fields($widget_saved_values);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $title = SanitizeInput::esc_html($this->setting_item('title')) ?? '';
        $title_highlight = SanitizeInput::esc_html($this->setting_item('title_highlight')) ?? '';
        $subtitle = SanitizeInput::esc_html($this->setting_item('subtitle')) ?? '';
        $button_text = SanitizeInput::esc_html($this->setting_item('button_text')) ?? '';
        $button_url = SanitizeInput::esc_url($this->setting_item('button_url')) ?? '';
        $button_subtext = SanitizeInput::esc_html($this->setting_item('button_subtext')) ?? '';
        $cta_image = $this->setting_item('cta_image') ?? '';
        $section_id = SanitizeInput::esc_html($this->setting_item('section_id')) ?? '';

        $data = [
            'title' => $title,
            'title_highlight' => $title_highlight,
            'subtitle' => $subtitle,
            'button_text' => $button_text,
            'button_url' => $button_url,
            'button_subtext' => $button_subtext,
            'cta_image' => $cta_image,
            'section_id' => $section_id,
        ];

        return self::renderView('landlord.addons.common.cta-index13', $data);

    }

    public function enable(): bool
    {
        return (bool)is_null(tenant());
    }

    public function addon_title()
    {
        return __('CTA Index-13 (Gradient with Image)');
    }
}

