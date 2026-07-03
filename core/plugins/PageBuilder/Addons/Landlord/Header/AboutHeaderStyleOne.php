<?php

namespace Plugins\PageBuilder\Addons\Landlord\Header;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class AboutHeaderStyleOne extends PageBuilderBase
{

    public function preview_image()
    {
       return 'Landlord/header/header-01.png';
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

        $output .= Image::get([
            'name' => 'left_image',
            'label' => __('Left Image (Smaller)'),
            'value' => $widget_saved_values['left_image'] ?? null,
            'dimensions' => 'Recommended: 400x600px (2:3 ratio)'
        ]);

        $output .= Image::get([
            'name' => 'right_image',
            'label' => __('Right Image (Larger)'),
            'value' => $widget_saved_values['right_image'] ?? null,
            'dimensions' => 'Recommended: 800x600px or 16:9 ratio'
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
        $title = SanitizeInput::esc_html($this->setting_item('title')) ?? '';
        $description = SanitizeInput::esc_html($this->setting_item('description')) ?? '';
        $left_image = $this->setting_item('left_image') ?? '';
        $right_image = $this->setting_item('right_image') ?? '';
        $section_id = $this->setting_item('section_id') ?? '';

        $data = [
            'title'=> $title,
            'description'=> $description,
            'left_image' => $left_image,
            'right_image' => $right_image,
            'section_id'=> $section_id,
        ];

        return self::renderView('landlord.addons.header.AboutHeaderOne',$data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('About Header (About Page)');
    }
}
