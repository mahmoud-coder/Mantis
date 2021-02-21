<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $guarded = []; // all attributes mass assignable

    public static function get($name,$defalut = null){
        return static::firstWhere('name',$name)->value ?? $defalut ;
    }
    public static function set($name,$value){
        static::updateOrCreate(
            ['name' => $name ],
            ['value' => $value]
        );
    }
    public static function all_options(){
        $site_options = static::all();
        $data = [];
        foreach(  $site_options->toArray() as $option){
            $data[$option['name']] = $option['value'];
        };
        return $data;
    }
}
