<?php

namespace Plugins\PageBuilder\Addons\Landlord\Blog;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\PageBuilderBase;

class BlogNewsletter extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/blog/blog-newsletter.png';
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
        ]);

        $output .= Textarea::get([
            'name' => 'description',
            'label' => __('Description'),
            'value' => $widget_saved_values['description'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'input_placeholder',
            'label' => __('Email Input Placeholder'),
            'value' => $widget_saved_values['input_placeholder'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'button_text',
            'label' => __('Button Text'),
            'value' => $widget_saved_values['button_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'disclaimer_text',
            'label' => __('Disclaimer Text (small text below)'),
            'value' => $widget_saved_values['disclaimer_text'] ?? null,
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
            'description' => SanitizeInput::esc_html($this->setting_item('description')) ?? '',
            'input_placeholder' => SanitizeInput::esc_html($this->setting_item('input_placeholder')) ?? '',
            'button_text' => SanitizeInput::esc_html($this->setting_item('button_text')) ?? '',
            'disclaimer_text' => SanitizeInput::esc_html($this->setting_item('disclaimer_text')) ?? '',
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.blog.blog-newsletter', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Blog Newsletter (Lexend)');
    }
}

