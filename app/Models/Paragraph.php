<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;
    public static function set_content($slug,$content){
        $paragraph = static::where('slug',$slug)->first();
        $paragraph->content = $content;
        $paragraph->save();        
    }
    public static function set_title($slug,$title){
        $paragraph = static::where('slug',$slug)->first();
        $paragraph->title = $title;
        $paragraph->save();        
    }
    public static function use($slug,$use = true){
        $paragraph = static::where('slug',$slug)->first();
        $paragraph->use = $use;
        $paragraph->save();
    }
    public static function home_page_data(){
        return [
            'hero_message_title'        => static::where('slug','home-page-hero-message')->first()->title,
            'hero_message_content'      => static::where('slug','home-page-hero-message')->first()->content,
            'about_message_title'       => static::where('slug','home-page-about-message')->first()->title,
            'about_message_content'     => static::where('slug','home-page-about-message')->first()->content,
            'quality_policy_title'      => static::where('slug','home-page-quality-policy')->first()->title,
            'quality_policy_content'    => static::where('slug','home-page-quality-policy')->first()->content,
            'use_cost'                  => static::where('slug','home-page-services-cost')->first()->use,
            'cost_services_content'     => static::where('slug','home-page-services-cost')->first()->content,
            'use_shipping'              => static::where('slug','home-page-services-shipping')->first()->use,
            'shipping_services_content' => static::where('slug','home-page-services-shipping')->first()->content,
            'use_packing'               => static::where('slug','home-page-services-packing')->first()->use,
            'packing_services_content'  => static::where('slug','home-page-services-packing')->first()->content,
            'use_quality'               => static::where('slug','home-page-services-quality')->first()->use,
            'quality_services_content'  => static::where('slug','home-page-services-quality')->first()->content
        ];
    }

    public static function products_page_data(){
        return [
            'products_message_title' => static::where('slug','products-page-message')->first()->title,
            'products_message_content' => static::where('slug','products-page-message')->first()->content,
            'use_products_message' => static::where('slug','products-page-message')->first()->use,
        ];
    }
}
