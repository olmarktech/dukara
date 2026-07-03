<?php

namespace Plugins\PageBuilder\Addons\Landlord\Header;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class ContactHeader extends PageBuilderBase
{

    public function preview_image()
    {
       return 'Landlord/header/contact-header.png';
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

        $output .= Textarea::get([
            'name' => 'subtitle',
            'label' => __('Subtitle/Description'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'form_description',
            'label' => __('Form Description Text'),
            'value' => $widget_saved_values['form_description'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'email_text',
            'label' => __('Email Link Text (e.g., "Or drop us a message via email")'),
            'value' => $widget_saved_values['email_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'email_address',
            'label' => __('Email Address'),
            'value' => $widget_saved_values['email_address'] ?? null,
        ]);

        $output .= Image::get([
            'name' => 'background_image',
            'label' => __('Background Image'),
            'value' => $widget_saved_values['background_image'] ?? null,
            'dimensions' => 'Recommended: 600x800px'
        ]);

        $output .= Text::get([
            'name' => 'testimonial_text',
            'label' => __('Testimonial Quote'),
            'value' => $widget_saved_values['testimonial_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'testimonial_name',
            'label' => __('Testimonial Author Name'),
            'value' => $widget_saved_values['testimonial_name'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'testimonial_position',
            'label' => __('Testimonial Author Position'),
            'value' => $widget_saved_values['testimonial_position'] ?? null,
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
            'form_description' => SanitizeInput::esc_html($this->setting_item('form_description')) ?? '',
            'email_text' => SanitizeInput::esc_html($this->setting_item('email_text')) ?? '',
            'email_address' => SanitizeInput::esc_html($this->setting_item('email_address')) ?? '',
            'background_image' => $this->setting_item('background_image') ?? '',
            'testimonial_text' => SanitizeInput::esc_html($this->setting_item('testimonial_text')) ?? '',
            'testimonial_name' => SanitizeInput::esc_html($this->setting_item('testimonial_name')) ?? '',
            'testimonial_position' => SanitizeInput::esc_html($this->setting_item('testimonial_position')) ?? '',
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.header.ContactHeader',$data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Contact Header (Lexend)');
    }
}

