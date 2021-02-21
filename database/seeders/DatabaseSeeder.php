<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use App\Models\Option;
use App\Models\Paragraph;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'islam',
            'email'     => 'islam@gmail.com',
            'password'  => Hash::make('samyessawy')
        ]);
        User::create([
            'name'      => 'mahmoud',
            'email'     => 'mahmoudsamyessawy@gmail.com',
            'password'  => Hash::make('secret+1')
        ]);
        $options = [
            'site_title'    => 'Mantis',
            'site_email'    => 'examble@site.com',
            'site_phone'    => '(0020)01060701019',
            'site_layout'   => 'full',
            'site_logo_name'=> 'logo.png',
            'show_facebook' => '1',
            'facebook_url'  => 'https://www.facebook.com/',
            'show_linkedin' => '1',
            'linkedin_url'  => 'https://www.linkedin.com/',
            'products_page_max' => '30',
            'products_page_columns' => '4'
        ];
        foreach($options as $key => $value)
            Option::create(['name'  => $key, 'value' => $value ]);

        // seeding home page
        Paragraph::create([
            'slug'          => 'home-page-hero-message',
            'title'         => 'Fresh Egyptian Produce',
            'content'       => 'We deliver the best Egyptian vegetables and fruits from the fields to the global markets'
        ]);
        Paragraph::create([
            'slug'          => 'home-page-about-message',
            'title'         => 'Mantis',
            'content'       => 'Mantis is a leading company in the cultivation and export of Egyptian vegetables and fruits to the world, our commitment is to deliver the finest fresh and nutritious production and build a strong relationship with our customers in a way that ensures the satisfaction of our customers and in an environmentally friendly manner'
        ]);
        Paragraph::create([
            'slug'          => 'home-page-services-cost',
            'title'         => 'COST',
            'use'           => true,
            'content'       => 'with Competitive price, we guarantee full satisfatcion'
        ]);
        Paragraph::create([
            'slug'          => 'home-page-services-shipping',
            'title'         => 'SHIPPING',
            'use'           => true,
            'content'       => 'We ship our products with the best guaranteed shipping methods to maintain their quality in the fastest time'
        ]);
        Paragraph::create([
            'slug'          => 'home-page-services-packing',
            'title'         => 'PACKING',
            'use'           => true,
            'content'       => 'we hand pack our products at the picking day with top quality packing boxes'
        ]);
        Paragraph::create([
            'slug'          => 'home-page-services-quality',
            'title'         => 'QUALITY',
            'use'           => true,
            'content'       => 'We embrace the most advanced agricultural methods guaranteeing high quality products'
        ]);
        Paragraph::create([
            'slug'          => 'home-page-quality-policy',
            'title'         => 'OUR QUALITY POLICY',
            'content'       => 'our increasingly strict regulations ensure the highest possible quality that respecting the environment to meet our customer’s expectations and respect the European standards We carefully select our suppliers, and follow the cultivation process from its inception to ensure a quality that meets our standards'
        ]);
        // seeding Paroducts page
        Paragraph::create([
            'slug'          => 'products-page-message',
            'title'         => 'Our Products',
            'use'           => true,
            'content'       => 'Our Products is high in quality,,,'
        ]);
    }
}
