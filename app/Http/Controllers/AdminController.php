<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Option;
use App\Models\Paragraph;
use App\Models\Product;
use App\Models\ProductsCategory;

class AdminController extends Controller
{
    
    public function index(){
        return view('admin.cpanel',Option::all_options())
                    ->with('active_page','site-option');
    }

    public function login(){
        return view('admin.login');
    }

    public function auth(Request $request){
        $credentials = [
            'name' => $request->post('name-or-email'),
            'password' => $request->post('password')
        ];
        $credentials_alt = [
            'email' => $request->post('name-or-email'),
            'password' => $request->post('password')
        ];
        $remeber_me = $request->has('remeber-me');
        if( Auth::attempt($credentials , $remeber_me) || Auth::attempt($credentials_alt ,$remeber_me)){
            return redirect()->intended('admin');
        }else{
           return $request; //todo
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function site_options_save(Request $request){
        Option::set('site_title', $request->post('site-title'));
        Option::set('site_email', $request->post('site-email'));
        Option::set('site_phone', $request->post('site-phone'));
        Option::set('site_layout', $request->post('site-layout'));
        Option::set('show_facebook', $request->has('show-facebook')?'1':'0');
        Option::set('facebook_url', $request->post('facebook-url'));
        Option::set('show_linkedin', $request->has('show-linkedin')?'1':'0');
        Option::set('linkedin_url', $request->post('linkedin-url')); 

        if($request->hasFile('logo')){
            Storage::delete('/public/images/'.Option::get('site_logo_name'));
            $logo_name = 'logo.' . $request->file('logo')->extension();
            $request->file('logo')->storeAs('/public/images/',$logo_name);
            Option::set('site_logo_name',$logo_name);
        }

        if($request->hasFile('favicon')){
            Storage::delete('/public/images/favicon.png');
            $request->file('favicon')->storeAs('public/images/','favicon.png');
        }
        return redirect()->back();
    }
    public function products(){
        return view('admin.products',array_merge([
            'active_page'   => 'all-products',
            'products'      => Product::simplePaginate(5)
        ],Option::all_options()));
    }
    public function add_product(){
        return view('admin.product',array_merge([
            'active_page'   =>'add-product',
            'categories'    => ProductsCategory::All()
        ],Option::all_options()));
    }
    public function edit_product($id){
        return view('admin.product',array_merge([
            'active_page'   => 'add-product',
            'product'       => Product::find($id),
            'categories'    => ProductsCategory::All()
        ],Option::all_options()));
    }
    public function update_product(Request $request,$id){
        $request->merge(['slug' =>  Str::slug($request->title)]);
        $request->validate([
            'slug' => 'unique:products,slug,'.$id,
            'title'=>'required',
            'content' => 'required'
        ],['slug.unique' => 'this product is already exists in the database.']);
        $product =Product::find($id);
        $product->slug = $request->slug;
        $product->title = $request->title;
        $product->category_id = $request->category;
        if($request->hasFile('product_thumbnail')){
            Storage::delete($product->thumbnail);
            $product->thumbnail = Storage::putFile('products',$request->file('product_thumbnail'));
        }
        if($request->hasFile('product_image')){
            Storage::delete($product->image);
            $product->image = Storage::putFile('products',$request->file('product_image'));
        }
        $product->content = $request->content;
        $product->save();
        return redirect()->route('admin.products');
    }
    public function delete_product($id){
        $product = Product::find($id);
        Storage::delete($product->thumbnail);
        Storage::delete($product->image);
        $product->delete();
        return redirect()->back();
    }

    public function save_new_product(Request $request){
        $request->merge(['slug' =>  Str::slug($request->title)]);
        $request->validate([
            'slug' => 'unique:products,slug',
            'title'=>'required',
            'category' => 'required',
            'product_thumbnail' => 'required',
            'product_image' => 'required',
            'content' => 'required'
        ],['slug.unique' => 'this product is already exists in the database.']);
        $product = new Product;
        $product->slug = $request->slug;
        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->thumbnail = Storage::putFile('products',$request->file('product_thumbnail'));
        $product->image = Storage::putFile('products',$request->file('product_image'));
        $product->content = $request->content;
        $product->save();
        return redirect()->back();
    }

    public function pages_home(){
        return view('admin.pages.home',array_merge(
                                            Option::all_options() ,
                                            Paragraph::home_page_data() ,
                                            ['active_page'=>'home-page']));
    }

    public function pages_home_save(Request $request){
       Paragraph::set_title('home-page-hero-message',$request->hero_message_title);
       Paragraph::set_content('home-page-hero-message',$request->hero_message_content);
       Paragraph::set_title('home-page-about-message',$request->about_message_title);
       Paragraph::set_content('home-page-about-message',$request->about_message_content);
       Paragraph::set_title('home-page-quality-policy',$request->quality_policy_title);
       Paragraph::set_content('home-page-quality-policy',$request->quality_policy_content);

      // services section
      Paragraph::use('home-page-services-cost', isset($request->use_cost_service));
      Paragraph::use('home-page-services-shipping', isset($request->use_shipping_service));
      Paragraph::use('home-page-services-packing', isset($request->use_packing_service));
      Paragraph::use('home-page-services-quality', isset($request->use_quality_service));
    
        return redirect()->back();
    }

    public function pages_products(){
        return view('admin.pages.products',array_merge(
                        Option::all_options() ,
                        Paragraph::products_page_data() ,
                        ['active_page'=>'products-page']));
    }
    public function pages_products_save(Request $request){
        Paragraph::use('products-page-message', isset($request->use_products_message));
        Paragraph::set_title('products-page-message', $request->products_message_title);
        Paragraph::set_content('products-page-message', $request->products_message_content);

        Option::set('products_page_columns', $request->products_columns);
        Option::set('products_page_max', $request->products_page_max);
        return redirect()->back();
    }

    public function update(){
        $version_to = null;
        $update_to = null;
        $active_page = 'update';
        if($update_exits = file_exists( base_path('update.php') )){
            include base_path('update.php');
            $update_to = update_to(); // asumed to be defined in update.php , return the version 
        }
        return view('admin.update',
            array_merge( Option::all_options() ,
                compact('update_exits','update_to', 'active_page')
            ));
    }
    public function update_POST(){
        include base_path('update.php');
        $response = update_script();   // assumed to be defined in update.php return array to be ajax response
        unlink(base_path('update.php'));
        return $response;
    }
}
