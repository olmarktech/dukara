<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class ContactHelpfulLinks extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/common/contact-helpful-links.png';
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
            'info' => __('e.g., "Other ways to reach us"')
        ]);

        //repeater for contact cards
        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'contact_links_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'repeater_icon',
                    'label' => __('Icon (Light Mode)'),
                    'info' => __('SVG icon recommended')
                ],
                [
                    'type' => RepeaterField::IMAGE,
                    'name' => 'repeater_icon_dark',
                    'label' => __('Icon (Dark Mode) - Optional'),
                    'info' => __('Leave empty to use light version')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title',
                    'label' => __('Card Title'),
                    'info' => __('e.g., "Visit us", "Via chat"')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_description',
                    'label' => __('Card Description'),
                    'info' => __('e.g., "Don Valley, Toronto, CA"')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_link_text',
                    'label' => __('Link Text'),
                    'info' => __('e.g., "View on maps"')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_link_url',
                    'label' => __('Link URL'),
                    'info' => __('Full URL or #')
                ],
            ]
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
            'repeater_data' => $this->setting_item('contact_links_repeater'),
            'section_id' => SanitizeInput::esc_html($this->setting_item('section_id')) ?? '',
        ];

        return self::renderView('landlord.addons.common.contact-helpful-links', $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Contact Helpful Links (4-Column Grid)');
    }
}

