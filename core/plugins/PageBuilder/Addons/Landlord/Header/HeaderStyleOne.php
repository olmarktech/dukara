<?php

namespace Plugins\PageBuilder\Addons\Landlord\Header;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;

use Plugins\PageBuilder\Fields\IconPicker;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Slider;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\Traits\GlobalAdminFields;
use Plugins\PageBuilder\PageBuilderBase;

class HeaderStyleOne extends PageBuilderBase
{

    public function preview_image()
    {
       return 'Landlord/home/header_01.jpg';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();
        
            $output .= Text::get([
                'name' => 'badge_text',
                'label' => __('Badge Text (Top small text)'),
                'value' => $widget_saved_values['badge_text'] ?? null,
            ]);
        
            $output .= Text::get([
                'name' => 'title',
                'label' => __('Title'),
                'value' => $widget_saved_values['title'] ?? null,
                'info' => __('To show the highlighted text, place your word between this code {h}YourText{/h}')
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
                'label' => __('Button Url'),
                'value' => $widget_saved_values['button_url'] ?? null,
            ]);
            
            $output .= Text::get([
                'name' => 'button_subtext',
                'label' => __('Button Subtext (Below button)'),
                'value' => $widget_saved_values['button_subtext'] ?? null,
            ]);


        $output .= Image::get([
            'name' => 'right_foreground_image',
            'label' => __('Hero Dashboard Image'),
            'value' => $widget_saved_values['right_foreground_image'] ?? null,
            'dimensions' => 'Recommended: 1920x1080px or 16:9 ratio'
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
        $badge_text = SanitizeInput::esc_html($this->setting_item('badge_text')) ?? '';
        $title = SanitizeInput::esc_html($this->setting_item('title')) ?? '';
        $subtitle = SanitizeInput::esc_html($this->setting_item('subtitle')) ?? '';
        $button_text = SanitizeInput::esc_html($this->setting_item('button_text')) ?? '';
        $button_url = SanitizeInput::esc_url($this->setting_item('button_url')) ?? '';
        $button_subtext = SanitizeInput::esc_html($this->setting_item('button_subtext')) ?? '';
        $right_foreground_image = $this->setting_item('right_foreground_image') ?? '';
        $section_id = $this->setting_item('section_id') ?? '';

        $data = [
            'badge_text'=> $badge_text,
            'title'=> $title,
            'subtitle'=> $subtitle,
            'button_text'=> $button_text,
            'button_url'=> $button_url,
            'button_subtext'=> $button_subtext,
            'right_foreground_image' => $right_foreground_image,
            'section_id'=> $section_id,
        ];

        return self::renderView('landlord.addons.header.HeaderOne',$data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Header :01');
    }
}
