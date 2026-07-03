<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\PageBuilderBase;

class SignInForm extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/signin-form.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        // Left side - Image with testimonial
        $output .= Image::get([
            'name' => 'background_image',
            'label' => __('Background Image'),
            'value' => $widget_saved_values['background_image'] ?? null,
            'dimensions' => 'Recommended: 800x1200px (portrait)'
        ]);

        $output .= Textarea::get([
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

        // Right side - Form
        $output .= Text::get([
            'name' => 'form_title',
            'label' => __('Form Title'),
            'value' => $widget_saved_values['form_title'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'email_placeholder',
            'label' => __('Email Input Placeholder'),
            'value' => $widget_saved_values['email_placeholder'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'password_placeholder',
            'label' => __('Password Input Placeholder'),
            'value' => $widget_saved_values['password_placeholder'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'remember_text',
            'label' => __('Remember Me Text'),
            'value' => $widget_saved_values['remember_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'forgot_password_text',
            'label' => __('Forgot Password Text'),
            'value' => $widget_saved_values['forgot_password_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'forgot_password_url',
            'label' => __('Forgot Password URL'),
            'value' => $widget_saved_values['forgot_password_url'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'button_text',
            'label' => __('Submit Button Text'),
            'value' => $widget_saved_values['button_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'signup_text',
            'label' => __('Sign Up Link Text'),
            'value' => $widget_saved_values['signup_text'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'signup_url',
            'label' => __('Sign Up URL'),
            'value' => $widget_saved_values['signup_url'] ?? null,
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
            'background_image' => $this->setting_item('background_image') ?? '',
            'testimonial_text' => SanitizeInput::esc_html($this->setting_item('testimonial_text')) ?? '',
            'testimonial_name' => SanitizeInput::esc_html($this->setting_item('testimonial_name')) ?? '',
            'testimonial_position' => SanitizeInput::esc_html($this->setting_item('testimonial_position')) ?? '',
            'form_title' => SanitizeInput::esc_html($this->setting_item('form_title')) ?? '',
            'email_placeholder' => SanitizeInput::esc_html($this->setting_item('email_placeholder')) ?? '',
            'password_placeholder' => SanitizeInput::esc_html($this->setting_item('password_placeholder')) ?? '',
            'remember_text' => SanitizeInput::esc_html($this->setting_item('remember_text')) ?? '',
            'forgot_password_text' => SanitizeInput::esc_html($this->setting_item('forgot_password_text')) ?? '',
            'forgot_password_url' => SanitizeInput::esc_url($this->setting_item('forgot_password_url')) ?? '',
            'button_text' => SanitizeInput::esc_html($this->setting_item('button_text')) ?? '',
            'signup_text' => SanitizeInput::esc_html($this->setting_item('signup_text')) ?? '',
            'signup_url' => SanitizeInput::esc_url($this->setting_item('signup_url')) ?? '',
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.common.signin-form', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Sign In Form (Lexend)');
    }
}

