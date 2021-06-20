<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = config('translatable.locales');

        $settings = [
//            [
//                'display_name' => 'website title',
//                'key' => 'website_title',
//                'type' => 'text',
//                'values' => [
//                    'ar'=>'مياوما' ,
//                    'en'=>'Muyawama'
//                ],
//            ],
//            [
//                'display_name' => 'About Muyawama',
//                'key' => 'about_muyawma',
//                'type' => 'textarea',
//                'values' => [
//                    'ar'=>'مياولوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامتما' ,
//                    'en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley'
//                ],
//            ],
//            [
//                'display_name' => 'Privacy Policy',
//                'key' => 'privacy_policy',
//                'type' => 'textarea',
//                'values' => [
//                    'ar'=>'مياولوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامتما' ,
//                    'en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley'
//                ],
//            ],
//            [
//                'display_name' => 'Terms Of Use',
//                'key' => 'terms_of_use',
//                'type' => 'textarea',
//                'values' => [
//                    'ar'=>'مياولوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامتما' ,
//                    'en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley'
//                ],
//            ],
//            [
//                'display_name' => 'Commission',
//                'key' => 'commission',
//                'type' => 'text',
//                'values' => [
//                    'ar'=> 120 ,
//                    'en'=> 120
//                ],
//            ],
//            [
//                'display_name' => 'facebook link',
//                'key' => 'facebook',
//                'type' => 'text',
//                'values' => [
//                    'ar'=> 'https://facebook.com/',
//                    'en'=> 'https://facebook.com/'
//                ],
//            ],
//            [
//                'display_name' => 'twitter link',
//                'key' => 'twitter',
//                'type' => 'text',
//                'values' => [
//                    'ar'=> 'https://twitter.com/',
//                    'en'=> 'https://twitter.com/'
//                ],
//            ],
//            [
//                'display_name' => 'instagram link',
//                'key' => 'instagram',
//                'type' => 'text',
//                'values' => [
//                    'ar'=> 'https://instagram.com/',
//                    'en'=> 'https://instagram.com/'
//                ],
//            ],
//            [
//                'display_name' => 'how to collect m coins',
//                'key' => 'm_coins',
//                'type' => 'text',
//                'values' => [
//                    'ar'=> 'وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت',
//                    'en'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley'
//                ],
//            ],
            [
                'display_name' => 'Telegram Link',
                'key' => 'telegram',
                'type' => 'text',
                'values' => [
                    'ar'=> '',
                    'en'=> ''
                ],
            ],
            [
                'display_name' => 'Tiktok Link',
                'key' => 'tiktok',
                'type' => 'text',
                'values' => [
                    'ar'=> '',
                    'en'=> ''
                ],
            ],

        ];

        foreach ($settings as $se){
            $setting = new \App\Setting();
            $setting->display_name = $se['display_name'];
            $setting->key = $se['key'];
            $setting->type =$se['type'];
            $setting->save();
            foreach ($locales as $locale) {
                $setting->translateOrNew($locale)->value = $se['values'][$locale];
            }
            $setting->save();
        }//endforeach

    }
}
