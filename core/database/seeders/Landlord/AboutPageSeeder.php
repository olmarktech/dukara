<?php

namespace Database\Seeders\Landlord;

use App\Models\Page;
use App\Models\PageBuilder;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run()
    {
        // Find or create About page
        $aboutPage = Page::where('slug', 'about')->first();
        
        if (!$aboutPage) {
            $aboutPage = Page::create([
                'title' => 'About',
                'slug' => 'about',
                'page_content' => '',
                'visibility' => 1,
                'breadcrumb' => 1,
                'page_builder' => 1,
                'status' => 1,
            ]);
        } else {
            // Update page to use page builder
            $aboutPage->update([
                'page_builder' => 1,
                'status' => 1,
            ]);
        }

        $pageId = $aboutPage->id;

        // Delete existing widgets for this page
        PageBuilder::where('addon_page_id', $pageId)
            ->where('addon_page_type', 'dynamic_page')
            ->delete();

        // Widget 1: About Header
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'AboutHeaderStyleOne',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Header\AboutHeaderStyleOne'),
            'addon_order' => 1,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'AboutHeaderStyleOne',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Header\AboutHeaderStyleOne'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '1',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'title' => 'About Lexend.',
                'description' => 'In 2014, Steven Smith have gotten so much of our time back that we\'re now able to put towards things that are actually helping our company as opposed to just throwing content out there. and the idea of Lexend was born. Today, Lexend empowers teams to easily communicate with customers through personalized documents that can be created in minutes, build meaningful relationships.',
                'left_image' => '', // Add image ID here
                'right_image' => '', // Add image ID here
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        // Widget 2: Brand Slider
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'Brand',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\Brand'),
            'addon_order' => 2,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'Brand',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\Brand'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '2',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'section_title' => '',
                'display_style' => 'slider', // Important: slider style for About page
                'brand_repeater' => [
                    'repeater_image_' => [
                        '', '', '', '', '', // Add 5 brand logo image IDs here
                    ],
                    'repeater_title_' => [
                        'Proline', 'Iceberg', 'PinPoint', 'Clues', 'Snowflake',
                    ],
                ],
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        // Widget 3: About Story
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'LandlordAboutStory',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutStory'),
            'addon_order' => 3,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'LandlordAboutStory',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutStory'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '3',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'title' => 'How Lexend helps',
                'paragraph_one' => 'Teams use Lexend to improve document workflows, insights, and speed while delivering an amazing experience for their customers. Businesses trust Lexend\'s all-in-one document automation software to streamline the process to create, approve, and eSign proposals, quotes, contracts, and more. With powerful document creation and workflow capabilities, teams can provide their customers with a more professional, timely, and engaging experience.',
                'paragraph_two' => 'In 2014, Steven Smith have gotten so much of our time back that we\'re now able to put towards things that are actually helping our company as opposed to just throwing content out there. and the idea of Lexend was born. Today, Lexend empowers teams to easily communicate with customers through personalized documents that can be created in minutes, build meaningful relationships..',
                'counter_1_number' => '2014',
                'counter_1_text' => 'Lexend founded.',
                'counter_2_number' => '50',
                'counter_2_text' => 'Hardworking group.',
                'counter_3_number' => '100',
                'counter_3_text' => 'Document workflows.',
                'counter_3_suffix' => 'k',
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        // Widget 4: About Values
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'LandlordAboutValues',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutValues'),
            'addon_order' => 4,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'LandlordAboutValues',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutValues'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '4',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'title' => 'Our Values it\'s Simple!',
                'values_repeater' => [
                    'repeater_icon_' => [
                        '', '', '', '', // Add 4 icon image IDs here (diamond, trophy, globe, crown)
                    ],
                    'repeater_title_' => [
                        'Make an impact',
                        'Learn',
                        'Have fun',
                        'Empathy',
                    ],
                    'repeater_description_' => [
                        'We\'re building something big. Something that has the power to change the trajectory of any sized business for the better.',
                        'Lexend team are masters of their craft. Even though we\'re all experts in our respective fields, we always make time to expand our minds.',
                        'We work hard and play harder. We believe in the importance of celebrating wins big or small, for the business or individuals.',
                        'We strive to be empathetic to every customer and colleague and by doing so we can provide a better experience for all.',
                    ],
                ],
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        // Widget 5: Feedback Grid (Testimonials)
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'FeedbackGrid',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\FeedbackGrid'),
            'addon_order' => 5,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'FeedbackGrid',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\FeedbackGrid'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '5',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'title' => 'Some clients feedbacks',
                'link_text' => 'See all feedbacks',
                'link_url' => '#',
                'order_by' => 'id',
                'order' => 'desc',
                'item_show' => '3',
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        // Widget 6: About Timeline
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'LandlordAboutTimeline',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutTimeline'),
            'addon_order' => 6,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'LandlordAboutTimeline',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutTimeline'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '6',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'title' => 'How we got here',
                'timeline_repeater' => [
                    'repeater_image_' => [
                        '', '', '', '', '', '', // Add 6 timeline image IDs here
                    ],
                    'repeater_year_' => [
                        '2014',
                        '2015',
                        '2016',
                        '2019',
                        '2020',
                        'Today',
                    ],
                    'repeater_description_' => [
                        'Where the idea come up of Lexend :)',
                        'Launched our first business that can be created in minutes, build meaningful relationships.',
                        'Opened our new office in Toronto, CA',
                        'Moved to Silicon Valley whereas now we can focus on building out to help our employees.',
                        'Opened a new office in London, UK.',
                        'Top-rated software solution for service suppliers.',
                    ],
                ],
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        // Widget 7: About Team
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'LandlordAboutTeam',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutTeam'),
            'addon_order' => 7,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'LandlordAboutTeam',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\AboutTeam'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '7',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'title' => 'Our Executive Team',
                'team_repeater' => [
                    'repeater_image_' => [
                        '', '', '', '', '', '', '', '', // Add 8 team member photo IDs here
                    ],
                    'repeater_name_' => [
                        'Mark Zellers',
                        'John Zellers',
                        'Kim Yun Son',
                        'André Garcia',
                        'Peter Lary',
                        'Henry Matt',
                        'Natalia',
                        'Larry',
                    ],
                    'repeater_position_' => [
                        'Founder & CEO',
                        'Co-Founder',
                        'Engineering Manager',
                        'Product Manager',
                        'UX Researcher',
                        'Customer Success',
                        'Lead of fun',
                        'Director of Joy',
                    ],
                ],
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        // Widget 8: CTA Career
        PageBuilder::create([
            'addon_type' => 'update',
            'addon_location' => 'dynamic_page',
            'addon_name' => 'CtaCareer',
            'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\CtaCareer'),
            'addon_order' => 8,
            'addon_page_id' => $pageId,
            'addon_page_type' => 'dynamic_page',
            'addon_settings' => json_encode([
                'addon_name' => 'CtaCareer',
                'addon_namespace' => base64_encode('Plugins\PageBuilder\Addons\Landlord\Common\CtaCareer'),
                'addon_type' => 'update',
                'addon_location' => 'dynamic_page',
                'addon_order' => '8',
                'addon_page_id' => (string)$pageId,
                'addon_page_type' => 'dynamic_page',
                'title' => 'We\'re looking for people who share our vision!',
                'subtitle' => 'Have what it takes to be one of us.',
                'button_text' => 'View current openings',
                'button_url' => '#',
                'padding_top' => '0',
                'padding_bottom' => '0',
            ]),
        ]);

        $this->command->info('About page widgets created successfully!');
        $this->command->info('Page ID: ' . $pageId);
        $this->command->warn('Note: Please update image IDs in the widgets after uploading images to Media Library.');
    }
}

