<?php

namespace Plugins\PageBuilder\Addons\Tenants\LexendV4\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class Cta extends PageBuilderBase
{
    public function preview_image()
    {
        return 'Tenant/common/cta-13.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        $all_languages = GlobalLanguage::all_languages();

        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);

            $output .= Text::get([
                'name' => 'title_'.$lang->slug,
                'label' => __('Title'),
                'value' => $widget_saved_values['title_'.$lang->slug] ?? null,
                'placeholder' => __('Automate Repetitive Tasks, {h}Collaborate Seamlessly{/h}'),
                'info' => __('Use {h}text{/h} to highlight text in primary color')
            ]);

            $output .= Text::get([
                'name' => 'subtitle_'.$lang->slug,
                'label' => __('Subtitle'),
                'value' => $widget_saved_values['subtitle_'.$lang->slug] ?? null,
                'placeholder' => __('Automate routine payments and bills with our intuitive and secure payment system.')
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $output .= Text::get([
            'name' => 'button_text',
            'label' => __('Button Text'),
            'value' => $widget_saved_values['button_text'] ?? null,
            'placeholder' => __('Start a free trial')
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
            'placeholder' => __('No credit card required!')
        ]);

        $output .= Image::get([
            'name' => 'background_image',
            'label' => __('Background Image'),
            'value' => $widget_saved_values['background_image'] ?? null,
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
        $current_lang = GlobalLanguage::user_lang_slug();
        $title = $this->setting_item('title_'.$current_lang) ?? '';
        $subtitle = $this->setting_item('subtitle_'.$current_lang) ?? '';
        $button_text = $this->setting_item('button_text') ?? '';
        $button_url = $this->setting_item('button_url') ?? '';
        $button_subtext = $this->setting_item('button_subtext') ?? '';
        $background_image = $this->setting_item('background_image') ?? '';

        // Process highlighted text
        $title = str_replace(['{h}', '{/h}'], ['<span class="text-primary dark:text-quaternary">', '</span>'], $title);

        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $data = [
            'title' => $title,
            'subtitle' => $subtitle,
            'button_text' => $button_text,
            'button_url' => $button_url,
            'button_subtext' => $button_subtext,
            'background_image' => $background_image,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
        ];

        return self::renderView('tenant.lexend-v4.cta', $data);
    }

    public function addon_title()
    {
        return __('CTA Section (Home Page)');
    }
}



