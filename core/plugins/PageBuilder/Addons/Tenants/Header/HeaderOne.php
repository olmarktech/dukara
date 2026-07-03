<?php

namespace Plugins\PageBuilder\Addons\Tenants\Header;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class HeaderOne extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Tenant/home/header-01.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        $all_languages = LanguageHelper::all_languages();

        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);
            
            $output .= Text::get([
                'name' => 'badge_text_'.$lang->slug,
                'label' => __('Badge Text (Top small text)'),
                'value' => $widget_saved_values['badge_text_'.$lang->slug] ?? null,
            ]);
            
            $output .= Text::get([
                'name' => 'title_'.$lang->slug,
                'label' => __('Title'),
                'value' => $widget_saved_values['title_'.$lang->slug] ?? null,
                'info' => __('To show the highlighted text, place your word between this code {h}YourText{/h}')
            ]);

            $output .= Text::get([
                'name' => 'subtitle_'.$lang->slug,
                'label' => __('Subtitle'),
                'value' => $widget_saved_values['subtitle_'.$lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'button_text_'.$lang->slug,
                'label' => __('Button Text'),
                'value' => $widget_saved_values['button_text_'.$lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'button_url_'.$lang->slug,
                'label' => __('Button Url'),
                'value' => $widget_saved_values['button_url_'.$lang->slug] ?? null,
            ]);
            
            $output .= Text::get([
                'name' => 'button_subtext_'.$lang->slug,
                'label' => __('Button Subtext (Below button)'),
                'value' => $widget_saved_values['button_subtext_'.$lang->slug] ?? null,
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $output .= Image::get([
            'name' => 'right_foreground_image',
            'label' => __('Right Foreground Image'),
            'value' => $widget_saved_values['right_foreground_image'] ?? null,
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
        $current_lang = LanguageHelper::user_lang_slug();
        $badge_text = $this->setting_item('badge_text_'.$current_lang) ?? '';
        $title = $this->setting_item('title_'.$current_lang) ?? '';
        $subtitle = $this->setting_item('subtitle_'.$current_lang) ?? '';
        $button_text = $this->setting_item('button_text_'.$current_lang) ?? '';
        $button_url = $this->setting_item('button_url_'.$current_lang) ?? '';
        $button_subtext = $this->setting_item('button_subtext_'.$current_lang) ?? '';
        $right_foreground_image = $this->setting_item('right_foreground_image') ?? '';
        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        // Map old seeder fields to new format for backward compatibility
        if (empty($right_foreground_image)) {
            $right_foreground_image = $this->setting_item('right_bg_image') ?? '';
        }
        if (empty($button_text)) {
            $button_text = 'Get Started';
        }
        if (empty($button_url)) {
            $button_url = '#';
        }
        if (empty($button_subtext)) {
            $button_subtext = 'No credit card required!';
        }
        if (empty($badge_text)) {
            $badge_text = 'WORK SMARTER, NOT HARDER.';
        }

        // Check if lexend-v4 theme is active
        $active_theme = get_static_option('active_frontend_theme');
        $is_lexend_v4 = ($active_theme === 'lexend-v4');

        $data = [
            'badge_text' => $badge_text,
            'title' => $title,
            'subtitle' => $subtitle,
            'button_text' => $button_text,
            'button_url' => $button_url,
            'button_subtext' => $button_subtext,
            'right_foreground_image' => $right_foreground_image,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
        ];

        if ($is_lexend_v4) {
            $theme_widget_path = 'themes.lexend-v4.widgets.HeaderOne';
            if (view()->exists($theme_widget_path)) {
                return view($theme_widget_path, compact('data'))->render();
            }
        }

        // Fallback to default view
        return self::renderView('tenant.home-one.home-one-header-one', $data);
    }

    public function enable(): bool
    {
        return !is_null(tenant());
    }

    public function addon_title()
    {
        return __('Header : 01');
    }
}



