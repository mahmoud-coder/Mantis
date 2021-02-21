<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductsCategory;
use App\Models\Paragraph;

class update_to_v1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ctg = new ProductsCategory;
        $ctg->name = 'Fresh';
        $ctg->save();
        
        $ctg = new ProductsCategory;
        $ctg->name = 'Frozen';
        $ctg->save();

        // Fresh products page 
        $p = new Paragraph;
        $p->slug = 'fresh-products';
        $p->title = 'Fresh Fruits and Vegetables';
        $p->use = true;
        $p->content = 'From of the best Egyptian fields, We choose our products from our suppliers or from our production. We guarantee their <b>high quality</b> and provide them at the <b>best prices</b>.';
        $p->save();

        // Frozen products page
        $p = new Paragraph;
        $p->slug = 'frozen-products';
        $p->title = 'Frozen';
        $p->use = true;
        $p->content = 'We have a selection of the finest frozen products stored with the highest degree of care and the best standards';
        $p->save();
    }
}
