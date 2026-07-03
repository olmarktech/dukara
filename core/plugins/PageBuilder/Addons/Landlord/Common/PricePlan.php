<?php

namespace Plugins\PageBuilder\Addons\Landlord\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;

use Plugins\PageBuilder\Fields\IconPicker;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Slider;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;

class PricePlan extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Landlord/home/price_plan.jpg';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Select::get([
            'name' => 'display_style',
            'label' => __('Display Style'),
            'options' => [
                'default' => __('Grid Style (Page Pricing)'),
                'index13' => __('Swiper Slider Style (Index-13 Home)'),
            ],
            'value' => $widget_saved_values['display_style'] ?? 'default',
            'info' => __('Select the display style for pricing cards')
        ]);

            $output .= Text::get([
                'name' => 'title',
                'label' => __('Title'),
                'value' => $widget_saved_values['title'] ?? null,
                'info' => __('Use {h}text{/h} for highlighted text. e.g., "Scalable and {h}affordable{/h} prices"')
            ]);

        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'disclaimer_text',
            'label' => __('Disclaimer Text (Bottom small text)'),
            'value' => $widget_saved_values['disclaimer_text'] ?? null,
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
        $output .= $this->section_id_and_class_fields($widget_saved_values);
        $output .= $this->padding_fields($widget_saved_values);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $display_style = SanitizeInput::esc_html($this->setting_item('display_style')) ?? 'default';
        $title = SanitizeInput::esc_html($this->setting_item('title')) ?? '';
        $subtitle = SanitizeInput::esc_html($this->setting_item('subtitle')) ?? '';
        $disclaimer_text = SanitizeInput::esc_html($this->setting_item('disclaimer_text')) ?? '';
        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $order_by = SanitizeInput::esc_html($this->setting_item('order_by'));
        $order = SanitizeInput::esc_html($this->setting_item('order'));

        // Get price plans and group by type with integer keys
        $price_plans = \App\Models\PricePlan::with('plan_features')
            ->where('status', 1)
            ->orderBy($order_by ?? 'id', $order ?? 'asc')
            ->get();
        
        // Group by type and ensure integer keys to match pluck values
        $all_price_plan = [];
        foreach ($price_plans as $plan) {
            $type = (int) $plan->type;
            if (!isset($all_price_plan[$type])) {
                $all_price_plan[$type] = [];
            }
            $all_price_plan[$type][] = $plan;
        }
        
        $plan_types = \App\Models\PricePlan::where('status', 1)
            ->orderBy('type', 'asc')
            ->select('type')
            ->distinct()
            ->pluck('type')
            ->map(function($type) {
                return (int) $type;
            });

        $section_id = SanitizeInput::esc_html($this->setting_item('section_id')) ?? '';

        $data = [
            'title'=> $title,
            'subtitle'=> $subtitle,
            'disclaimer_text'=> $disclaimer_text,
            'padding_top'=> $padding_top,
            'padding_bottom'=> $padding_bottom,
            'all_price_plan'=> $all_price_plan,
            'plan_types' => $plan_types,
            'section_id'=> $section_id,
            'display_style' => $display_style,
        ];

        // Use appropriate view based on display style
        $view = $display_style === 'index13' ? 'landlord.addons.common.price-plan-index13' : 'landlord.addons.common.price-plan';
        
        return self::renderView($view, $data);

    }

    public function enable(): bool
    {
        return (bool) is_null(tenant());
    }

    public function addon_title()
    {
        return __('Price Plan (Home/Pricing Page)');
    }
}
