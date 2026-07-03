<?php

namespace Plugins\PageBuilder\Addons\Tenants\Common;

use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;
use function __;

class PricePlanOne extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Tenant/home/home-one-price-plan-01.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();
        $output .= $this->admin_language_tab(); //have to start language tab from here on
        $output .= $this->admin_language_tab_start();
        $all_languages = LanguageHelper::all_languages();

        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);
            $output .= Text::get([
                'name' => 'title_'.$lang->slug,
                'label' => __('Title'),
                'value' => $widget_saved_values['title_'.$lang->slug] ?? null,
            ]);

            $output .= Text::get([
                'name' => 'button_text_'.$lang->slug,
                'label' => __('Button Text'),
                'value' => $widget_saved_values['button_text_'.$lang->slug] ?? null,
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end(); //have to end language tab

        $output .= Image::get([
            'name' => 'bg_image',
            'label' => __('Background Image'),
            'value' => $widget_saved_values['bg_image'] ?? null,
        ]);


        $output .= Select::get([
            'name' => 'order_by',
            'label' => __('Order By'),
            'options' => [
                'id' => __('ID'),
                'created_at' => __('Date'),
            ],
            'value' => $widget_saved_values['order_by'] ?? null,
            'info' => __('set order by')
        ]);
        $output .= Select::get([
            'name' => 'order',
            'label' => __('Order'),
            'options' => [
                'asc' => __('Accessing'),
                'desc' => __('Decreasing'),
            ],
            'value' => $widget_saved_values['order'] ?? null,
            'info' => __('set order')
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
        $title = $this->setting_item('title_'.$current_lang) ?? '';
        $button_text = $this->setting_item('button_text_'.$current_lang) ?? '';
        $bg_image = $this->setting_item('bg_image') ?? '';
        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $order_by = SanitizeInput::esc_html($this->setting_item('order_by'));
        $order = SanitizeInput::esc_html($this->setting_item('order'));

        // Check if lexend-v4 theme is active
        $active_theme = get_static_option('active_frontend_theme');
        $is_lexend_v4 = ($active_theme === 'lexend-v4');

        if ($is_lexend_v4) {
            // For lexend-v4, group plans by type and include plan_features
            try {
                $price_plans = \App\Models\PricePlan::with('plan_features')
                    ->where('status', 1)
                    ->orderBy($order_by ?? 'id', $order ?? 'asc')
                    ->get();
                
                // Group by type and ensure integer keys to match pluck values
                $all_price_plan = [];
                if ($price_plans->count() > 0) {
                    foreach ($price_plans as $plan) {
                        $type = (int) $plan->type;
                        if (!isset($all_price_plan[$type])) {
                            $all_price_plan[$type] = [];
                        }
                        $all_price_plan[$type][] = $plan;
                    }
                }
                
                $plan_types = \App\Models\PricePlan::where('status', 1)
                    ->orderBy('type', 'asc')
                    ->select('type')
                    ->distinct()
                    ->pluck('type')
                    ->map(function($type) {
                        return (int) $type;
                    });

                $data = [
                    'title'=> $title,
                    'button_text'=> $button_text,
                    'bg_image'=> $bg_image,
                    'padding_top'=> $padding_top,
                    'padding_bottom'=> $padding_bottom,
                    'all_price_plan'=> $all_price_plan,
                    'plan_types'=> $plan_types,
                ];

                // Use lexend-v4 widget view
                $theme_widget_path = 'themes.lexend-v4.widgets.price-plan';
                if (view()->exists($theme_widget_path)) {
                    return view($theme_widget_path, compact('data'))->render();
                }
            } catch (\Exception $e) {
                // Log error but don't break the page
                \Log::error('PricePlanOne widget error: ' . $e->getMessage());
            }
        }

        // Fallback to default view
        $all_price_plan = \App\Models\PricePlan::where('status',1)->orderBy($order_by ?? 'id',$order ?? 'asc')->get();

        $data = [
            'title'=> $title,
            'button_text'=> $button_text,
            'bg_image'=> $bg_image,
            'padding_top'=> $padding_top,
            'padding_bottom'=> $padding_bottom,
            'all_price_plan'=> $all_price_plan,
        ];

        return self::renderView('tenant.home-one.home-one-price-plan-one',$data);

    }

    public function enable(): bool
    {
        return (bool) !is_null(tenant());
    }

    public function addon_title()
    {
        return __('Hm 1 : Price Plan (01)');
    }
}
