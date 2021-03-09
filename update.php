<?php
use App\Models\Option;
use App\Models\Product;

function update_to(){
    return '1.0.2';
}
function update_script(){
    switch(Option::get('version')){
        case '1.0.0':
            unlink(base_path('storage/app/.gitignore'));
            
            $prod = new Product;
            $prod->slug = 'potatoes';
            $prod->title = 'Potatoes';
            $prod->content = '<h1>Potatoes</h1><p><br></p><p>Potato is a root vegetable, it contains negligible fat, 2% protein , 17% carbohydrates and it rich of vitamin B6 and vitamin C.</p><p><br></p><h2>Season</h2><p>From January to April</p><p><br></p><h2>Varieties</h2><ul><li> Spunta</li><li> Diamond</li><li> Mondial</li></ul><h2><br></h2><h2>Packaging</h2><p>packing in mesh or polypropylene bags of 10K , 25K or 50K , also we use jumbo bags of 1000K, each container could has 27 ton</p>';
            $prod->thumbnail = 'products/AhildrYBVWWM7fr9MG0pFvZkB2R0jC34nYJpzXLy.jpg';
            $prod->image = 'products/lww9MunzQUJugbMgKDFDUJQiP03RlpZbNU5QyvqQ.jpg';
            $prod->created_at = '2021-03-07 13:58:24';
            $prod->updated_at = '2021-03-07 17:46:16';
            $prod->category_id = '1';
            $prod->save();
        case '1.0.1':
            // no changes in DB             
            Option::set('version','1.0.2');
        }
        return ['success' => 'updated successfully to version : 1.0.2'];
}