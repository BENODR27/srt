<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ParentCategory;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Slide;

use Illuminate\Http\Request;
use App\Helpers\MyHelper;
use App\Models\Setting;

class WebsiteController extends Controller
{
  function getSelectedProduct(Request $req){
    $datas = MyHelper::generateDropDownData();
    $product=Product::find($req->product_id);
    return view('website.product',['datas'=>$datas,'product'=>$product]);
  }
    function getSelectedCategoryProducts(Request $req){
      $titleName="";
      $category=null;
        if($req->id!=null){
          if($req->id==-1){
            $allImages=Product::where('isLatest',true)->paginate(12);
            $titleName="LATEST ARRIVALS";

          }else{
            $allImages=Product::where('categoryId',$req->id)->paginate(12);
            $category=Category::find($req->id);

          }
        }else{
          $allImages=Product::paginate(12);
          $titleName="ALL PRODUCTS";

        }



        $datas = MyHelper::generateDropDownData();

      return view('website.products',['images'=>$allImages,'datas'=>$datas,'categoryName'=>$category!=null?$category->categoryName:$titleName]);
      }
   
    function website(){
        $slides=Slide::all();
        $categories=Category::all();
        $testimonials = Testimonial::all();
        $latestProducts = Product::where('isLatest',true)->take(8)->get();
        $datas =MyHelper::generateDropDownData();

          $setting = Setting::first(); // Retrieve the first setting record

        if (!$setting) {
            $setting = new Setting(); // Create a default setting if none exists
        }
         return view('website.index',['setting'=>$setting,'slides'=>$slides,'datas'=>$datas,'images'=>$latestProducts,'categories'=>$categories,'testimonials'=>$testimonials]);
    }
    function aboutus(){
      $testimonials = Testimonial::all();
        $datas = MyHelper::generateDropDownData();
         return view('website.aboutus',['datas'=>$datas,'testimonials'=>$testimonials]);
    }
}
